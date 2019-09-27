<?php

namespace App\Http\Controllers\Frontend;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
  public function store(Request $request, $postId)
  {
    $post = Post::findOrFail($postId);
    if($post){
      $comment = new Comment();
      $comment->description = $request->input('description');
      $comment->post_id = $post->id;
      $comment->status = 0;
      $comment->save();
    }
    Session::flash('add_comment', 'نظر شما با موفقیت درج شد و در انتظار تایید مدیران قرار گرفت');
    return back();
  }
  public function reply(Request $request)
  {
    $postId = $request->input('post_id');
    $parentId = $request->input('parent_id');

    $post = Post::findOrFail($postId);
    if($post){
      $comment = new Comment();
      $comment->description = $request->input('description');
      $comment->parent_id = $parentId;
      $comment->post_id = $post->id;
      $comment->status = 0;
      $comment->save();
    }
    Session::flash('add_comment', 'نظر شما با موفقیت درج شد و در انتظار تایید مدیران قرار گرفت');
    return back();
  }
}
