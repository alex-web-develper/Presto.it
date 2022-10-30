<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use App\Models\Annuncement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{

    public function index()
    {
        $annuncement_to_check = Annuncement::where('is_accepted', null)->first();
        return view('revisor.index', compact('annuncement_to_check'));
    }

    // accettazione dell'annuncio
    public function acceptAnnuncement(Annuncement $annuncement)
    {
        $annuncement->setAccepted(true);
        return redirect()->back()->with('message', 'complimenti hai accettato l\'annuncio');
    }

    // rifiuto dell'annuncio
    public function rejectAnnuncement(Annuncement $annuncement)
    {
        $annuncement->setAccepted(false);
        return redirect()->back()->with('message', 'complimenti hai rifiutato l\'annuncio');
    }

    // modifica l'ultimo annunncio
    public function takeLastAnnuncement()
    {
        $annuncement_take_last = Annuncement::where('is_accepted', '!=', null)->get()->last();
        return view('revisor.takeLastAnnuncement', compact('annuncement_take_last'));
    }

    // accettazione dell'annuncio
    public function acceptLastAnnuncement(Annuncement $annuncement)
    {
        $annuncement->setAccepted(true);
        return redirect('/revisor/home')->with('message', 'complimenti hai accettato l\'annuncio');
    }

    // rifiuto dell'annuncio
    public function rejectLastAnnuncement(Annuncement $annuncement)
    {
        $annuncement->setAccepted(false);
        return redirect('/revisor/home')->with('message', 'complimenti hai rifiutato l\'annuncio');
    }

    // diventa un revisore
    public function becomeRevisor()
    {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with('message', 'complimenti! Hai richesto di diventare revisore correttamente');
    }
    // crea il revisore
    public function makeRevisor(User $user)
    {
        Artisan::call('presto:makeUserRevisor', ["email" => $user->email]);
        return redirect('/')->with('message', 'complimenti! L\'utente è diventato revisore');
    }
}
