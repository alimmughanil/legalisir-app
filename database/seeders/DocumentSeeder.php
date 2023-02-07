<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Document::factory()->count(2)->create();
        Document::create([
            'user_id' => 4,
            'school_id' => 1,
            'ijazah' => 'https://source.unsplash.com/random/1280x720/?landscape',
            'transkrip' => 'https://source.unsplash.com/random/1280x720/?landscape',
            'statement_letter' => 'https://source.unsplash.com/random/1280x720/?landscape',
            'status' => 'Confirm'
        ]);
    }
}