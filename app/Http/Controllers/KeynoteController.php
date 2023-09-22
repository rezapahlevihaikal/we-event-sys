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
        //
        
        $filename = null;
        $request->validate([
            'file' => 'nullable|mimes:mimes:jpg,jpeg,png,doc,docx,xlx,xlsx,pdf|max:5120'
        ]);

        $rules = [
            'file' => 'nullable|mimes:jpg,jpeg,png,doc,docx,xlx,xlsx,pdf|max:5120'
        ];

        $customMessage = [
            
            'max' => 'The :attribute max :value'
        ];

        $this->validate($request, $rules, $customMessage);
        
        $headerNameDoc = 'keynote';
        $getId = $dataEvent->id;
        // dd($request->$filename);
        if ($request->file) {
            
            $filename = $headerNameDoc."_".$getId.uniqid().".".$request->file->extension();        
            $request->file->move(public_path('uploads/keynote'), $filename);
        }


        $data = Keynote::create([
            'status_id' => 1,
            'event_id' => $dataEvent->id,
            'narasumber' => $request->narasumber,
            'tema' => $request->tema,
            'url' => $request->url,
            'status' => $request->status,
            'file' => $filename
        ]);
        
        if ($data) {
            return redirect()->route('event.edit', $dataEvent->id)->withStatus('data berhasil diinput');
        } else {
            return redirect()->back()->withErrors('data gagal diinput');
        }
        // $dataEvent = Event::find($id);
        // $data = Keynote::create([
        //     'status_id' => 1,
        //     'event_id' => $dataEvent->id,
        //     'narasumber' => $request->narasumber,
        //     'tema' => $request->tema,
        //     'url' => $request->url
        // ]);

        // if ($data) {
        //     return redirect()->route('event.edit', $dataEvent->id)->withStatus('data berhasil diinput');
        // } else {
        //     return redirect()->back()->withErrors('data gagal diinput');
        // }
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
        $request->validate([
            'file' => 'nullable|mimes:jpg,jpeg,png,doc,docx,xlx,xlsx,pdf|max:5120'
        ]);

        $data = Keynote::find($id);

        $headerNameDoc = 'Keynote';
        $end = 'edited';

        if ($request->has('file')) {
            $filename = $headerNameDoc."_".uniqid()."_".$end.".".$request->file->getClientOriginalExtension();
            File::delete(public_path('uploads/keynote'), $data->file);
            $request->file->move(public_path('uploads/keynote'), $filename);
        }
        else {
            $filename = $data->file;
        }

        $data->update([
            'event_id' => $dataEvent->id,
            'narasumber' => $request->narasumber,
            'tema' => $request->tema,
            'url' => $request->url,
            'status' => $request->status,
            'file' => $filename
        ]);

        if ($data) {
            return redirect()->route('event')->withStatus('data berhasil diupdate');
        } else {
            return redirect()->back()->withErrors('data gagal diupdate');
        }
        // $data = Keynote::find($id);
        // $data->update([
        //     'company_id' => $request->company_id,
        //     'narasumber' => $request->narasumber,
        //     'tema' => $request->tema,
        //     'url' => $request->url
        // ]);

        // if ($data) {
        //     return redirect()->route('event')->withStatus('data berhasil diupdate');
        // } else {
        //     return redirect()->back()->withErrors('data gagal diupdate');
        // }
    }

    
    public function getFileBudget($id)
    {
        $data = Keynote::where('id', $id)->first();
        $filePath = public_path('uploads/keynote/'. $data->file);
        // dd($filePath);
        return response()->download($filePath);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keynote  $keynote
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Keynote::find($id);
        $data->update([
            'status_id' => 0
        ]);

        return redirect()->back()->with('success', 'data berahsil dihapus');
    }
}
