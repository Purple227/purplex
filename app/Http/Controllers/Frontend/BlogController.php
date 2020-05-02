<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Post;
use App\Model\Tag;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::orderBy('id', 'desc')->paginate(5);
        $posts = Post::where('status', 1 )
                 ->orderBy('id', 'desc')
                 ->paginate(5);
        return response()->json($posts);
    }

    public function search(Request $request)
    {
        $search_query = $request->search_query;

        $data = Post::where('title', 'LIKE', "%$search_query%")
                ->take(4)
                ->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

 
    public function show($slug)
    {
        $post = Post::where('slug',$slug)->first();
        foreach ($post->tags as $tag) {
           $tag->name;
        }
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
