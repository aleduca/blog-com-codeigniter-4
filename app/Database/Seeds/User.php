<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class User extends Seeder
{
    public function run()
    {
        $faker = Factory::create('pt_BR');
        for ($i = 1; $i <= 100 ; $i++) {
            $data = [
                'firstName' => $faker->firstName,
                'lastName' => $faker->lastName,
                'email' => $faker->email,
                'password' => password_hash('123', PASSWORD_DEFAULT),
            ];

            $this->db->table('users')->insert($data);
        }
    }
}
