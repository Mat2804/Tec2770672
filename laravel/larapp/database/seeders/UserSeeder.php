<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user= new User;
        $user->document=7500001;
        $user->fullname='Alfredo';
         $user->photo='';
         $user->phone='216465125';
         $user->email='alf@gmail.com';
         $user->password=bcrypt('admi');
         $user->role='Admi';
         $user->save();

DB::table ('users')->insert ([
'document'=>7500002,
'fullname'=>'Jaime',
'photo'=>'',
'phone'=>'216468455',
'email'=>'Jim@gmail.com',
'password'=>bcrypt('1234'),

]);

    }
}
