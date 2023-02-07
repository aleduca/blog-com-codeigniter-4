<?php

namespace App\Cells;

use App\Models\Category as CategoryModel;

class CategoryMenu
{
  public function render(string $view)
  {
    $category = new CategoryModel();
    $categories = $category->select('name,slug')->findAll();
    return view("partials/cell/{$view}", ['categories' => $categories]);
  }
}
