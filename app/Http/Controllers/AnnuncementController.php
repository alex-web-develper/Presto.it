<?php

namespace App\Http\Controllers;

use App\Models\Annuncement;
use Illuminate\Http\Request;


class AnnuncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAnnuncement()
    {
        return view('annuncement.create');
    }

    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except('index', 'show');
    }

    public function index()
    {
        $annuncements = Annuncement::where('is_accepted', true)->get();
        return view('annuncement.index', compact('annuncements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('annuncement.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Annuncement  $annuncement
     * @return \Illuminate\Http\Response
     */
    public function show(Annuncement $annuncement)
    {

        return view('annuncement.show', compact('annuncement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Annuncement  $annuncement
     * @return \Illuminate\Http\Response
     */
    public function edit(Annuncement $annuncement)
    {
        return view('annuncement.edit', compact('annuncement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Annuncement  $annuncement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Annuncement $annuncement)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Annuncement  $annuncement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Annuncement $annuncement)
    {
        //
    }
}
