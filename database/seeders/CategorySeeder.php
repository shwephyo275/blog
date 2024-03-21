<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['tutorial','tips','development','mobile development'];
        foreach($data as $d){
            Category::create([
                'slug'=>Str::slug($d),
                'name'=>$d,
            ]);
        }
    }
}
