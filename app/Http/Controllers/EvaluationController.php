<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Event;
use Illuminate\Http\Request;

class EvaluationController extends Controller
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
        $dataEv = Event::where('status_id', '=', '1')->latest('id')->get();
        return view('evaluation.index', compact('dataEv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $dataEvent = Event::findOrFail($id);
        $event = Event::orderBy('updated_at', 'DESC')->get(['id', 'tema']);
        return view('evaluation.create', compact('event', 'dataEvent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        $dataEvent = Event::find($id);
        $data = Evaluation::create([
            'status_id'  => 1,
            'event_id'   => $dataEvent->id,
            'parameter'  => $request->parameter,
            'keterangan' => $request->keterangan,
            'evaluasi'   => $request->evaluasi,
            'penyebab'   => $request->penyebab,
            'akibat'     => $request->akibat,
            'solusi'     => $request->solusi,
            'nilai'      => $request->nilai,
            'username'   => $request->username
        ]);

        if ($data) {
            return redirect()->route('evaluation')->withStatus('data berhasil diinput');
        }
        else {
            return redirect()->back()->withErrors('data gagal diinput');
        }
        
    }

    public function detailEV($id)
    {
        $event = Event::findOrFail($id);
        $design = Evaluation::where('event_id', '=', $event->id)->get();
        return view('evaluation.detail', compact('event', 'design'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function show(Evaluation $evaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Evaluation::find($id);
        // $dataEvent = Event::get(['id', 'product_id']);
        $dataEvent = Event::get(['tipe_id']);
        
        return view('evaluation.edit', compact('data', 'dataEvent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Evaluation::find($id);
        $data->update([
            'event_id'   => $request->event_id,
            'parameter'  => $request->parameter,
            'keterangan' => $request->keterangan,
            'evaluasi'   => $request->evaluasi,
            'penyebab'   => $request->penyebab,
            'akibat'     => $request->akibat,
            'solusi'     => $request->solusi,
            'nilai'      => $request->nilai,
            'username'   => $request->username
        ]);

        if ($data) {
            return redirect()->route('evaluation')->withStatus('data berhasil diinput');
        }
        else {
            return redirect()->back()->withErrors('data gagal diinput');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Evaluation::find($id);
        $data->udpate([
            'status_id' => 0
        ]);

        return redirect()->back()->with('success','data berhasil dihapus');
    }
}
