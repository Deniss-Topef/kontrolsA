<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\klients;

class klientsController extends Controller
{
    public function izvadit()
    {
        $klients = klients::all();
        return view('klients', compact('klients'));
    }

    public function show($id)
    {
        $klient = klients::findOrFail($id);
        return view('klients.show', compact('klient'));
    }

        public function create(Request $klients)
        {
            $klients->validate([
                'vards' => 'required|string|max:25',
                'uzvards' => 'required|string|max:25',
                'tel_num' => 'required|digits_between:8,12',
                'e_pasts' => 'nullable|email|max:50|unique:klients,e_pasts',
                'adrese' => 'nullable|string|max:100',
                'komentars' => 'nullable|string'
            ]);
    
            $klient = new klients;
            $klient->vards = $klients->input('vards');
            $klient->uzvards = $klients->input('uzvards');
            $klient->tel_num = $klients->input('tel_num');
            $klient->e_pasts = $klients->input('e_pasts');
            $klient->adrese = $klients->input('adrese');
            $klient->komentars = $klients->input('komentars') ?? 'Nav komentāru';
            $klient->save();
    
            return redirect('/klients')->with('success', 'Klients pievienots!');
        }

    public function edit($id)
    {
        $klient = klients::findOrFail($id);
        return view('klients.edit', compact('klient'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'vards' => 'required|string|max:25',
            'uzvards' => 'required|string|max:25',
            'tel_num' => 'required|digits_between:8,12',
            'e_pasts' => 'nullable|email|max:50|unique:klients,e_pasts,' . $id,
            'adrese' => 'nullable|string|max:100',
            'komentars' => 'nullable|string'
        ]);

        $klient = klients::find($id);

        $klient->vards = $request->input('vards');
        $klient->uzvards = $request->input('uzvards');
        $klient->tel_num = $request->input('tel_num');
        $klient->e_pasts = $request->input('e_pasts');
        $klient->adrese = $request->input('adrese');
        $klient->komentars = $request->input('komentars') ?? 'Nav komentāru';
        $klient->save();

        return redirect()->route('klients')->with('success', 'Klients atjaunināts!');
    }

    public function destroy($id)
    {
        $klient = klients::findOrFail($id);
        $klient->delete();
        return redirect()->route('klients')->with('success', 'Klients dzēsts');
    }
}
