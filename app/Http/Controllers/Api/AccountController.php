<?php

namespace App\Http\Controllers\Api;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        // dd($user);
        $data = Account::where('user_id', $user->id)->get();

        return response()->json([
            'status' => true,
            'message' => 'Account data fetched successfully',
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'accountType' => 'required|integer',
            'customLabel' => 'required|array',
            'customValue' => 'required|array',
        ]);

        // Ambil data dari request
        $accountType = $validatedData['accountType'];
        $customLabels = $validatedData['customLabel'];
        $customValues = $validatedData['customValue'];

        // Inisialisasi array untuk menyimpan hasil gabungan
        $accountDetail = [];

        // Gabungkan customLabel dan customValue, abaikan label yang kosong/null
        foreach ($customLabels as $key => $label) {
            if (!empty($label) && isset($customValues[$key])) {
                $accountDetail[] = [
                    'label' => $label,
                    'value' => $customValues[$key],
                ];
            }
        }

        // Cek jika tidak ada accountDetail yang valid
        if (empty($accountDetail)) {
            return response()->json([
                'success' => false,
                'message' => 'Custom fields tidak boleh kosong atau null!',
            ], 400);
        }

        // Simpan data ke database
        $account = Account::create([
            'platform_id' => $accountType,
            'user_id' => $user->id,
            'account_details' => json_encode($accountDetail),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Account berhasil disimpan!',
            'data' => [
                'accountType' => $accountType,
                'accountDetail' => $accountDetail,
            ],
        ], 201);
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        $data = Account::with('platform')->where('user_id', $user->id)->get();

        return response()->json([
            'status' => true,
            'message' => 'Account data fetched successfully',
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
