<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederClass extends Seeder
{
    public function run()
    {
        $this->call('User');
        $this->call('Category');
        $this->call('Post');
    }
}
