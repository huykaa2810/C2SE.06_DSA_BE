<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Tracking;
use Illuminate\Http\Request;

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

    public function search(Request $request)
    {
        $query = $request->input('q');
        $posts = Post::where('title', 'LIKE', "%{$query}%")->take(3)->get();
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

    public function truyCapWeb()
    {
        // Tìm bản ghi trong bảng tracking (giả sử có một bản ghi cho toàn bộ lượt truy cập)
        $tracking = Tracking::first();

        // Nếu không có bản ghi, tạo mới
        if (!$tracking) {
            $tracking = Tracking::create(['visit_count' => 0]);
        }

        // Tăng số lượt truy cập lên 1
        $tracking->increment('visit_count');

        // Trả về phản hồi
        return response()->json([
            'status' => true,
            'message' => 'Số lượt truy cập đã được cập nhật.',
            'visit_count' => $tracking->visit_count + 1 // Trả về số lượt truy cập vừa tăng
        ]);
    }
}
