<?php

namespace App\Http\Controllers;

use App\Models\Potensi;
use App\Models\Event;
use App\Models\Companies;
use Illuminate\Http\Request;

class PotensiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $company = Companies::get(['id', 'company_name']);
        $data = Event::findOrFail($id);
        return view('potensi.create', compact('company', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $event = Event::find($id);
        $data = Potensi::create([
            'status_id' => 1,
            'event_id' => $event->id,
            'company_id' => $request->company_id,
            'potensi' => str_replace('.', '', $request->potensi),
            // 'aktual_potensi' => str_replace('.', '', $request->aktual_potensi),
            'aktual_revenue' => str_replace('.', '', $request->aktual_revenue),
        ]);

        if ($data) {
            return redirect()->route('event.edit', $event->id)->withStatus('data berhasil diinput');
        } else {
            return redirect()->back()->withErrors('data gagal diinput');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Potensi  $potensi
     * @return \Illuminate\Http\Response
     */
    public function show(Potensi $potensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Potensi  $potensi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Companies::get(['id', 'company_name']);
        $data = Potensi::findOrFail($id);
        return view('potensi.edit', compact('company', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Potensi  $potensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Potensi::find($id);
        $data->update([
            'company_id' => $request->company_id,
            'potensi' => str_replace('.', '', $request->potensi),
            // 'aktual_potensi' => str_replace('.', '', $request->aktual_potensi),
            'aktual_revenue' => str_replace('.', '', $request->aktual_revenue),
        ]);

        if ($data) {
            return redirect()->route('event')->withStatus('data berhasil diupdate');
        } else {
            return redirect()->back()->withErrors('data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Potensi  $potensi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Potensi::find($id);
        $data->update([
            'status_id' => 0
        ]);

        return redirect()->back()->with('success', 'data berahsil dihapus');
    }
}
