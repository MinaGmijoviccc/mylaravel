<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mouse;

class MouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mouses = Mouse::all();
        return response()->json($mouses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $mouse = Mouse::create($data);
        return response()->json($mouse, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $mouse = Mouse::find($id);
        if (!$mouse) {
            return response()->json(['message' => 'Mouse not found'], 404);
        }
        return response()->json($mouse);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $mouse = Mouse::find($id);
        if (!$mouse) {
            return response()->json(['message' => 'Mouse not found'], 404);
        }
        $data = $request->all();
        $mouse->update($data);
        return response()->json($mouse);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $mouse = Mouse::find($id);
        if (!$mouse) {
            return response()->json(['message' => 'Mouse not found'], 404);
        }
        $mouse->delete();
        return response()->json(['message' => 'Mouse deleted']);
    }
}