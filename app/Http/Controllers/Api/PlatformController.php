<?php

namespace App\Http\Controllers\Api;

use App\Models\Platform;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PlatformController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() //Show whereIn account
    {
        $platform = Platform::withAccounts()->get();

        return response()->json([
            'status' => true,
            'message' => 'Platform data fetched successfully',
            'data' => $platform
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Ensure it's an image and limit size
        ]);

        if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $imageName = str_replace(' ', '-', $validated['name']) . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/icons/users'), $imageName);
            $validated['icon'] = $imageName;
        }

        $platform = Platform::create([
            'user_id' => $user->id,
            'name' => $validated['name'],
            'icon' => $validated['icon'],
            'is_editable' => '1'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Platform created successfully',
            'data' => $platform
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id) //untuk dropdown (Show where user_id)
    {
        $platform = Platform::where('is_editable', '0')
            ->orWhere('user_id', $id)
            ->get();

        return response()->json([
            'status' => true,
            'message' => 'Platform data fetched successfully',
            'data' => $platform
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
