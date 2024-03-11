<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_type')->insert([
            'id' => Str::uuid()->toString(),
            'title' => 'Student',
            'short_key' => "STUDENT"
        ]);
        DB::table('user_type')->insert([
            'id' => Str::uuid()->toString(),
            'title' => 'Teacher',
            'short_key' => "TEACHER"
        ]);
        DB::table('user_type')->insert([
            'id' => Str::uuid()->toString(),
            'title' => 'Admin',
            'short_key' => "Admin"
        ]);
    }
}
