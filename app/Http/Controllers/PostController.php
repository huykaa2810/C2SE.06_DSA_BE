<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PostController extends Controller
{
    public function getData()
    {
        $data   =   Post::all();

        return response()->json([
            'posts'  =>  $data
        ]);
    }
    public function store(PostRequest $request)
    {
        $data   =   $request->all();
        Post::create($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã tạo mới bài viết thành công!'
        ]);
    }
    public function destroy($id)
    {
        Post::find($id)->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá bài viết thành công!'
        ]);
    }
    public function update(Request $request)
    {
        $data   = $request->all();
        Post::find($request->id)->update($data);
        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã cập nhật bài viết thành công!'
        ]);
    }

    public function latest()
    {
        $latestPost = Post::orderBy('created_at', 'desc')->first();


        if ($latestPost) {
            return response()->json($latestPost, 200);
        } else {
            return response()->json([
                'message' => 'Không có bài viết này!'
            ]);
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        $posts = Post::where('title', 'LIKE', "%{$query}%")->get();

        return response()->json($posts, 200);
    }


    public function getTopPosts()
    {

        $topPosts = Post::orderBy('view', 'desc')->take(5)->get();

        return response()->json($topPosts);
    }
    public function getLatestPostsByCategory($category_id)
    {

        $latestPosts = Post::where('category_id', $category_id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return response()->json($latestPosts);
    }
}
