<?php

use App\conversations;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ConversationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(conversations::class, 20)->create();
    }
}
