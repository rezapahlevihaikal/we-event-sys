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
        $event = Event::orderBy('updated_at', 'DESC')->get(['id', 'product_id']);
        $data = Evaluation::with(['getEvent'])->where('status_id', 1)->get();

        return view('evaluation.index', compact('event','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $event = Event::orderBy('updated_at', 'DESC')->get(['id', 'tema']);
        return view('evaluation.create', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = Evaluation::create([
            'status_id'  => 1,
            'event_id'   => $request->event_id,
            'parameter'  => $request->parameter,
            'keterangan' => $request->keterangan,
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
        $event = Event::get(['id', 'tema']);
        $data = Evaluation::find($id);

        return view('evaluation.edit', compact('event', 'data'));
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
