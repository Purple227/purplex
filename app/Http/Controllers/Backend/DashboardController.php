<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Post;
use App\Model\Tag;
use App\Model\Subscriber;


class DashboardController extends Controller
{
    public function dashboard()
    {

    $total_post = Post::all()->count();
    $total_tag = Tag::all()->count();
    $total_subscriber = Subscriber::all()->count();

    return response()->json([$total_post, $total_tag, $total_subscriber]);

}

}
