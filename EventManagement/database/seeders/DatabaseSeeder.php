<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\City;
use App\Models\Country;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User1',
            'email' => 'test@example1.com',
        ]);

       // Adding initial countries and cities
Country::create(['name' => 'United Kingdom']);
Country::create(['name' => 'Greece']);
City::create(['country_id' => 1, 'name' => 'London']);
City::create(['country_id' => 1, 'name' => 'Liverpool']);
City::create(['country_id' => 1, 'name' => 'Leicester']);
City::create(['country_id' => 2, 'name' => 'Athens']);
City::create(['country_id' => 2, 'name' => 'Patra']);
City::create(['country_id' => 2, 'name' => 'Zakynthos']);

// Adding new countries and cities
Country::create(['name' => 'Sri Lanka']);
City::create(['country_id' => 3, 'name' => 'Colombo']);
City::create(['country_id' => 3, 'name' => 'Kandy']);
City::create(['country_id' => 3, 'name' => 'Galle']);

Country::create(['name' => 'France']);
City::create(['country_id' => 4, 'name' => 'Paris']);
City::create(['country_id' => 4, 'name' => 'Lyon']);
City::create(['country_id' => 4, 'name' => 'Marseille']);

Country::create(['name' => 'Germany']);
City::create(['country_id' => 5, 'name' => 'Berlin']);
City::create(['country_id' => 5, 'name' => 'Hamburg']);
City::create(['country_id' => 5, 'name' => 'Munich']);

Country::create(['name' => 'Italy']);
City::create(['country_id' => 6, 'name' => 'Rome']);
City::create(['country_id' => 6, 'name' => 'Milan']);
City::create(['country_id' => 6, 'name' => 'Venice']);

Country::create(['name' => 'Spain']);
City::create(['country_id' => 7, 'name' => 'Madrid']);
City::create(['country_id' => 7, 'name' => 'Barcelona']);
City::create(['country_id' => 7, 'name' => 'Valencia']);

Country::create(['name' => 'Canada']);
City::create(['country_id' => 8, 'name' => 'Toronto']);
City::create(['country_id' => 8, 'name' => 'Vancouver']);
City::create(['country_id' => 8, 'name' => 'Montreal']);

Country::create(['name' => 'Australia']);
City::create(['country_id' => 9, 'name' => 'Sydney']);
City::create(['country_id' => 9, 'name' => 'Melbourne']);
City::create(['country_id' => 9, 'name' => 'Brisbane']);

Country::create(['name' => 'India']);
City::create(['country_id' => 10, 'name' => 'Delhi']);
City::create(['country_id' => 10, 'name' => 'Mumbai']);
City::create(['country_id' => 10, 'name' => 'Bangalore']);

Country::create(['name' => 'Japan']);
City::create(['country_id' => 11, 'name' => 'Tokyo']);
City::create(['country_id' => 11, 'name' => 'Osaka']);
City::create(['country_id' => 11, 'name' => 'Kyoto']);

Country::create(['name' => 'Brazil']);
City::create(['country_id' => 12, 'name' => 'Rio de Janeiro']);
City::create(['country_id' => 12, 'name' => 'Sao Paulo']);
City::create(['country_id' => 12, 'name' => 'Brasilia']);

// Adding initial tags
Tag::create(['name' => 'Laravel', 'slug' => 'laravel']);
Tag::create(['name' => 'Vue JS', 'slug' => 'vue-js']);
Tag::create(['name' => 'Livewire', 'slug' => 'livewire']);
Tag::create(['name' => 'React', 'slug' => 'react']);
Tag::create(['name' => 'Angular', 'slug' => 'angular']);
Tag::create(['name' => 'Node JS', 'slug' => 'node-js']);
Tag::create(['name' => 'Express', 'slug' => 'express']);
Tag::create(['name' => 'Django', 'slug' => 'django']);
Tag::create(['name' => 'Flask', 'slug' => 'flask']);
Tag::create(['name' => 'Ruby on Rails', 'slug' => 'ruby-on-rails']);
Tag::create(['name' => 'Spring', 'slug' => 'spring']);
Tag::create(['name' => 'ASP.NET', 'slug' => 'asp-net']);
Tag::create(['name' => 'Symfony', 'slug' => 'symfony']);
Tag::create(['name' => 'CakePHP', 'slug' => 'cakephp']);
Tag::create(['name' => 'CodeIgniter', 'slug' => 'codeigniter']);
Tag::create(['name' => 'Yii', 'slug' => 'yii']);
Tag::create(['name' => 'Zend', 'slug' => 'zend']);
Tag::create(['name' => 'Svelte', 'slug' => 'svelte']);
Tag::create(['name' => 'Backbone', 'slug' => 'backbone']);
Tag::create(['name' => 'Ember', 'slug' => 'ember']);
Tag::create(['name' => 'Meteor', 'slug' => 'meteor']);

    }
}
