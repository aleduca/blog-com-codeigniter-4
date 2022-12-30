<?php

namespace App\Controllers;

use App\Models\Post;

class Trending extends BaseController
{
  public function index()
  {
    $post = new Post();
    $posts = $post->select('
      posts.title, users.firstName as userFirstName, users.lastName as userLastName
    ')->orderBy(
      'visits',
      'desc'
    )->join(
      'users',
      'users.id = posts.user_id'
    )->findAll(5);

    return view('_partials/_trending', ['posts' => $posts]);
  }
}
