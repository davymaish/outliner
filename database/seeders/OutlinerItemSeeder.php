<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OutlinerItem;
use Faker\Factory as Faker;
use Str;

class OutlinerItemSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 5; $i++) { 
            $parent = OutlinerItem::create([
                'title' => $faker->jobTitle,
                'description' => $faker->sentence(20),
                'parent_id' => null,
                'user_id' => 1,
                'position' => 1,
                'sync_id' => Str::random(20),
            ]);

            for ($x=0; $x < 5; $x++) { 
                OutlinerItem::create([
                    'title' => $faker->jobTitle,
                    'description' => $faker->sentence(20),
                    'parent_id' => $parent->id,
                    'user_id' => 1,
                    'position' => 1,
                    'sync_id' => Str::random(20),
                ]);
            }
        }
    }
}
