<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
  public function show($slug)
  {
    $post = Post::with(['user','category','photo',
      'comments'=>function($q){
        $q->where('status', 1)
          ->where('parent_id', null);
      }, 'comments.replies'=>function($q){
        $q->where('status', 1);
      }])
      ->where('slug', $slug)
      ->where('status', 1)
      ->first();
    $categories = Category::all();
    return view('frontend.posts.show', compact(['post', 'categories']));
  }

  public function searchTitle()
  {
    $query = Input::get('title');
    $posts = Post::with('user','category','photo')
      ->where('title', 'like', "%".$query."%")
      ->where('status', 1)
      ->orderBy('created_at', 'desc')
      ->paginate(3);
    $categories = Category::all();

    return view('frontend.posts.search', compact(['posts', 'categories', 'query']));
  }
}
