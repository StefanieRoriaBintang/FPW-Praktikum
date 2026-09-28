<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryBuilderController extends Controller
{
    // 1. SELECT (Mengambil semua data)
    public function index()
    {
        $posts = DB::table('posts')->get();
        return response()->json($posts);
    }

    // 2. INSERT (Menambah data baru)
    public function store(Request $request)
    {
        $id = DB::table('posts')->insertGetId([
            'title' => $request->title ?? 'Judul Default Query Builder',
            'body' => $request->body ?? 'Isi postingan menggunakan DB facade',
            'user_id' => $request->user_id ?? 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $post = DB::table('posts')->find($id);
        return response()->json($post, 201);
    }

    // 3. WHERE & FIRST (Mencari data spesifik)
    public function show($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();

        if (!$post) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return response()->json($post);
    }

    // 4. UPDATE (Mengubah data)
    public function update(Request $request, $id)
    {
        $updated = DB::table('posts')->where('id', $id)->update([
            'title' => $request->title ?? 'Judul Diperbarui (Query Builder)',
            'updated_at' => now(),
        ]);

        if (!$updated) {
            return response()->json(['message' => 'Not found or no changes'], 404);
        }

        $post = DB::table('posts')->find($id);
        return response()->json($post);
    }

    // 5. DELETE (Menghapus data)
    public function destroy($id)
    {
        $deleted = DB::table('posts')->where('id', $id)->delete();

        if (!$deleted) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return response()->json(['message' => 'Deleted successfully using Query Builder']);
    }
}
