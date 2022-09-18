<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    User::create([
      'name' => 'Iqbal Muhammad Fajar Nuralam',
      'email' => 'iqbalmfn@gmail.com',
      'email_verified_at' => now(),
      'password' => bcrypt('iqbal2804')
    ]);
  }
}
