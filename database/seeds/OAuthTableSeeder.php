<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class OAuthTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datetime = Carbon::now();

        $clients = [
            [
                'id' => 'appid1',
                'secret' => 'secret',
                'name' => 'Minha App Multiauth Test',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
        ];

        DB::table('oauth_clients')->insert($clients);

    }
}
