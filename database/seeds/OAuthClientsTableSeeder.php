<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OAuthClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('oauth_clients')->insert([
          'id'         => 1,
          'secret'     => 'YZ<r2&%Jw,/tnhcm&&&zQ]',
          'name'       => 'web',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
      ]);
    }
}
