<?php

namespace App\Http\Controllers;

use App\Models\ProjectIncome;
use App\Models\Event;
use Illuminate\Http\Request;

class ProjectIncomeController extends Controller
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
        $dataEvent = Event::findOrFail($id);
        return view('projectIncome.create', compact('dataEvent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $dataEvent = Event::find($id);
        $data = ProjectIncome::create([
            'event_id' => $dataEvent->id,
            'income_we' => str_replace('.', '', $request->income_we),
            'income_partner' => str_replace('.', '', $request->income_partner),
            'ppn_we' => str_replace('.', '', $request->ppn_we),
            'ppn_partner' => str_replace('.', '', $request->ppn_partner),
            'pph_we' => str_replace('.', '', $request->ppn_we),
            'pph_partner' => str_replace('.', '', $request->pph_partner),
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
     * @param  \App\Models\ProjectIncome  $projectIncome
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectIncome $projectIncome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectIncome  $projectIncome
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ProjectIncome::find($id);
        return view('projectIncome.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectIncome  $projectIncome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = ProjectIncome::find($id);
        $data->update([
            'income_we' => str_replace('.', '', $request->income_we),
            'income_partner' => str_replace('.', '', $request->income_partner),
            'ppn_we' => str_replace('.', '', $request->ppn_we),
            'ppn_partner' => str_replace('.', '', $request->ppn_partner),
            'pph_we' => str_replace('.', '', $request->ppn_we),
            'pph_partner' => str_replace('.', '', $request->pph_partner),
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
     * @param  \App\Models\ProjectIncome  $projectIncome
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectIncome $projectIncome)
    {
        //
    }
}
