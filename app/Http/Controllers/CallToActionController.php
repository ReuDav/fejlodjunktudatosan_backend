<?php

namespace App\Http\Controllers;

use App\Http\Requests\HireMeRequest;
use App\Mail\HireMeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Validator;
use App\Models\CallToActionModel;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class CallToActionController extends Controller
{
    public function submit(Request $request){
        $validator = Validator::make($request->all(), [
            'TeljesNev' => 'required|string|min:3|max:70|regex:/^[A-Za-zÁáÉéÍíÓóÖöŐőÚúÜüŰű]+\s[A-Za-zÁáÉéÍíÓóÖöŐőÚúÜüŰű]+$/',
            'Email' => 'required|string|email',
            'Telefon' => 'required|numeric|digits:11',
            'Uzenet' => 'required|string|min:5|max:1500',
        ], [
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
            'Telefon.digits' => 'A telefonszámod pontosan 11 számjegyűnek kell lennie!',
            'Uzenet.required' => 'Az üzeneted nem lehet üres!',
            'Uzenet.string' => 'Az üzeneted csak betűkből és számokból állhat!',
            'Uzenet.min' => 'Az üzeneted legalább 5 betű hosszú legyen!',
            'Uzenet.max' => 'Az üzeneted legfeljebb 1500 betű hosszú lehet!',
        ]);
        
        if ($validator->fails()) {
            return redirect('/#call-to-action')->withErrors($validator); 
        }

        $CallToAction = new CallToActionModel();
        $CallToAction->name = $request->TeljesNev;
        $CallToAction->email = $request->Email;
        $CallToAction->phone = $request->Telefon;
        $CallToAction->message = $request->Uzenet;
        $CallToAction->sentAt = Carbon::now();
        $CallToAction->save();

        Mail::mailer('smtp')->to('reucovdavid@gmail.com')->send(new HireMeMail($request->TeljesNev, $request->Email, $request->Telefon, $request->Uzenet));
        return redirect('/#success')->with('success', 'Sikeresen elküldted az üzeneted! Hamarosan felveszem Veled a kapcsolatot!');

    }
}
