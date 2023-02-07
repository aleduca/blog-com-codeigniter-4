<?php

namespace App\Cells;

use App\Models\Category as CategoryModel;

class CategorySidebar
{
  public function render()
  {
    return view("partials/cell/sidebar");
  }
}
