<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //usuario administrador

       User::create([ 'primer_nombre'=>'Sandro',
        'segundo_nombre'=>'David',
        'primer_apellido'=>'Quiñones',
        'segundo_apellido'=>'Bacca',
        'tipo_documento'=>'1',
        'documento'=>1018504291,
        'email'=>'davinchi1066@hotmail.com',
        'password'=>Hash::make('12345678'),
        'role_user'=>'Admin']);
        //usuario normales
        for($i=1000;$i<=2000;$i++){

            User::create([ 'primer_nombre'=>'nombre'.($i-999),
            'segundo_nombre'=>'nombre2'.($i-999),
            'primer_apellido'=>'apellido'.($i-999),
            'segundo_apellido'=>'apellido2'.($i-999),
            'tipo_documento'=>'1',
            'documento'=>$i,
            'email'=>'usuario'.$i.'@hotmail.com',
            'role_user'=>'',
            'password'=>Hash::make('12345678')]);
    
        }
      
    }
}
