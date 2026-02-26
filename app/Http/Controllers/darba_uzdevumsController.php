<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\darba_uzdevums;
use App\Models\darbinieks;
use App\Models\aprikojums;
use App\Models\klients;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class darba_uzdevumsController extends Controller
{
    public function izvadit()
    {
        $uzdevumi = darba_uzdevums::all();
        return view('darba_uzdevums', compact('uzdevumi'));
    }

    public function show($id)
    {
        $u = darba_uzdevums::findOrFail($id);
        return view('darba_uzdevums.show', compact('u'));
    }

    public function showNewUzdForm()
    {
        $klienti = klients::all();
        $aprikojums = aprikojums::all();
        $darbinieki = darbinieks::all();

        return view('darba_uzdevums.create', compact('klienti', 'aprikojums', 'darbinieki'));
    }

    public function create(Request $request)
    {
        $request->validate([
            
            'klienta_id' => 'required|integer|exists:klients,id',
            'aprikojuma_nosaukums' => 'required|string|max:80',
            'aprikojuma_tips_id' => 'required|integer|exists:aprikojuma_tipi,id',
            'uznemsanas_adrese' => 'required|string|max:100',
            'uznemsanas_dt' => 'required|date',
            'piegades_adrese' => 'required|string|max:100',
            'piegades_dt' => 'required|date',
            'piegades_darbinieks' => 'required|integer|exists:darbinieks,id',
            'piegades_transports' => 'required|string|max:255',
            'attalums_km' => 'required|numeric|min:0',
            'liguma_termins' => 'required|date',
            'pakalpojuma_apraksts' => 'required|string',
            'uzstadisanas_darbinieks' => 'required|integer|exists:darbinieks,id',
            'uzstadisanas_dt' => 'nullable|date',
            'uzstadisanas_komentars' => 'nullable|string',
            'cena' => 'nullable|numeric|min:0',
            'komentars' => 'nullable|string',
            'atbildigais_darbinieks_id' => 'required|integer|exists:darbinieks,id',
            'status' => 'nullable|string|max:25',
            'uzdevuma_kods' => 'required|string|max:25',
            'parole' => 'required|string|max:255',

        ]);

        $u = new darba_uzdevums;
        $u->klienta_id = $request->input('klienta_id');
        $u->aprikojuma_nosaukums = $request->input('aprikojuma_nosaukums');
        $u->aprikojuma_tips_id = $request->input('aprikojuma_tips_id');
        $u->uznemsanas_adrese = $request->input('uznemsanas_adrese');
        $u->uznemsanas_dt = $request->input('uznemsanas_dt');
        $u->piegades_adrese = $request->input('piegades_adrese');
        $u->piegades_dt = $request->input('piegades_dt');
        $u->piegades_darbinieks = $request->input('piegades_darbinieks');
        $u->piegades_transports = $request->input('piegades_transports');
        $u->attalums_km = $request->input('attalums_km');
        $u->liguma_termins = $request->input('liguma_termins');
        $u->pakalpojuma_apraksts = $request->input('pakalpojuma_apraksts');
        $u->uzstadisanas_darbinieks = $request->input('uzstadisanas_darbinieks');
        $u->uzstadisanas_dt = $request->input('uzstadisanas_dt');
        $u->uzstadisanas_komentars = $request->input('uzstadisanas_komentars') ?? null;
        // $u->faila_tips = $request->input('faila_tips') ?? null;
        // $u->faila_cels = $request->input('faila_cels') ?? null;
        $u->cena = $request->input('cena');
        $u->komentars = $request->input('komentars') ?? 'Nav komentāru';
        $u->atbildigais_darbinieks_id = $request->input('atbildigais_darbinieks_id');
        $u->status = $request->input('status');
        $u->uzdevuma_kods = $request->input('uzdevuma_kods');
        $u->parole = bcrypt($request->input('parole'));
        $u->save();

        return redirect('/darba_uzdevums')->with('success', 'Darba uzdevums veiksmīgi izveidots!');
    }

    public function edit($id)
    {
        $u = darba_uzdevums::findOrFail($id);
        return view('darba_uzdevums.edit', compact('u'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'uzdevuma_kods' => 'required|string|max:25',
            'status' => 'nullable|string|max:25',
            'klienta_id' => 'required|integer|exists:klients,id',
            'aprikojuma_nosaukums' => 'required|string|max:80',
            'aprikojuma_tips_id' => 'required|integer|exists:aprikojuma_tipi,id',
            'uznemsanas_adrese' => 'required|string|max:100',
            'uznemsanas_dt' => 'required|date',
            'piegades_adrese' => 'required|string|max:100',
            'piegades_dt' => 'required|date',
            'piegades_darbinieks' => 'required|integer|exists:darbinieks,id',
            'piegades_transports' => 'required|string|max:255',
            'attalums_km' => 'required|numeric|min:0',
            'liguma_termins' => 'required|date',
            'pakalpojuma_apraksts' => 'required|string',
            'uzstadisanas_darbinieks' => 'required|integer|exists:darbinieks,id',
            'uzstadisanas_dt' => 'nullable|date',
            'uzstadisanas_komentars' => 'nullable|string',
            'faila_tips' => 'nullable|string|max:255',
            'faila_cels' => 'nullable|string|max:255',
            'cena' => 'nullable|numeric|min:0',
            'atbildigais_darbinieks_id' => 'required|integer|exists:darbinieks,id',
            'parole' => 'required|string|max:255',
            'komentars' => 'nullable|string'
        ]);

        $u = darba_uzdevums::find($id);
        $u->uzdevuma_kods = $request->input('uzdevuma_kods');
        $u->status = $request->input('status');
        $u->klienta_id = $request->input('klienta_id');
        $u->aprikojuma_nosaukums = $request->input('aprikojuma_nosaukums');
        $u->aprikojuma_tips_id = $request->input('aprikojuma_tips_id');
        $u->uznemsanas_adrese = $request->input('uznemsanas_adrese');
        $u->uznemsanas_dt = $request->input('uznemsanas_dt');
        $u->piegades_adrese = $request->input('piegades_adrese');
        $u->piegades_dt = $request->input('piegades_dt');
        $u->piegades_darbinieks = $request->input('piegades_darbinieks');
        $u->piegades_transports = $request->input('piegades_transports');
        $u->attalums_km = $request->input('attalums_km');
        $u->liguma_termins = $request->input('liguma_termins');
        $u->pakalpojuma_apraksts = $request->input('pakalpojuma_apraksts');
        $u->uzstadisanas_darbinieks = $request->input('uzstadisanas_darbinieks');
        $u->uzstadisanas_dt = $request->input('uzstadisanas_dt');
        $u->uzstadisanas_komentars = $request->input('uzstadisanas_komentars')?? 'Nav komentāru';
        $u->faila_tips = $request->input('faila_tips');
        $u->faila_cels = $request->input('faila_cels');
        $u->cena = $request->input('cena');
        $u->atbildigais_darbinieks_id = $request->input('atbildigais_darbinieks_id');
        $u->parole = $request->input('parole');
        $u->komentars = $request->input('komentars') ?? 'Nav komentāru';
        $u->save();

        return redirect()->route('darba_uzdevums')->with('success', 'Uzdevums atjaunināts!');
    }

    public function destroy($id)
    {
        $u = darba_uzdevums::findOrFail($id);
        $u->delete();
        return redirect()->route('darba_uzdevums')->with('success', 'Uzdevums dzēsts');
    }
}
