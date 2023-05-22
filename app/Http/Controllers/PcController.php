<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PC;

class PcController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pcs = PC::all();
        return response()->json($pcs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $pc = PC::create($data);
        return response()->json($pc, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $pc = PC::find($id);
        if (!$pc) {
            return response()->json(['message' => 'PC not found'], 404);
        }
        return response()->json($pc);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $pc = PC::find($id);
        if (!$pc) {
            return response()->json(['message' => 'PC not found'], 404);
        }
        $data = $request->all();
        $pc->update($data);
        return response()->json($pc);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $pc = PC::find($id);
        if (!$pc) {
            return response()->json(['message' => 'PC not found'], 404);
        }
        $pc->delete();
        return response()->json(['message' => 'PC deleted']);
    }
}