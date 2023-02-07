<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class User extends Seeder
{
  public function run()
  {
    $faker = Factory::create('pt_BR');
    for ($i = 1; $i <= 100; $i++) {
      $data = [
        'firstName' => $faker->firstNameMale(),
        'lastName' => $faker->lastName(),
        'email' => $faker->email(),
        'image' => 'https://randomuser.me/api/portraits/men/' . rand(1, 90) . '.jpg',
        'password' => password_hash('123', PASSWORD_DEFAULT),
      ];

      $this->db->table('users')->insert($data);
    }
  }
}
