<?php

namespace App\Http\Controllers\Forum;

use App\Models\Topic;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\PostTransformer;
use App\Http\Requests\Forum\CreatePostFormRequest;

class PostController extends Controller
{
    public function store(CreatePostFormRequest $request, Topic $topic)
    {
        $post = $topic->posts()->create([
            'body' => $request->json('body'),
            'user_id' => $request->user()->id,
        ]);

        return fractal()
            ->item($post)
            ->includeUser()
            ->transformWith(new PostTransformer)
            ->toArray();
    }
}
