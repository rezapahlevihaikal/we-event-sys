<?php

namespace App\Http\Controllers;

use App\Models\Audience;
use App\Models\Event;
use Illuminate\Http\Request;

class AudienceController extends Controller
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
        $dataEvent = Event::findOrFail($id);
        return view('audience.create', compact('dataEvent'));
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
        
        $headerNameDoc = 'Audience';
        $getId = $dataEvent->id;
        // dd($request->$filename);
        if ($request->file) {
            
            $filename = $headerNameDoc."_".$getId.uniqid().".".$request->file->extension();        
            $request->file->move(public_path('uploads/audience'), $filename);
        }


        $data = Audience::create([
            'event_id'       => $dataEvent->id,
            'jenis_peserta'  => $request->jenis_peserta,
            'target_peserta' => $request->target_peserta,
            'aktual_peserta' => $request->aktual_peserta,
            'target_hybrid'  => $request->target_hybrid,
            'aktual_hybrid'  => $request->aktual_hybrid,
            'keterangan'     => $request->keterangan,
            'file'           => $filename
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
     * @param  \App\Models\Audience  $audience
     * @return \Illuminate\Http\Response
     */
    public function show(Audience $audience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Audience  $audience
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Audience::find($id);
        return view('audience.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Audience  $audience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'file' => 'nullable|mimes:jpg,jpeg,png,doc,docx,xlx,xlsx,pdf|max:5120'
        ]);

        $data = Audience::find($id);

        $headerNameDoc = 'Audience';
        $end = 'edited';

        if ($request->has('file')) {
            $filename = $headerNameDoc."_".uniqid()."_".$end.".".$request->file->getClientOriginalExtension();
            File::delete(public_path('uploads/audience'), $data->file);
            $request->file->move(public_path('uploads/audience'), $filename);
        }
        else {
            $filename = $data->file;
        }

        $data->update([
            'jenis_peserta'  => $request->jenis_peserta,
            'target_peserta' => $request->target_peserta,
            'aktual_peserta' => $request->aktual_peserta,
            'target_hybrid'  => $request->target_hybrid,
            'aktual_hybrid'  => $request->aktual_hybrid,
            'keterangan'     => $request->keterangan,
            'file'           => $filename
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
     * @param  \App\Models\Audience  $audience
     * @return \Illuminate\Http\Response
     */
    public function destroy(Audience $audience)
    {
        //
    }
}
