<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $data = [
      ['name' => 'Tech', 'slug' => Str::slug('Tech'), 'locale' => 'en'],
      ['name' => 'Travel', 'slug' => Str::slug('Travel'), 'locale' => 'en'],
      ['name' => 'Food', 'slug' => Str::slug('Food'), 'locale' => 'en'],
      ['name' => 'Sports', 'slug' => Str::slug('Sports'), 'locale' => 'en'],
      ['name' => 'Events', 'slug' => Str::slug('Events'), 'locale' => 'en'],
      [
        'name' => 'Tecnologia',
        'slug' => Str::slug('Tecnologia'),
        'locale' => 'pt'
      ],
      ['name' => 'Viagens', 'slug' => Str::slug('Viagens'), 'locale' => 'pt'],
      ['name' => 'Comida', 'slug' => Str::slug('Comida'), 'locale' => 'pt'],
      ['name' => 'Esportes', 'slug' => Str::slug('Esportes'), 'locale' => 'pt'],
      ['name' => 'Eventos', 'slug' => Str::slug('Eventos'), 'locale' => 'pt']
    ];

    foreach ($data as $category) {
      Category::create($category);
    }
  }
}
