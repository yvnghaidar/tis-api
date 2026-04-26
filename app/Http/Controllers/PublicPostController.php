<?php

namespace App\Http\Controllers;

use App\Services\PublicApiService;
use Illuminate\Http\Request;

class PublicPostController extends Controller
{
    public function getAllPosts(PublicApiService $publicApiService)
    {
        try {
            $posts = $publicApiService->getPosts();
            return response()->json([
                'success' => true,
                'message' => 'Posts grabbed from public API',
                'posts' => $posts,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data dari public API',
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}