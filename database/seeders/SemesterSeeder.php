<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('semester')->insert([
            'id' => Str::uuid()->toString(),
            'title' => '1st Semecter',
            'sem_label' => '1st Sem',
            'short_key' => "FIRST_SEM"
        ]);

        DB::table('semester')->insert([
            'id' => Str::uuid()->toString(),
            'title' => '2nd Semecter',
            'sem_label' => '2nd Sem',
            'short_key' => "SECOND_SEM"
        ]);
        DB::table('semester')->insert([
            'id' => Str::uuid()->toString(),
            'title' => '3rd Semecter',
            'sem_label' => '3rd Sem',
            'short_key' => "THIRD_SEM"
        ]);
        DB::table('semester')->insert([
            'id' => Str::uuid()->toString(),
            'title' => '4th Semecter',
            'sem_label' => '4th Sem',
            'short_key' => "FOURTH_SEM"
        ]);
        DB::table('semester')->insert([
            'id' => Str::uuid()->toString(),
            'title' => '5th Semecter',
            'sem_label' => '5th Sem',
            'short_key' => "FIFTH_SEM"
        ]);
        DB::table('semester')->insert([
            'id' => Str::uuid()->toString(),
            'title' => '6th Semecter',
            'sem_label' => '6th Sem',
            'short_key' => "SIXTH_SEM"
        ]);
    }
}
