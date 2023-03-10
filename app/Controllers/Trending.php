<?php

namespace App\Controllers;

use App\Models\Post;

class Trending extends BaseController
{
  public function index()
  {

    if (!$trendings = cache('trendings')) {
      $post = new Post();
      $trendings = $post->select('
      posts.title,posts.slug, users.firstName as userFirstName, users.lastName as userLastName
    ')->orderBy(
        'visits',
        'desc'
      )->join(
        'users',
        'users.id = posts.user_id'
      )->findAll(5);
      // Save into the cache for 5 minutes
      cache()->save('trendings', $trendings, 300);
    }

    return view('_partials/_trending', ['posts' => $trendings]);
  }
}
