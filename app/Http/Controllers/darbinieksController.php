<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\darbinieks;
use App\Models\amati;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class darbinieksController extends Controller
{
    public function izvadit()
    {
        $darbinieki = darbinieks::all();
        return view('darbinieks', compact('darbinieki'));
    }

    public function show($id)
    {
        $d = darbinieks::findOrFail($id);
        return view('darbinieks.show', compact('d'));
    }

    public function showNewDarbForm()
    {
        $amati = amati::all();

        return view('darbinieks.create', compact('amati'));
    }


            public function create(Request $darbinieks)
        {
            $darbinieks->validate([
                'vards' => 'required|string|max:25',
                'uzvards' => 'required|string|max:25',
                'dzimsanas_d' => 'required|date',
                'darba_uzsaka_d' => 'required|date',
                'amati_id' => 'required|integer',
                'tel_num' => 'required|digits_between:8,12',
                'e_pasts' => 'required|email|max:50',
                'lietotajvards' => 'required|string|max:30|unique:darbinieks',
                'parole' => 'required|string|min:6',
                'komentars' => 'nullable|string'
            ]);
    
            $d = new darbinieks;
            $d->vards = $darbinieks->input('vards');
            $d->uzvards = $darbinieks->input('uzvards');
            $d->dzimsanas_d = $darbinieks->input('dzimsanas_d');
            $d->darba_uzsaka_d = $darbinieks->input('darba_uzsaka_d');
            $d->amati_id = $darbinieks->input('amati_id');
            $d->tel_num = $darbinieks->input('tel_num');
            $d->e_pasts = $darbinieks->input('e_pasts');
            $d->lietotajvards = $darbinieks->input('lietotajvards');
            $d->parole = Hash::make($darbinieks->input('parole'));
            $d->komentars = $darbinieks->input('komentars') ?? 'Nav komentāru';
            $d->save();
    
            return redirect('/darbinieks')->with('success', 'Darbinieks pievienots!');
        }

    public function edit($id)
    {
        $d = darbinieks::findOrFail($id);
        $amati = \App\Models\amati::all();
        return view('darbinieks.edit', compact('d', 'amati'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'vards' => 'required|string|max:25',
            'uzvards' => 'required|string|max:25',
            'dzimsanas_d' => 'required|date',
            'darba_uzsaka_d' => 'required|date',
            'amati_id' => 'required|integer',
            'tel_num' => 'required|digits_between:8,12',
            'e_pasts' => 'required|email|max:50',
            'lietotajvards' => 'required|string|max:30|unique:darbinieks,lietotajvards,' . $id,
            'parole' => 'required|string|min:6',
            'komentars' => 'nullable|string'
        ]);

        $d = darbinieks::find($id);
        $d->vards = $request->input('vards');
        $d->uzvards = $request->input('uzvards');
        $d->dzimsanas_d = $request->input('dzimsanas_d');
        $d->darba_uzsaka_d = $request->input('darba_uzsaka_d');
        $d->amati_id = $request->input('amati_id');
        $d->tel_num = $request->input('tel_num');
        $d->e_pasts = $request->input('e_pasts');
        $d->lietotajvards = $request->input('lietotajvards');
        if ($request->filled('parole')) {
        $d->parole = Hash::make($request->parole);}
        
        $d->komentars = $request->input('komentars') ?? 'Nav komentāru';
        $d->save();

        return redirect()->route('darbinieks')->with('success', 'Darbinieks atjaunināts!');
    }

    public function destroy($id)
    {
        $d = darbinieks::findOrFail($id);
        $d->delete();
        return redirect()->route('darbinieks')->with('success', 'Darbinieks dzēsts');
    }

    public function login(Request $request)
    {
        $request->validate([
            'lietotajvards' => 'required|string',
            'parole' => 'required|string',
        ]);

        $darbinieks = darbinieks::where('lietotajvards', $request->input('lietotajvards'))->first();

        if ($darbinieks && password_verify($request->input('parole'), $darbinieks->parole)) {
            // Autentifikācija veiksmīga
            return redirect()->route('home')->with('success', 'Veiksmīgi ielogojies!');
        } else {
            // Autentifikācija neizdevās
            return back()->withErrors(['login_error' => 'Nederīgs lietotājvārds vai parole']);
        }
    }

}
