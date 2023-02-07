<?php

namespace App\Http\Controllers;

use App\Models\TipeEvent;
use Illuminate\Http\Request;

class TipeEventController extends Controller
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
        $data = TipeEvent::latest('created_at')->get();
        return view('tipeEvent.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = TipeEvent::create([
            'name' => $request->name
        ]);

        if ($data) {
            return redirect()->route('tipeEvent')->withStatus('success', 'data berhasil diinput');
        }
        else{
            return redirect()->back()->withStatus('error', 'data gagal diinput');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipeEvent  $tipeEvent
     * @return \Illuminate\Http\Response
     */
    public function show(TipeEvent $tipeEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipeEvent  $tipeEvent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = TipeEvent::find($id);
        return view('tipeEvent.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipeEvent  $tipeEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = TipeEvent::find($id);
        $data->update([
            'name' => $request->name
        ]);

        if ($data) {
            return redirect()->route('tipeEvent')->withStatus('success', 'data berhasil diupdate');
        } else {
            return redirect()->back()->withStatus('error', 'data gagal diupdate');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipeEvent  $tipeEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = TipeEvent::find($id);
        $data->delete();

        return redirect()->back()->withStatus('data berhasil dihapus');
    }
}
