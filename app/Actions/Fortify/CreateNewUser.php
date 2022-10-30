<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        // $messages = [
        //     'name.required' => "E' richiesto un nome",
        //     'name.string' => "E' richiesto che sia una frase",
        //     'name.min' => "E' richiesto che sia un minimo di 2 lettere",
        //     'name.max' => "E' richiesto che sia un massimo di 20 lettere",
        //     'username.required' => "E' richiesto un Username",
        //     'username.string' => "E' richiesto che sia una frase",
        //     'username.min' => "E' richiesto che sia un minimo di 2 lettere",
        //     'username.max' => "E' richiesto che sia un massimo di 20 lettere",
        //     'email.required' => "E' richiesta una mail",
        //     'email.string' => "E' richiesto che sia una frase",
        //     'email.email' => "E' richiesto che sia una email",
        //     'email.min' => "E' richiesto che sia un minimo di 2 lettere",
        //     'email.max' => "E' richiesto che sia un massimo di 20 lettere",
        //     'password.required' => "E' richiesto che ci sia una password",
        //     'password.confirmed' => "E' richiesta la conferma della password siano uguali",
        // ];

        Validator::make(
            $input,
            [
                'name' => [
                    'required',
                    'string',
                    'min:2',
                    'max:20'
                ],

                'username' => [
                    'required',
                    'string',
                    'min:2',
                    'max:20',
                    Rule::unique(User::class),
                ],

                'email' => [
                    'required',
                    'string',
                    'email',
                    'min:2',
                    'max:255',
                    Rule::unique(User::class),
                ],

                'password' => $this->passwordRules(),
            ],
        )->validate();


        return User::create([
            'name' => $input['name'],
            'username' => $input['username'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
