@extends('layout.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Event</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Menu</a></li>
              <li class="breadcrumb-item active">Event</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Event</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-audiences-tab" data-toggle="pill" href="#custom-tabs-one-audiences" role="tab" aria-controls="custom-tabs-one-audiences" aria-selected="true">Peserta</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-workflow-tab" data-toggle="pill" href="#custom-tabs-one-workflow" role="tab" aria-controls="custom-tabs-one-workflow" aria-selected="false">Workflow</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Budget</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-potensi-tab" data-toggle="pill" href="#custom-tabs-one-potensi" role="tab" aria-controls="custom-tabs-one-potensi" aria-selected="false">Potensi Revenue</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Sponsor</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Keynote</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-daily-tab" data-toggle="pill" href="#custom-tabs-one-daily" role="tab" aria-controls="custom-tabs-one-daily" aria-selected="false">Daily Task</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-doc-tab" data-toggle="pill" href="#custom-tabs-one-doc" role="tab" aria-controls="custom-tabs-one-doc" aria-selected="false">Dokumentasi</a>
                  </li>
                  @if (Auth::user()->id_core_bisnis == 19)
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-pro-tab" data-toggle="pill" href="#custom-tabs-one-pro" role="tab" aria-controls="custom-tabs-one-doc" aria-selected="false">Project Income</a>
                  </li>
                  @endif
                  
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  {{-- DETAIL EVENT --}}
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                      <form class="" action="{{ route('event.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="row" style="padding-top: 10px">
                            <div class="col">
                                <label for="demo_overview_minimal">Tipe Event</label>
                                <select data-live-search="true" id="" class="form-control" data-role="select-dropdown" data-profile="minimal" name="tipe_id" value="" selected="">
                                    @foreach ($dataTipeEvent as $item)
                                    <option value="{{ $item->id }}" {{$data->tipe_id == $item->id  ? 'selected' : ''}}>{!! Str::limit($item->name, 60) !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="formGroupExampleInput2">Tema</label>
                                <input type="text" name="tema" class="form-control" value="{{$data->tema}}">
                            </div>
                        </div>
                        <div class="row" style="padding-top: 10px"> 
                            <div class="col">
                                <label for="demo_overview_minimal">Product</label>
                                <select data-live-search="true" id="product" class="form-control" data-role="select-dropdown" data-profile="minimal" name="product_id" value="" selected="">
                                    @foreach ($dataProduct as $item)
                                    <option value="{{ $item->id }}" {{$data->product_id == $item->id  ? 'selected' : ''}}>{!! Str::limit($item->name, 60) !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                              <label for="demo_overview_minimal">Partner</label>
                              <select data-live-search="true" id="product" class="form-control" data-role="select-dropdown" data-profile="minimal" name="partner_id" value="" selected="">
                                  @foreach ($dataPartner as $item)
                                  <option value="{{ $item->id }}" {{$data->partner_id == $item->id  ? 'selected' : ''}}>{!! Str::limit($item->nama_partner, 60) !!}</option>
                                  @endforeach
                              </select>
                          </div>
                            <div class="col">
                                <label for="formGroup">Lokasi</label>
                                <input type="text" class="form-control" name="lokasi" value="{{$data->lokasi}}">
                            </div>
                        </div>
                        <div class="row" style="padding-top: 10px">
                            <div class="col">
                                <label for="formGroupExampleInput2">Budget</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">Rp</div>
                                    </div>
                                    <input type="text" class="form-control" id="budget" placeholder="" name="budget" value="{{$data->budget}}">
                                </div>
                            </div>
                            <div class="col">
                              <label for="formGroupExampleInput2">Prediksi Revenue</label>
                              <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                  </div>
                                  <input type="text" class="form-control" id="revenue" placeholder="" name="prediksi_revenue" value="{{$data->prediksi_revenue}}">
                              </div>
                            </div>
                            <div class="col">
                                <label for="demo_overview_minimal">File (Max : 5 MB)</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input @error('file') is-invalid @enderror" id="exampleInputFile" name="file">
                                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                      @error('file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                      @enderror
                                    </div>
                                  </div>
                                  <a href="{{route('event.download', $data->id)}}">{{$data->file}}</a>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 10px">
                            <div class="col">
                                <label for="formGroupExampleInput2">Schedule</label>
                                <input id="" class="form-control" type="date" name="schedule" value="{{$data->schedule}}"/>
                            </div>
                            <div class="col">
                                <label for="formGroupExampleInput2">On Event</label>
                                <input id="" class="form-control" type="date" name="on_event" value="{{$data->on_event}}"/>
                            </div>
                            <div class="col">
                              <label for="formGroupExampleInput2">Status Event</label>
                              <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="status_event" required>
                                <option value="Start" {{$data->status_event == "Start"  ? 'selected' : ''}}>Start</option>
                                <option value="Progress" {{$data->status_event == "Progress"  ? 'selected' : ''}}>Progress</option>
                                <option value="Finish" {{$data->status_event == "Finish"  ? 'selected' : ''}}>Finish</option>
                                <option value="Tentatif" {{$data->status_event == "Tentatif"  ? 'selected' : ''}}>Tentatif</option>
                                <option value="Cancel" {{$data->status_event == "Cancel"  ? 'selected' : ''}}>Cancel</option>
                              </select>
                          </div>
                        </div>
                        <div class="row" style="padding-top: 10px">
                            <div class="col">
                                <label for="formGroupExampleInput2">Kendala</label>
                                <textarea name="status" class="form-control" id="" cols="30" rows="10"> {{$data->status}} </textarea>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success" onclick="window.location='{{url('/event')}}'" type="reset">Back</button>
                        @if (Auth::user()->id_core_bisnis == 19)
                            <button class="btn btn-primary" type="submit">Create Data</button>
                        @endif
                      </form>
                  </div>
                  {{-- AUDIENCES --}}
                  <div class="tab-pane fade" id="custom-tabs-one-audiences" role="tabpanel" aria-labelledby="custom-tabs-one-audiences-tab">
                    <div class="header">
                      @if (Auth::user()->id_core_bisnis == 19)
                        @if (count($dataAu) < 1)
                        <button type="button" class="btn-sm btn-primary" onclick="window.location='{{url('/audience/create', $data->id)}}'" data-toggle="modal" data-target="#exampleModal">
                          Masukkan Jumlah Peserta
                        </button>
                        @endif
                      @endif
                    </div>
                      <br>
                    <!-- /.card-header -->
                    @if ($dataAu->isNotEmpty())
                        @foreach ($dataAu as $item)
                        <div class="row"> 
                          <div class="col">
                            <div class="card text-center">
                              <div class="card-header">
                                Jenis Peserta
                              </div>
                              <div class="card-body">
                                  <h2>
                                    @if($item->jenis_peserta == 1)
                                      Online
                                    @elseif($item->jenis_peserta == 2)
                                      Offline
                                    @else
                                      Hybrid
                                    @endif
                                  </h2>
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="card text-center">
                            <div class="card-header">
                              @if ($item->jenis_peserta == 3)
                                  Target Peserta Offline
                              @else
                                  Target Peserta
                              @endif
                            </div>
                            <div class="card-body">
                                <h2>
                                  {{number_format($item->target_peserta)}}
                                </h2>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card text-center">
                            <div class="card-header">
                              @if ($item->jenis_peserta == 3)
                                  Aktual Peserta Offline
                              @else
                                  Aktual Peserta
                              @endif
                              
                            </div>
                            <div class="card-body">
                                <h2>
                                  {{number_format($item->aktual_peserta)}}
                                </h2>
                            </div>
                          </div>
                        </div>
                      </div>
                          @if ($item->jenis_peserta == 3)
                          <div class="row">
                            <div class="col">
                              <div class="card text-center">
                                <div class="card-header">
                                  Target Online
                                </div>
                                <div class="card-body">
                                    <h2>
                                      {{number_format($item->target_hybrid)}}
                                    </h2>
                                </div>
                              </div>
                            </div>
                            <div class="col">
                              <div class="card text-center">
                                <div class="card-header">
                                  Aktual Online
                                </div>
                                <div class="card-body">
                                    <h2>
                                      {{number_format($item->aktual_hybrid)}}
                                    </h2>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="card text-center">
                                <div class="card-header">
                                  File
                                </div>
                                <div class="card-body">
                                  <a class="thumbnail fancybox" rel="ligthbox" href="/uploads/audience/{{$item->file}}">
                                    <img src="/uploads/audience/{{$item->file}}" alt="">
                                  </a>
                                  
                                </div>
                              </div>
                            </div>
                             
                          </div>
                          @endif
                          @if (Auth::user()->id_core_bisnis == 19)
                            <button type="button" class="btn-sm btn-primary" onclick="window.location='{{url('/audience/edit', $item->id)}}'" data-toggle="modal" data-target="#exampleModal">
                              Edit Data Jumlah Peserta
                            </button>
                          @endif
                      @endforeach
                    @else
                    <div class="card">
                      <div class="card-body">
                        <blockquote class="blockquote mb-0">
                          <p>Data peserta masih kosong</p>
                          <footer class="blockquote-footer">Silahkan masukkan data pada tombol <b>Masukkan Jumlah Peserta</b> </footer>
                        </blockquote>
                      </div>
                    </div>
                    @endif
                  </div>
                  {{-- WORKFLOW --}}
                   <div class="tab-pane fade" id="custom-tabs-one-workflow" role="tabpanel" aria-labelledby="custom-tabs-one-workflow-tab">
                    <div class="header">
                      @if (Auth::user()->id_core_bisnis == 19)
                        <button type="button" class="btn-sm btn-primary" onclick="window.location='{{url('/eventWorkflow/create', $data->id)}}'" data-toggle="modal" data-target="#exampleModal">
                          Tambah Data
                        </button>
                      @endif
                    </div>
                      <br>
                    <!-- /.card-header -->
                      <table id="workflow" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th>Workflow</th>
                          <th>Detail</th>
                          <th>Date</th>
                          @if (Auth::user()->id_core_bisnis == 19)
                          <th>Action</th>
                          @endif
                        </tr>
                        </thead>
                        <tbody>
                          @foreach($dataWorkflow as $item)
                            <tr style="text-align:center;">
                              <td title="{{$item->getWorkflow->name ?? '#'}}">
                                {!! Str::limit($item->getWorkflow->name ?? '#', 40) !!} <br>
                                {{$item->percentage}}%
                              </td>
                              <td title="{{$item->desc	}}"> {!! Str::limit($item->desc, 40) !!} </td>
                              <td>
                                  {{$item->start_date}} - {{$item->end_date}}
                              </td>
                              @if (Auth::user()->id_core_bisnis == 19)
                                <td title="">
                                  <form action="{{route('eventWorkflow.destroy', $item->id)}}" method="POST">
                                      <a href=" {{route('eventWorkflow.edit', $item->id )}} " class="btn btn-success btn-sm" role="button" aria-disabled="true"><i class="fas fa-edit"></i></a>
                                      @csrf
                                      @method('post')
                                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?');"><i class="fas fa-trash"></i></button></td>
                                  </form>
                                </td>
                              @endif
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                  </div>
                  {{-- EVENT BUDGET --}}
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                <div class="header">
                                  @if (Auth::user()->id_core_bisnis == 19 || Auth::user()->id_core_bisnis == 24)
                                  <button type="button" class="btn-sm btn-primary" onclick="window.location='{{url('/eventBudget/create', $data->id)}}'" data-toggle="modal" data-target="#exampleModal">
                                    Tambah Data
                                  </button>
                                  @endif
                                </div>
                                  <br>
                                <!-- /.card-header -->
                                  <table id="event_budget" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                      <th>Jenis Pengeluaran</th>
                                      <th>Nominal</th>
                                      @if (Auth::user()->id_core_bisnis == 19 || Auth::user()->id_core_bisnis == 24)
                                      <th>Action</th>
                                      @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($dataEb as $item)
                                        <tr style="text-align:center;">
                                          <td title="{{$item->jenis_pengeluaran	}}">{!! Str::limit($item->jenis_pengeluaran, 40) !!}</td>
                                          <td>@currency($item->nominal)</td>
                                          @if (Auth::user()->id_core_bisnis == 19 || Auth::user()->id_core_bisnis == 24)
                                          <td title="">
                                            <form action="{{route('eventBudget.destroy', $item->id)}}" method="POST">
                                                <a href=" {{route('eventBudget.edit', $item->id )}} " class="btn btn-success btn-sm" role="button" aria-disabled="true"><i class="fas fa-edit"></i></a>
                                                @csrf
                                                @method('post')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yang bener?');"><i class="fas fa-trash"></i></button></td>
                                            </form>
                                          </td>
                                          @endif
                                        </tr>
                                      @endforeach
                                    </tbody>
                                  </table>
                  </div>
                  {{-- POTENSI REVENUE --}}
                  <div class="tab-pane fade" id="custom-tabs-one-potensi" role="tabpanel" aria-labelledby="custom-tabs-one-potensi-tab">
                    <div class="header">
                      @if (Auth::user()->id_core_bisnis == 19 || Auth::user()->id_core_bisnis == 24)
                      <button type="button" class="btn-sm btn-primary" onclick="window.location='{{url('/potensi/create', $data->id)}}'" data-toggle="modal" data-target="#exampleModal">
                        Tambah Data
                      </button>
                      @endif
                    </div>
                      <br>
                    <!-- /.card-header -->
                      <table id="potensi" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th>Company</th>
                          <th>Potensi</th>
                          <th>Aktual Revenue</th>
                          @if (Auth::user()->id_core_bisnis == 19 || Auth::user()->id_core_bisnis == 24)
                          <th>Action</th>
                          @endif
                        </tr>
                        </thead>
                        <tbody>
                          @foreach($dataPotensi as $item)
                            <tr style="text-align:center;">
                              <td title="{{$item->getCompany->company_name ?? 'Kosong'	}}">{!! Str::limit($item->getCompany->company_name ?? 'Kosong', 40) !!}</td>
                              <td>@currency($item->potensi)</td>
                              <td>@currency($item->aktual_revenue)</td>
                              @if (Auth::user()->id_core_bisnis == 19 || Auth::user()->id_core_bisnis == 24)
                              <td title="">
                                <form action="{{route('potensi.destroy', $item->id)}}" method="POST">
                                    <a href=" {{route('potensi.edit', $item->id )}} " class="btn btn-success btn-sm" role="button" aria-disabled="true"><i class="fas fa-edit"></i></a>
                                    @csrf
                                    @method('post')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yang bener?');"><i class="fas fa-trash"></i></button></td>
                                </form>
                              </td>
                              @endif
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                  </div>
                  {{-- SPONSOR --}}
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                      <div class="header">
                        <div class="row">
                          <div class="col">
                            <div class="card text-center">
                              <div class="card-header">
                                Budget (Estimasi)
                              </div>
                              <div class="card-body">
                                  <h2>
                                    @currency($data->budget)
                                  </h2>
                              </div>
                            </div>
                          </div>
                          <div class="col">
                            <div class="card text-center">
                              <div class="card-header">
                                Total Revenue
                              </div>
                              <div class="card-body">
                                  <h2>
                                    @currency($sumSpon)
                                  </h2>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>  
                        <br>
                      <!-- /.card-header -->
                        <table id="sponsor" class="table table-bordered table-hover">
                          <thead>
                          <tr style="text-align: center">
                            <th>Nama Perusahaan / Partner</th>
                            <th>Nominal</th>
                          </tr>
                          </thead>
                          <tbody>
                            @foreach($dataS as $item)
                              <tr style="text-align:center;">
                                <td title="{{$item->company_name	}}">{!! Str::limit($item->company_name, 40) !!}</td>
                                <td>@currency($item->amount_po)</td>
                                {{-- <td title="">
                                    <form action="{{route('sponsor.destroy', $item->id)}}" method="POST">
                                        <a href=" {{route('sponsor.edit', $item->id)}} " class="btn btn-success btn-sm" role="button" aria-disabled="true"><i class="fas fa-edit"></i></a>
                                        @csrf
                                        @method('post')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yang bener?');"><i class="fas fa-trash"></i></button></td>
                                    </form>
                                </td> --}}
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                  </div>
                  {{-- KEYNOTE SPEAKER --}}
                  <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                    <div class="header">
                      @if (Auth::user()->id_core_bisnis == 19 || Auth::user()->id_core_bisnis == 21)
                        <button type="button" class="btn-sm btn-primary" onclick="window.location='{{url('/keynote/create', $data->id)}}'" data-toggle="modal" data-target="#exampleModal">
                          Tambah Data
                        </button>              
                      @endif
                    </div>
                      <br>
                    <!-- /.card-header -->
                      <table id="keynote" class="table table-bordered table-hover">
                        <thead>
                        <tr style="text-align: center">
                          <th>Narasumber</th>
                          <th>Tema</th>
                          @if (Auth::user()->id_core_bisnis == 19 || Auth::user()->id_core_bisnis == 21)
                          <th>Action</th>
                          @endif
                        </tr>
                        </thead>
                        <tbody>
                          @foreach($dataK as $item)
                            <tr style="text-align:center;">
                              <td title="{{$item->narasumber}}">{!! Str::limit($item->narasumber, 40) !!}</td>
                              <td title="{{$item->tema}}">{!! Str::limit($item->tema, 40) !!}</td>
                              @if (Auth::user()->id_core_bisnis == 19 || Auth::user()->id_core_bisnis == 21)
                              <td title="">
                                <form action="{{route('keynote.destroy', $item->id)}}" method="POST">
                                    <a href=" {{route('keynote.edit', $item->id)}} " class="btn btn-success btn-sm" role="button" aria-disabled="true"><i class="fas fa-edit"></i></a>
                                    @csrf
                                    @method('post')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yang bener?');"><i class="fas fa-trash"></i></button></td>
                                </form>
                              </td>
                              @endif
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                  </div>
                  {{-- DAILY TASK --}}
                  <div class="tab-pane fade" id="custom-tabs-one-daily" role="tabpanel" aria-labelledby="custom-tabs-one-daily-tab">
                    <div class="header">
                      <button type="button" class="btn-sm btn-primary" onclick="window.location='{{url('/dailyTask/create', $data->id)}}'" data-toggle="modal" data-target="#exampleModal">
                        Tambah Data
                      </button>
                    </div>
                      <br>
                    <!-- /.card-header -->
                      <table id="daily_task" class="table table-bordered table-hover">
                        <thead>
                        <tr style="text-align: center">
                          <th>Tanggal</th>
                          <th>Workflow</th>
                          <th>PIC</th>
                          <th>Kegiatan</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach($dataD as $item)
                            <tr style="text-align:center;">
                              <td title="">
                                {{$item->tanggal}} - 
                                @if ($item->status == 'new progress')
                                  <button type="button" class="btn-xs btn-primary" disabled>New</button>
                                @elseif($item->status == 'on progress')
                                  <button type="button" class="btn-xs btn-light" disabled>Progress</button>
                                @elseif($item->status == 'done')
                                  <button type="button" class="btn-xs btn-primary" disabled>Done</button>
                                @endif
                              </td>
                              <td>
                                  {{$item->getWorkflow->name ?? ''}} <br> 
                                  {{$item->getDetailWorkflow->detail ?? ''}}
                              </td>
                              <td title="{{$item->pic}}">{!! Str::limit($item->pic, 40) !!}</td>
                              <td title="{{$item->kegiatan}}">
                                  {!! Str::limit($item->kegiatan, 40) !!} <br>
                                  <a href="{{$item->url}}" target="_blank" rel="noopener noreferrer">{!! Str::limit($item->url, 40) !!}</a>
                              </td>
                              <td title="">
                                  <form action="{{route('dailyTask.destroy', $item->id)}}" method="POST">
                                      <a href=" {{route('dailyTask.edit', $item->id)}} " class="btn btn-success btn-sm" role="button" aria-disabled="true"><i class="fas fa-edit"></i></a>
                                      @csrf
                                      @method('post')
                                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yang bener?');"><i class="fas fa-trash"></i></button></td>
                                  </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                  </div>
                  {{-- DOKUMENTASI --}}
                  <div class="tab-pane fade" id="custom-tabs-one-doc" role="tabpanel" aria-labelledby="custom-tabs-one-doc-tab">
                      @if (Auth::user()->id_core_bisnis == 19 || Auth::user()->id_core_bisnis == 23 || Auth::user()->id_core_bisnis == 24)
                      <form action="{{route('event.upload', $data->id)}}" class="form-image-upload" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-5">
                                <strong>Title:</strong>
                                <input type="text" name="title" class="form-control" placeholder="Title">
                            </div>
                            <div class="col-md-5">
                                <strong>Image (Max 2 MB):</strong>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('file') is-invalid @enderror" id="exampleInputFile" name="file">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    @error('file')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{$message}}</strong>
                                      </span>
                                    @enderror
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <br/>
                                <button type="submit" class="btn btn-success">Upload</button>
                            </div>
                        </div>
                      </form>
                      @endif
                      <br>
                      @if($doc->count())
                      <div class="p-2" style="width: 80%;">
                        <div class="card-columns">
                            @foreach($doc as $photo)
                                <div class="card">
                                    <a class="thumbnail fancybox" rel="ligthbox" href="/uploads/documentation/{{ $photo->file }}">
                                      <img class="card-img-top" src="/uploads/documentation/{{$photo->file}}" alt="Card image cap">
                                      <div class='text-center'>
                                        <small class='text-muted'>{{ $photo->title }}</small>
                                      </div> <!-- text-center / end -->
                                    </a>
                                    @if (Auth::user()->id_core_bisnis == 19 || Auth::user()->id_core_bisnis == 23 || Auth::user()->id_core_bisnis == 24)
                                    <form action="{{route('dokumentasi.destroy', $photo->id)}}" method="POST">
                                      <input type="hidden" name="_method" value="">
                                      {!! csrf_field() !!}
                                      <button type="submit" class="close-icon btn btn-danger"><i class="fas fa-minus-circle"></i></button>
                                    </form>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                      </div>
                      @else
                      <div class="card text-center">
                        <div class="card-body">
                          <h5 class="card-title">Dokumentasi Belum Tersedia</h5>
                        </div>
                      </div>
                      @endif 
                  </div>
                  @if (Auth::user()->id_core_bisnis == 19)
                      {{-- PROJECT INCOME --}}
                  <div class="tab-pane fade" id="custom-tabs-one-pro" role="tabpanel" aria-labelledby="custom-tabs-one-pro-tab">
                    @if (count($dataPI) < 1)
                    <div class="header">
                      <button type="button" class="btn-sm btn-primary" onclick="window.location='{{url('/audience/create', $data->id)}}'" data-toggle="modal" data-target="#exampleModal">
                        Masukkan Nilai
                      </button>
                  </div>
                    @endif
                    <br>
                    @foreach ($dataPI as $item)
                      <div class="row">
                        <div class="col">
                          <div class="card text-white mb-6">
                            <div class="card-header" style="text-align: center">WARTA EKONOMI</div>
                          </div>
                          <div class="card text-white mb-6">
                            <div class="card-header">Income</div>
                            <div class="card-body">
                              <h2 style="text-align: center">
                                  @currency($item->income_we)
                              </h2>
                            </div>
                          </div>
                          <div class="card text-white mb-6">
                            <div class="card-header">PPN</div>
                            <div class="card-body">
                              <h2 style="text-align: center">
                                @currency($item->ppn_we)
                              </h2>
                            </div>
                          </div>
                          <div class="card text-white mb-6">
                            <div class="card-header">PPH</div>
                            <div class="card-body">
                              <h2 style="text-align: center">
                                @currency($item->pph_we)
                              </h2>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card text-white mb-6">
                            <div class="card-header" style="text-align: center">PARTNER</div>
                          </div>
                          <div class="card text-white mb-6">
                            <div class="card-header">Income</div>
                            <div class="card-body">
                              <h2 style="text-align: center">
                                @currency($item->income_partner)
                              </h2>
                            </div>
                          </div>
                          <div class="card text-white mb-6">
                            <div class="card-header">PPN</div>
                            <div class="card-body">
                              <h2 style="text-align: center">
                                @currency($item->ppn_partner)
                              </h2>
                            </div>
                          </div>
                          <div class="card text-white mb-6">
                            <div class="card-header">PPH</div>
                            <div class="card-body">
                              <h2 style="text-align: center">
                                @currency($item->pph_partner)
                              </h2>
                            </div>
                          </div>
                        </div>
                    </div>
                    <button type="button" class="btn-sm btn-primary" onclick="window.location='{{url('/project-income/edit', $item->id)}}'" data-toggle="modal">
                      Edit Data Jumlah Peserta
                    </button>
                  @endforeach
                  </div>
                  
                  @endif
              </div>  
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
@push('js')
<script type="text/javascript">
    $(document).ready( function () {
        $('#workflow').DataTable({
          ordering: false,
        });
        $('#event_budget').DataTable({
          ordering: false,
        });
        $('#potensi').DataTable({
          ordering: false,
        });
        $('#sponsor').DataTable({
          ordering: false,
        });
        $('#keynote').DataTable({
          ordering: false,
        });
        $('#daily_task').DataTable({
          ordering: false,
        });
        $('#doc').DataTable({
          
        });
        $('#product').selectpicker();
        $('#budget').mask('#.##0', {reverse: true});
        $('#revenue').mask('#.##0', {reverse: true});
        $('#nominal').mask('#.##0', {reverse: true});
        $(".fancybox").fancybox({
            // openEffect: "none",
            // closeEffect: "none"
        });
        // $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        //     event.preventDefault();
        //     $(this).ekkoLightbox({
        //       alwaysShowClose: true
        //     });
        // });
    } );
</script>
@endpush