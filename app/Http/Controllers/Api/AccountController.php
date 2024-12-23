<?php

namespace App\Http\Controllers\Api;

use App\Models\Account;
use App\Models\Platform;
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
            'customHidden' => 'sometimes|array',
            'notes' => 'nullable|string'
        ]);

        // Ambil data dari request
        $accountType = $validatedData['accountType'];
        $customLabels = $validatedData['customLabel'];
        $customValues = $validatedData['customValue'];
        $customHidden = $validatedData['customHidden'];
        $notes = $validatedData['notes'];

        // Inisialisasi array untuk menyimpan hasil gabungan
        $accountDetail = [];

        // Gabungkan customLabel dan customValue, abaikan label yang kosong/null
        foreach ($customLabels as $key => $label) {
            if (!empty($label) && isset($customValues[$key])) {
                $accountDetail[] = [
                    'label' => $label,
                    'value' => $customValues[$key],
                    'hidden' => isset($customHidden[$key]) ? $customHidden[$key] : '0',
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
            'notes' => $notes
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Account berhasil disimpan!',
            'data' => [
                'accountType' => $accountType,
                'accountDetail' => $accountDetail,
            ],
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($account)
    {
        $user = Auth::user();
        $platform = Platform::where('name', $account)->first();
        $data = Account::with('platform')->where('user_id', $user->id)->where('platform_id', $platform->id)->get();

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
        $account = Account::find($id);
        if (!$account) {
            return response()->json([
                'status' => false,
                'message' => 'Account not found',
            ], 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Account data fetched successfully',
            'data' => $account
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $account = Account::find($id);
        if (!$account) {
            return response()->json([
                'status' => false,
                'message' => 'Account not found',
            ], 404);
        }
        $validatedData = $request->validate([
            'accountType' => 'required|integer',
            'customLabel' => 'required|array',
            'customValue' => 'required|array',
            'customHidden' => 'sometimes|array',
            'notes' => 'nullable|string'
        ]);

        // Ambil data dari request
        $accountType = $validatedData['accountType'];
        $customLabels = $validatedData['customLabel'];
        $customValues = $validatedData['customValue'];
        $customHidden = $validatedData['customHidden'];
        $notes = $validatedData['notes'];

        // Inisialisasi array untuk menyimpan hasil gabungan
        $accountDetail = [];

        // Gabungkan customLabel dan customValue, abaikan label yang kosong/null
        foreach ($customLabels as $key => $label) {
            if (!empty($label) && isset($customValues[$key])) {
                $accountDetail[] = [
                    'label' => $label,
                    'value' => $customValues[$key],
                    'hidden' => isset($customHidden[$key]) ? $customHidden[$key] : '0',
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
        $account->platform_id = $accountType;
        $account->account_details = json_encode($accountDetail);
        $account->notes = $notes;
        $account->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (empty($id)) {
            return response()->json([
                'status' => false,
                'message' => 'ID does not exist',
            ], 400);
        }
        $account = Account::find($id);
        $account->delete();

        return response()->json([
            'status' => true,
            'message' => 'Account deleted successfully'
        ]);
    }
}
