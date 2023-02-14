<?php

namespace App\Http\Controllers;

use App\Models\Keynote;
use App\Models\Event;
use Illuminate\Http\Request;

class KeynoteController extends Controller
{
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
        //
        $dataEvent = Event::findOrFail($id);
        return view('keynote.create', compact('dataEvent'));
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
        $data = Keynote::create([
            'event_id' => $dataEvent->id,
            'narasumber' => $request->narasumber,
            'tema' => $request->tema,
            'url' => $request->url
        ]);

        if ($data) {
            return redirect()->route('event.edit', $dataEvent->id)->withStatus('data berhasil diinput');
        } else {
            return redirect()->back()->withErrors('data gagal diinput');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keynote  $keynote
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keynote  $keynote
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $data = Keynote::find($id);
        return view('keynote.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keynote  $keynote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = Keynote::find($id);
        $data->update([
            'company_id' => $request->company_id,
            'narasumber' => $request->narasumber,
            'tema' => $request->tema,
            'url' => $request->url
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
     * @param  \App\Models\Keynote  $keynote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keynote $keynote)
    {
        //
    }
}
