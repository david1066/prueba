<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //validacion tipo_documento y documento unicos
        $uniqueRule =  Rule::unique('users')->where(function ($query) use 
                    ($data){
                        return $query->where('tipo_documento', $data['tipo_documento']??'')
                        ->where('documento', $data['documento']??'');
                    });
        return Validator::make($data, [
            'primer_nombre' => ['required', 'string', 'max:255'],
            'segundo_nombre' => ['required', 'string', 'max:255'],
            'primer_apellido' => ['required', 'string', 'max:255'],
            'segundo_apellido' => ['required', 'string', 'max:255'],
            'tipo_documento' => ['required', 'integer',$uniqueRule],
            'documento' => ['required', 'digits_between:4,10','integer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $role_user='';
        if(isset( $data['role_user'])){
            $role_user='Admin';
        }
       /*  dd($data); */
        return User::create([
            'primer_nombre' => $data['primer_nombre'],
            'segundo_nombre' => $data['segundo_nombre'],
            'primer_apellido' => $data['primer_apellido'],
            'segundo_apellido' => $data['segundo_apellido'],
            'tipo_documento' => $data['tipo_documento'],
            'documento' => $data['documento'],
            'email' => $data['email'],
            'role_user' => $role_user,
            'password' => Hash::make($data['password']),
        ]);
    }
}
