<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\SeachRequest;
use App\Models\Post;
use App\Models\Tracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function getData()
    {
        $data = Post::with(['association:id,registrant_name', 'category:id,category_name'])->get();

        return response()->json([
            'posts'  =>  $data
        ]);
    }
    public function getPostById($id)
    {
        // Lấy bài viết theo id và thông tin member
        $post = Post::with('association:id,registrant_name', 'category:id,category_name')->findOrFail($id);

        return response()->json([
            'post' => $post
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

    public function search(SeachRequest $request)
    {
        $query = $request->input('q');

        $posts = Post::where('title', 'LIKE', "%{$query}%")
            ->take(3)
            ->get();

        return response()->json($posts, 200);
    }

    public function recommend(Request $request)
    {
        $query = $request->input('q');
        $posts = Post::where('title', 'LIKE', "%{$query}%")
            ->select('id', 'title')
            ->take(3)
            ->get();

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


    public function getPostsByCategory($category_id)
    {
        $posts = Post::where('category_id', $category_id)
            ->where('is_open', true)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        return response()->json($posts);
    }

    public function getPostsByMember($member_id)
    {
        $posts = Post::where('member_id', $member_id)->get();

        return response()->json($posts);
    }

    public function truyCapWeb()
    {
        $tracking = Tracking::first();
        if (!$tracking) {
            $tracking = Tracking::create(['visit_count' => 0]);
        }
        $tracking->increment('visit_count');
        return response()->json([
            'status' => true,
            'message' => 'Số lượt truy cập đã được cập nhật.',
            'visit_count' => $tracking->visit_count + 1
        ]);
    }

    public function getLatestPosts()
    {
        $latestPosts = Post::orderBy('created_at', 'desc')->take(5)->get();

        return response()->json($latestPosts);
    }

    public function xemBaiViet($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['message' => 'Bài viết không tồn tại']);
        }
        $post->increment('view');
        return response()->json($post);
    }
}
