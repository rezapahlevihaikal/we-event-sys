<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Sponsor;
use App\Models\Companies;

class SponsorController extends Controller
{
    //
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
        // $dataEb = Sponsor::latest('created_at')->get();
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
        $dataCompanies = Companies::get(['id', 'company_name']);

        return view('sponsor.create', compact('dataEvent', 'dataCompanies'));
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

        $data = Sponsor::create([
            'event_id' => $dataEvent->id,
            'company_id' => $request->company_id,
            'nominal' => str_replace('.', '', $request->nominal),
            'benefit_sponsor' => $request->benefit_sponsor
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
     * @param  \App\Models\Sponsor  $eventBudget
     * @return \Illuminate\Http\Response
     */
    public function show(Sponsor $eventBudget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sponsor  $eventBudget
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Sponsor::find($id);
        $dataCompanies = Companies::get(['id', 'company_name']);
        return view('sponsor.edit', compact('data', 'dataCompanies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sponsor  $eventBudget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Sponsor::find($id);
        $data->update([
            'company_id' => $request->company_id,
            'nominal' => str_replace('.', '', $request->nominal),
            'benefit_sponsor' => $request->benefit_sponsor
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
     * @param  \App\Models\Sponsor  $eventBudget
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
