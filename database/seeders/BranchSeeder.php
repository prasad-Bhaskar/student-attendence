<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('branch')->insert([
            'id' => Str::uuid()->toString(),
            'title' => 'Mechenical',
            'short_key' => "MECH",
            'branch_label' => "Mech",            
            'branch_code' => "1001",            
        ]);
        DB::table('branch')->insert([
            'id' => Str::uuid()->toString(),
            'title' => 'Civil',
            'short_key' => "CIVIL",
            'branch_label' => "Civil",  
            'branch_code' => "1002",            
        ]);
        DB::table('branch')->insert([
            'id' => Str::uuid()->toString(),
            'title' => 'Electrical',
            'short_key' => "ELEC",
            'branch_label' => "Electr",
            'branch_code' => "1003",              
        ]);
        DB::table('branch')->insert([
            'id' => Str::uuid()->toString(),
            'title' => 'Metalergy',
            'short_key' => "METAL",
            'branch_label' => "Metal",  
            'branch_code' => "1004",            
        ]);
        DB::table('branch')->insert([
            'id' => Str::uuid()->toString(),
            'title' => 'Electronics',
            'short_key' => "ELECTR",
            'branch_label' => "Electr", 
            'branch_code' => "1005",             
        ]);
        DB::table('branch')->insert([
            'id' => Str::uuid()->toString(),
            'title' => 'Moder Office Management',
            'short_key' => "MOM",
            'branch_label' => "MOM",  
            'branch_code' => "1006",            
        ]);
        DB::table('branch')->insert([
            'id' => Str::uuid()->toString(),
            'title' => 'Computer Science',
            'short_key' => "CS",
            'branch_label' => "CS", 
            'branch_code' => "1007",             
        ]);
        DB::table('branch')->insert([
            'id' => Str::uuid()->toString(),
            'title' => 'Information Tecnology',
            'short_key' => "IT",
            'branch_label' => "IT", 
            'branch_code' => "1008",             
        ]);

    }
}
