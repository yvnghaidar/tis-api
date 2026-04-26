<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Exception;

class PublicApiService
{
    public function getPosts(): array
    {
        $response = Http::timeout(10)->get('https://jsonplaceholder.typicode.com/posts');

        if ($response->failed()) {
            throw new Exception('Gagal mengambil data dari public API');
        }

        return collect($response->json())
            ->map(function ($post) {
                return [
                    'id' => $post['id'],
                    'title' => $post['title'],
                    'body' => $post['body'],
                    'userId' => $post['userId'],
                ];
            })
            ->values()
            ->all();
    }
}