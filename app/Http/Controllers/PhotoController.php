<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    // Contoh Controller Middleware (Materi Pertemuan 3)
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('log')->only('index');
    }

    public function index()
    {
        return response()->json(['message' => 'List of photos']);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        return response()->json(['message' => 'Photo stored']);
    }

    public function show(string $id)
    {
        return response()->json(['message' => "Show photo ID: {$id}"]);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        return response()->json(['message' => "Update photo ID: {$id}"]);
    }

    public function destroy(string $id)
    {
        return response()->json(['message' => "Delete photo ID: {$id}"]);
    }
}
