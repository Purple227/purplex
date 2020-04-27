<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Tag;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('id', 'desc')->paginate(5);
        return response()->json($tags);
    }

        public function search(Request $request)
    {
        $search_query = $request->search_query;
        $data = Tag::where('name','LIKE',"%$search_query%")
        ->take(5)
        ->get();
        /*$posts = Post::where('title','LIKE',"%$query%")->approved()->published()->paginate(4);
*/        return response()->json($data);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return response()->json($tag);
    }
}
