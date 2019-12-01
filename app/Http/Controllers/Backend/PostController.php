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

    // The incoming request is valid...

    // Retrieve the validated input data...
        $validated = $request->validated();

        //Tags save to database
        $tags = $request->names;
        foreach ($tags as $tag) {
         $tag_data[] =Tag::firstOrCreate([
            'name' => $tag,
            'slug' => $tag
        ]);     
     } 

     //I collected the tag id
     $tag_count = count($tag_data);
     for ($i=0; $i<$tag_count; $i++) { 
        $tag_id[] = $tag_data[$i]['id'];
    }

    //Handling slug
    $slug = Str::slug($request->title, '-');
    $truncated = Str::limit($slug, 30);


    $post = new Post;

    $post->title = $request->title;
    $post->description = $request->description;


    if (isset($request->status)) {
        $post->status = true; 
    } else {
        $post->status = false;
    }

    $post->slug = $truncated;
    // Retrieve the first model matching the query constraints and modify the slug
    $slug_check = Post::where('slug', $post->slug)->first();
    if ($slug_check == true) {
        $random = Str::random(3);
        $post_slug_randomize = $post->slug .$random;
        $post->slug = $post_slug_randomize;
    }

    $post->save(); 

    // A blast tag id get inserted here for many to many relationship
    $post->tags()->attach($tag_id);

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
