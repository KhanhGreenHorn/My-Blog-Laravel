<?php

namespace Database\Seeders;

use App\Models\Post;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Post::create([
            'title' => 'Title 1',
            'body' => 'The dispute between Darnhall and Vale Royal Abbey arose in the early fourteenth century. Tensions in Cheshire between villagers from Darnhall and Over and their feudal lord, Abbot Peter of Vale Royal Abbey, erupted into violence over whether they had villein—servile—status. The villagers\' efforts to reject the Abbey\'s feudal overlordship included appeals to the Abbot, the Justice of Chester and even to the King and Queen. On each occasion the villagers were unsuccessful, frequently suffering imprisonment and fines when their appeals failed. On one occasion the villagers of Darnhall and Over followed Peter to Rutland; an affray broke out, the Abbot\'s groom was killed and Peter and his entourage were captured. The King intervened and released him; the Abbot then had the villagers imprisoned again. Abbot Peter was killed a few years later. Nothing is known of any resolution to the dispute, but serfdom was in decline nationally and Peter\'s successor may have had other priorities.'
        ]);

        Post::create([
            'title' => 'Title 2',
            'body' => 'The dispute between Darnhall and Vale Royal Abbey arose in the early fourteenth century. Tensions in Cheshire between villagers from Darnhall and Over and their feudal lord, Abbot Peter of Vale Royal Abbey, erupted into violence over whether they had villein—servile—status. The villagers\' efforts to reject the Abbey\'s feudal overlordship included appeals to the Abbot, the Justice of Chester and even to the King and Queen. On each occasion the villagers were unsuccessful, frequently suffering imprisonment and fines when their appeals failed. On one occasion the villagers of Darnhall and Over followed Peter to Rutland; an affray broke out, the Abbot\'s groom was killed and Peter and his entourage were captured. The King intervened and released him; the Abbot then had the villagers imprisoned again. Abbot Peter was killed a few years later. Nothing is known of any resolution to the dispute, but serfdom was in decline nationally and Peter\'s successor may have had other priorities.'
        ]);

        Post::create([
            'title' => 'Title 3',
            'body' => 'The dispute between Darnhall and Vale Royal Abbey arose in the early fourteenth century. Tensions in Cheshire between villagers from Darnhall and Over and their feudal lord, Abbot Peter of Vale Royal Abbey, erupted into violence over whether they had villein—servile—status. The villagers\' efforts to reject the Abbey\'s feudal overlordship included appeals to the Abbot, the Justice of Chester and even to the King and Queen. On each occasion the villagers were unsuccessful, frequently suffering imprisonment and fines when their appeals failed. On one occasion the villagers of Darnhall and Over followed Peter to Rutland; an affray broke out, the Abbot\'s groom was killed and Peter and his entourage were captured. The King intervened and released him; the Abbot then had the villagers imprisoned again. Abbot Peter was killed a few years later. Nothing is known of any resolution to the dispute, but serfdom was in decline nationally and Peter\'s successor may have had other priorities.'
        ]);
    }
}
