<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Authentication;
use Illuminate\Support\Facades\Hash;

class Authenticationseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authentication = new Authentication();
        $authentication->name = "Talha Rehman";
        $authentication->email = "sir@gmail.com";
        $authentication->password = Hash::make(123456);
        $authentication->save();
    }
}
