<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

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
        // lấy bài post mới nhất
        $latestPost = Post::orderBy('created_at', 'desc')->first();

        // check bài viết có tồn tại ko
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
}
