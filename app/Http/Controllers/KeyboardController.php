<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keyboard;

class KeyboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keyboards = Keyboard::all();
        return response()->json($keyboards);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $keyboard = Keyboard::create($data);
        return response()->json($keyboard, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $keyboard = Keyboard::find($id);
        if (!$keyboard) {
            return response()->json(['message' => 'Keyboard not found'], 404);
        }
        return response()->json($keyboard);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $keyboard = Keyboard::find($id);
        if (!$keyboard) {
            return response()->json(['message' => 'Keyboard not found'], 404);
        }
        $data = $request->all();
        $keyboard->update($data);
        return response()->json($keyboard);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $keyboard = Keyboard::find($id);
        if (!$keyboard) {
            return response()->json(['message' => 'Keyboard not found'], 404);
        }
        $keyboard->delete();
        return response()->json(['message' => 'Keyboard deleted']);
    }
}
