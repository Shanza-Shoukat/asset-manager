<?php

namespace Database\Seeders;

use App\Models\Asset;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Asset::updateOrCreate(
            ['asset_tag'=>'tag1',
                'name'=>'dell laptop',
                'serial_number' => '01',
                'category'=>'laptop',
            ]
        );
        Asset::updateOrCreate(
            ['asset_tag'=>'tag2',
                'name'=>'sumsung',
                'serial_number' => '02',
                'category'=>'laptop',
            ]
        );
        Asset::updateOrCreate(
            ['asset_tag'=>'tag3',
                'name'=>'kuch bi',
                'serial_number' => '03',
                'category'=>'other',
            ]
        );
    }
}
