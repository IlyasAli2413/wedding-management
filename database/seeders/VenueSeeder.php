<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Venue;

class VenueSeeder extends Seeder
{
    public function run()
    {
        Venue::insert([
            ['Name'=>'Grand Ballroom','Location'=>'Downtown','Capacity'=>300],
            ['Name'=>'Beach Resort','Location'=>'Coastal Area','Capacity'=>150],
            ['Name'=>'Garden Palace','Location'=>'City Center','Capacity'=>200],
            ['Name'=>'Mountain Lodge','Location'=>'Scenic View','Capacity'=>100],
            ['Name'=>'Historic Mansion','Location'=>'Old Town','Capacity'=>250],
            ['Name'=>'Rooftop Terrace','Location'=>'Skyline','Capacity'=>80],
            ['Name'=>'Country Club','Location'=>'Suburban','Capacity'=>180],
            ['Name'=>'Vineyard Estate','Location'=>'Wine Country','Capacity'=>120],
        ]);
    }
} 