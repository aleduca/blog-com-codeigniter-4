<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class Category extends Seeder
{
    public function run()
    {
        $faker = Factory::create('fr_FR');
        for ($i = 1; $i <= 100 ; $i++) {
            $department = $faker->departmentName;
            $data = [
                'name' => $department,
                'slug' => strtolower(str_replace(' ', '-', $department)),
            ];

            $this->db->table('categories')->insert($data);
        }
    }
}
