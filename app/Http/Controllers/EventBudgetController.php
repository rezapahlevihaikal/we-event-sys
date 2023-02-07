<?php

namespace App\Http\Controllers;

use App\Models\EventBudget;
use App\Models\Event;
use Illuminate\Http\Request;

class EventBudgetController extends Controller
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
        // $dataEb = EventBudget::latest('created_at')->get();
        // return view('event.edit', compact('dataEb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $dataEvent = Event::findOrFail($id);
        return view('eventBudget.create', compact('dataEvent'));
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

        $data = EventBudget::create([
            'event_id' => $dataEvent->id,
            'jenis_pengeluaran' => $request->jenis_pengeluaran,
            'nominal' => str_replace('.', '', $request->nominal),
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
     * @param  \App\Models\EventBudget  $eventBudget
     * @return \Illuminate\Http\Response
     */
    public function show(EventBudget $eventBudget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventBudget  $eventBudget
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = EventBudget::find($id);
        return view('eventBudget.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventBudget  $eventBudget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = EventBudget::find($id);
        $data->update([
            'jenis_pengeluaran' => $request->jenis_pengeluaran,
            'nominal' => str_replace('.', '', $request->nominal),
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
     * @param  \App\Models\EventBudget  $eventBudget
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
