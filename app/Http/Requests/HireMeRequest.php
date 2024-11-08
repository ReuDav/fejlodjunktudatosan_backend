<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Validator;

class HireMeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'TeljesNev' => ['required'],['string'],['min:3'],['max:70'],['regex:/^[A-Za-z]+\s[A-Za-z]+$/'],
            'Email' =>  ['required'],['string'],['email'],
            'Telefon' => ['required'],['numeric'],['digits:11'],
            'Uzenet' => ['required'],['string'],['min:30'],['max:1500']
        ];
    }
    public function messages()
    {
        return [
            'TeljesNev.required' => 'A neved megadása kötelező!',
            'TeljesNev.string' => 'A neved csak betűkből állhat!',
            'TeljesNev.min' => 'A neved legalább 3 betű hosszú legyen!',
            'TeljesNev.max' => 'A neved legfeljebb 70 betű hosszú lehet!',
            'TeljesNev.regex' => 'A teljes nevedet add meg, egy szóközzel elválasztva!',
            'Email.required' => 'Az e-mail címed megadása kötelező!',
            'Email.string' => 'Az Email mező csak szöveget fogad el!',
            'Email.email' => 'Az Email mező érvénytelen e-mail címet tartalmaz!',
            'Telefon.required' => 'A telefonszámod megadása kötelező!',
            'Telefon.numeric' => 'A telefonszámod csak számokat fogad el!',
            'Telefon.digits' => 'A telefonszámod pontosan 11 számjegyű kell legyen!',
            'Uzenet.required' => 'Az üzeneted nem lehet üres!',
            'Uzenet.string' => 'Az üzeneted csak betűkből és számokból állhat!',
            'Uzenet.min' => 'Az üzeneted legalább 30 betű hosszú legyen!',
            'Uzenet.max' => 'Az üzeneted legfeljebb 1500 betű hosszú lehet!',
        ];
    }
}
