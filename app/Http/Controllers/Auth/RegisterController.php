<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


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
    protected $redirectTo = '/';

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


        return Validator::make($data, [
            'nome' => ['required', 'string', 'max:255','min:2'],
            'cognome' => ['required', 'string', 'max:255','min:2'],
            'email' => ['required', 'string', 'email', 'max:255','min:2','unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'compleanno' => ['required','before:18 years ago'],
            'sesso' => ['required'],
            'phone' => 'required|numeric|min:10',
            'accept_terms' => ['required']
        ], [
            'compleanno.date_format' => 'il formato della data è errato',
            'compleanno.before' => 'sei troppo giovane per iscriverti al portale',
            'accepted' => 'il campo :attribute deve essere accettato.',
            'alpha' => 'il campo :attribute contiene caratteri non ammessi',
            'confirmed' => 'il campo :attribute deve combaciare',
            'email' => 'è necessario un formato e-mail valido',
            'required' => 'il campo :attribute non può essere vuoto',
            'accept_terms.required' => 'è necessario accettare i termini di uso',
            'unique' => 'il campo risulta essere già presente',
             'size' => 'il campo :attribute richiede almeno :size caratteri',
            'numeric' => 'il campo :attribute può contenere solo numeri',
             'min' => [
                    'numeric' => 'il campo :attribute deve contenere almeno :min. caratteri',
                    'file' => 'The :attribute must be at least :min kilobytes.',
                    'string' => 'il campo :attribute deve contenere almeno :min. caratteri',
                    'array' => 'The :attribute must have at least :min items.',
            ]
        ]);


        /*

        [
            'compleanno.date_format' => 'il formato della data è errato',
            'compleanno.before' => 'sei troppo giovane per iscriverti al portale',
            'accepted' => 'il campo :attribute deve essere accettato.',
            'alpha' => 'il campo :attribute contiene caratteri non ammessi',
            'confirmed' => 'il campo :attribute deve combaciare',
            'email' => 'è necessario un formato e-mail valido',
            'required' => 'il campo :attribute non può essere vuoto',
            'accept_terms.required' => 'è necessario accettare i termini di uso',
            'unique' => 'il campo risulta essere già presente',
             'size' => 'il campo :attribute richiede almeno :size caratteri',
            'numeric' => 'il campo :attribute può contenere solo numeri',
             'min' => [
                    'numeric' => 'il campo :attribute deve contenere almeno :min. caratteri',
                    'file' => 'The :attribute must be at least :min kilobytes.',
                    'string' => 'il campo :attribute deve contenere almeno :min. caratteri',
                    'array' => 'The :attribute must have at least :min items.',
            ]
        ]

        */


    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $user = User::create([
            'nome' => $data['nome'],
            'cognome' => $data['cognome'],
            'sesso' => $data["sesso"],
            'compleanno' => $data['compleanno'],
            'phone' => $data["phone"],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        session(['success' => "Thanks, {$user->nome}! Il sistema ti ha perfettamente registrato. Ora occorre verificare la tua e-mail (controlla lo spam)"]);


        return $user;

    }
}
