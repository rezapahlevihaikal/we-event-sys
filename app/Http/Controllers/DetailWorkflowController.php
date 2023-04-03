<?php

namespace App\Http\Controllers;

use App\Models\DetailWorkflow;
use App\Models\Workflow;
use Illuminate\Http\Request;

class DetailWorkflowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $workflow = Workflow::get(['id', 'name']);
        $data = DetailWorkflow::all();
        return view('detailWorkflow.index', compact('workflow', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //\

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
        $data = DetailWorkflow::create([
            'workflow_id' => $request->workflow_id,
            'detail'      => $request->detail,
            'bobot'       => $request->bobot
        ]);

        if ($data) {
            return redirect()->route('detailWorkflow')->withStatus('data berhasil diinput');
        }
        else {
            return redirect()->back()->withErrors('data gagal diinput');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailWorkflow  $detailWorkflow
     * @return \Illuminate\Http\Response
     */
    public function show(DetailWorkflow $detailWorkflow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailWorkflow  $detailWorkflow
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $workflow = Workflow::get(['id', 'name']);
        $data = DetailWorkflow::all();
        return view('detailWorkflow.edit', compact('workflow', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailWorkflow  $detailWorkflow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = DetailWorkflow::find($id);
        $data->update([
            'workflow_id' => $request->workflow_id,
            'detail'      => $request->detail,
            'bobot'       => $request->bobot
        ]);

        if ($data) {
            return redirect()->route('detailWorkflow')->withStatus('data berhasil diinput');
        }
        else {
            return redirect()->back()->withErrors('data gagal diinput');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailWorkflow  $detailWorkflow
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailWorkflow $detailWorkflow)
    {
        //
    }
}
