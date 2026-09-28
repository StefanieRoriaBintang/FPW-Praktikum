<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingleActionPhotoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $id)
    {
        return response()->json(['message' => "Single Action Controller for Photo ID: {$id}"]);
    }
}
