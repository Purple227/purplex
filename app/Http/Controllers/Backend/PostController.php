<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Post;
use App\Http\Requests\StorePost;
use App\Model\Tag;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $posts = Post::all();
        return response()->json($posts);
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

    //Handling slug
        $slug = Str::slug($request->title, '-');
        $truncated = Str::limit($slug, 48);

    //Creating the new object that will be save to database
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->status = $request->status;

        $post->slug = $truncated;
    // Retrieve the first model matching the query constraints and modify the slug
        $slug_check = Post::where('slug', $post->slug)->first();
        if ($slug_check == true) {
            $random = Str::random(3);
            $post_slug_randomize = $post->slug .$random;
            $post->slug = $post_slug_randomize;
        }

        $post->save(); 

            //Tags save to database
        $tags = $request->tags;
        foreach ($tags as $tag) {
           $tag_data[] =Tag::firstOrCreate([
            'name' => $tag,
            'slug' => $tag
        ]);     
       } 

     //I collected the tag id
       if (isset($tag_data) ) {
           $tag_count = count($tag_data);
           for ($i=0; $i<$tag_count; $i++) { 
            $tag_id[] = $tag_data[$i]['id'];
        }

    // A blast tag id get inserted here for many to many relationship
        $post->tags()->attach($tag_id);
    }

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

        $post = Post::find('id');    

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

    //Handling image
    $image = $request->file('image');
    if (isset($image)) {
        $image_name = $slug.'.'.$image->getClientOriginalExtension();
    } else {
        $image_name = 'default.png';
    }
    if (!Storage::disk('public')->exists('blog')) {
        Storage::disk('public')->makeDirectory('blog');
    }

    //delete old post image
    if(Storage::disk('public')->exists('blog/'.$post->image))
    {
        Storage::disk('public')->delete('blog/'.$post->image);
    }

    // create instance and resize
    $image_resize = Image::make($image)->resize(600,350)->stream();
    Storage::disk('public')->put('blog/'.$image_name,$image_resize);

    $post->title = $request->title;
    $post->description = $request->description;
    $post->email = true;


    if (isset($request->status)) {
        $post->status = true; 
    } else {
        $post->status = false;
    }

    $post->save();  

    // A blast tag id get inserted here for many to many relationship
    $post->tags()->attach($tag_id);

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
