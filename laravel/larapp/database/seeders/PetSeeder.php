<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Pet;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//
         $pet= new Pet;
         $pet->name='Firu';
         $pet->photo='';
         $pet->kind='Dog';
         $pet->age='5';
         $pet->breed='Pequines';
         $pet->weight='4';
         $pet->location='Manizales';
         $pet->save();
        
    }
}
