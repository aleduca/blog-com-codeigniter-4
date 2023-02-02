<?php

namespace App\Cells;

use App\Models\Category as CategoryModel;

class Category
{
  public function render()
  {
    $category = new CategoryModel();
    $categories = $category->select('name,slug')->findAll();
    return view('partials/cell/category', ['categories' => $categories]);
  }
}
