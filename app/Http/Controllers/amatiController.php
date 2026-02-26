<?php

namespace App\Http\Controllers;

use App\Models\Amati;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class amatiController extends Controller
{
    public function all()
    {
        $amati = Amati::all();
        return view('atskaites', compact('amati'));
    }

    public function izvadit()
    {
        $amati = Amati::all();
        return view('amati', compact('amati'));
    }

     public function create(Request $amats)
    {
        $amats->validate([
            'amats' => 'required|string|max:50'
        ]);

        $aprikojum = new Amati;
        $aprikojum->amats = $amats->input('amats');
        $aprikojum->save();

         return redirect('/amati')->with('success', 'Amats pievienots!');
    }

    public function edit($id)
    {
        $amats = Amati::findOrFail($id);
        return view('amati.edit', compact('amats'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'amats' => 'required|string|max:50'
        ]);

        $amats = Amati::find($id);
        $amats->amats = $request->input('amats');
        $amats->save();

        return redirect()->route('amati')->with('success', 'Amats atjaunināts!');
    }

    public function destroy($id)
    {
        $amats = Amati::findOrFail($id);
        $amats->delete();
        return redirect()->route('amati')->with('success', 'Amats dzēsts');
    }
}
