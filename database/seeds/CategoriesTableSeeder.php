<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $data = [
      ['name' => 'Tech', 'locale' => 'en'],
      ['name' => 'Travel', 'locale' => 'en'],
      ['name' => 'Food', 'locale' => 'en'],
      ['name' => 'Sports', 'locale' => 'en'],
      ['name' => 'Events', 'locale' => 'en'],
      ['name' => 'Tecnologia', 'locale' => 'pt'],
      ['name' => 'Viagens', 'locale' => 'pt'],
      ['name' => 'Comida', 'locale' => 'pt'],
      ['name' => 'Esportes', 'locale' => 'pt'],
      ['name' => 'Eventos', 'locale' => 'pt']
    ];

    foreach ($data as $category) {
      Category::create($category);
    }
  }
}
