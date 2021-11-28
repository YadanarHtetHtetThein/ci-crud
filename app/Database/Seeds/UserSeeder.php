<?php

namespace App\Database\Seeds;

use Faker\Factory;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        for($i = 0; $i <10; $i++){
            $this->db->table('users')->insert($this->generateUsers());
        }
    }

    private function generateUsers(): array {
        $faker = Factory::create();
        return [
            'name' => $faker->name(),
            'email' => $faker->email(),
            'phone_no'=> $faker->phoneNumber,
        ];
    }
}
