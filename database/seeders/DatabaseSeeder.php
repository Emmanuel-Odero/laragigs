<?php

namespace Database\Seeders;

use App\Models\Listing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();
        Listing::factory(4)->create();
        // Listing::create([
        //         'title'=>'Laravel Senior Developer',
        //         'tags'=>'Javascript, laravel, php',
        //         'company'=>'Arora Ltd',
        //         'location'=>'Nairobi, Kenya',
        //         'email'=>'mail@arora.com',
        //         'website'=>'www.arora.com',
        //         'description'=>'
        //         In publishing and graphic design, Lorem ipsum is a placeholder 
        //         text commonly used to demonstrate the visual form of a document 
        //         or a typeface without relying on meaningful content. Lorem ipsum 
        //         may be used as a placeholder before final copy is available.
        //         '
        //     ]);
        //     Listing::create([
        //         'title'=>'Full-stack Engineer',
        //         'tags'=>'Node, laravel, flask',
        //         'company'=>'Jumbo Ltd',
        //         'location'=>'Kampala, Uganda',
        //         'email'=>'info@jumbo.ug',
        //         'website'=>'www.jumbo.ug',
        //         'description'=>'
        //         In publishing and graphic design, Lorem ipsum is a placeholder 
        //         text commonly used to demonstrate the visual form of a document 
        //         or a typeface without relying on meaningful content. Lorem ipsum 
        //         may be used as a placeholder before final copy is available.
        //         '
        //     ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
