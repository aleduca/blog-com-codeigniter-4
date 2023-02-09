<?php

namespace App\Database\Seeds;

use Bluemmb\Faker\PicsumPhotosProvider;
use CodeIgniter\Database\Seeder;
use Faker\Factory;

class Post extends Seeder
{
  public function run()
  {
    $faker = Factory::create();
    $faker->addProvider(new PicsumPhotosProvider($faker));
    for ($i = 1; $i <= 100; $i++) {
      $title = $faker->sentence();
      $data = [
        'user_id' => $faker->numberBetween(1, 100),
        'category_id' => $faker->numberBetween(1, 10),
        'title' => $title,
        'slug' => rtrim(strtolower(str_replace(' ', '-', $title)), '.'),
        'visits' => $faker->numberBetween(1, 100),
        'image' => $faker->imageUrl(),
        'description' => $faker->paragraph(5),
      ];

      $this->db->table('posts')->insert($data);
    }
  }
}
