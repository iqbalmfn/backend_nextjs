<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'name' => 'Laravel',
                'icon' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png'
            ],
            [
                'name' => 'React JS',
                'icon' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/React-icon.svg/1200px-React-icon.svg.png'
            ],
            [
                'name' => 'Vue JS',
                'icon' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Vue.js_Logo_2.svg/1200px-Vue.js_Logo_2.svg.png'
            ],
            [
                'name' => 'Angular JS',
                'icon' => 'https://angular.io/assets/images/logos/angularjs/AngularJS-Shield.svg'
            ],
        ])->each(fn ($q) => Category::create($q));
    }
}
