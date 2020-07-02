<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    User::create([
      'name' => 'Raphael Collin',
      'email' => 'super_admin@test.com',
      'password' => Hash::make('997967420'),
      'isSuperAdmin' => true
    ]);
    User::create([
      'name' => 'Bill Gates',
      'email' => 'admin@test.com',
      'password' => Hash::make('997967420'),
      'isSuperAdmin' => false
    ]);
  }
}
