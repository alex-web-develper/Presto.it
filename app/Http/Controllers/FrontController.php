<?php

namespace App\Http\Controllers;

use App\Models\Annuncement;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Provinces;
use App\Models\User;

class FrontController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth')->except('categoryShow', 'homepage', 'searchAnnuncements');
    // }

    public function homepage()
    {
        $annuncements = Annuncement::where('is_accepted', true)->orderBy('created_at', 'DESC')->take(6)->get();

        return view('welcome', compact('annuncements'));
    }

    // gestione categorie
    public function categoryShow(Category $category)
    {
        return view('categoryShow', compact('category'));
    }

    //* funzione di ricerca
    public function searchAnnuncements(Request $request)
    {
        $annuncements = Annuncement::search($request->searched)->where('is_accepted', true)->paginate(10);

        return view('annuncement.search', compact('annuncements'));
    }
    //* funzione cambio linguaggio
    public function setLanguage($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }
    // Funzione del profilo
    public function profile()
    {
        $annuncements = Annuncement::where('is_accepted', true)->orderBy('created_at', 'DESC')->get();
        return view('profile', compact('annuncements'));
    }
}
