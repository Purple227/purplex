<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Post;
use App\Http\Requests\StorePost;
use App\Model\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('play');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {   

            $tags = $request->names;

    foreach ($tags as $tag) {
       $tag_data[] =[
        'name' => $tag,
    ];     
}

DB::table("tags")->insertOrIgnore($tag_data);

return 'success';

        // The incoming request is valid...

        // Retrieve the validated input data...
        //$validated = $request->validated();

      $slug = Str::slug($request->title, '-');

      $post = new Post;

      $post->title = $request->title;
      $post->description = $request->description;
      $post->slug = $slug;

      if ($request->status === true) {
        $post->status = true; 
    } else {
        $post->status = false;
    }






$slug_check = Post::where('slug', $post->slug)->first();

       // return $slug_check;

$post->save(); 

$post->tags()->attach($request->tags);
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, $id)
    {   

        // Get data updated by ID
     $post = Post::find($id);

        // The incoming request is valid...

        // Retrieve the validated input data...
     $validated = $request->validated();


     $post->title = $request->title;
     $post->description = $request->description;
     $post->edited = true;

     if ($request->status === true) {
        $post->status = true; 
    } else {
        $post->status = false;
    }
/*
        DB::table('tags')->insert([
            ['name' => '$request->name' ],
            ['slug' => '$request->name' ],
        ]);
*/
        $post->save(); 

        $post->tags()->attach($request->tags);
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
