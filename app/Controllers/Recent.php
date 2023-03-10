<?php

namespace App\Controllers;

use App\Models\Post;

class Recent extends BaseController
{
  public function index()
  {
    helper('text');

    if (!$recent = cache('recent')) {
      $post = new Post();
      $recent = $post->select(
        'posts.id,posts.slug, posts.title, posts.image, posts.created_at, posts.description, categories.name as categoryName, users.firstName as userFirstName, users.lastName as userLastName'
      )->join(
        'users',
        'users.id = posts.user_id'
      )->join(
        'categories',
        'categories.id = posts.category_id'
      )->orderBy('id', 'desc')->findAll(7);

      // Save into the cache for 5 minutes
      cache()->save('recent', $recent, 300);
    }

    return view('_partials/_recent', [
      'recent' => $recent
    ]);
  }
}
