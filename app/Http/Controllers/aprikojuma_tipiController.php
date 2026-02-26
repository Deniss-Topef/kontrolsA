<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\aprikojums;

class aprikojuma_tipiController extends Controller
{
    public function izvadit()
    {
        $aprikojums = aprikojums::all();
        return view('aprikojums', compact('aprikojums'));
    }

    public function create(Request $aprikojums)
    {
        $aprikojums->validate([
            'tips' => 'required|string|max:50'
        ]);

        $aprikojum = new aprikojums;
        $aprikojum->tips = $aprikojums->input('tips');
        $aprikojum->save();

         return redirect('/aprikojums')->with('success', 'Aprīkojums pievienots!');
    }

    public function edit($id)
    {
        $a = aprikojums::findOrFail($id);
        return view('aprikojums.edit', compact('a'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tips' => 'required|string|max:50'
        ]);

        $a = aprikojums::find($id);
        $a->tips = $request->input('tips');
        $a->save();

        return redirect()->route('aprikojuma_tipi')->with('success', 'Aprīkojums atjaunināts!');
    }

    public function destroy($id)
    {
        $a = aprikojums::findOrFail($id);
        $a->delete();
        return redirect()->route('aprikojuma_tipi')->with('success', 'Aprīkojums dzēsts');
    }
}

