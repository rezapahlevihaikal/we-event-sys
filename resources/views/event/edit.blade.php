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
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Budget</a>
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
                        </div>
                        <div class="row" style="padding-top: 10px">
                            <div class="col">
                                <label for="formGroupExampleInput2">Kendala</label>
                                <textarea name="status" class="form-control" id="" cols="30" rows="10"> {{$data->status}} </textarea>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success" onclick="window.location='{{url('/event')}}'" type="reset">Back</button>
                        <button class="btn btn-primary" type="submit">Create Data</button>
                      </form>
                  </div>
                  {{-- EVENT BUDGET --}}
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                <div class="header">
                                  <button type="button" class="btn-sm btn-primary" onclick="window.location='{{url('/eventBudget/create', $data->id)}}'" data-toggle="modal" data-target="#exampleModal">
                                    Tambah Data
                                  </button>
                                </div>
                                  <br>
                                <!-- /.card-header -->
                                  <table id="event_budget" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                      <th>Jenis Pengeluaran</th>
                                      <th>Nominal</th>
                                      <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($dataEb as $item)
                                        <tr style="text-align:center;">
                                          <td title="{{$item->jenis_pengeluaran	}}">{!! Str::limit($item->jenis_pengeluaran, 40) !!}</td>
                                          <td> {{$item->nominal}} </td>
                                          <td title="">
                                              <form action="#" method="POST">
                                                  <a href=" {{route('eventBudget.edit', $item->id )}} " class="btn btn-success btn-sm" role="button" aria-disabled="true"><i class="fas fa-edit"></i></a>
                                                  @csrf
                                                  @method('post')
                                                  {{-- <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yang bener?');"><i class="fas fa-trash"></i></button></td> --}}
                                              </form>
                                          </td>
                                        </tr>
                                      @endforeach
                                    </tbody>
                                  </table>
                  </div>
                  {{-- SPONSOR --}}
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                      <div class="header">
                        <button type="button" class="btn-sm btn-primary" onclick="window.location='{{url('/sponsor/create', $data->id)}}'" data-toggle="modal" data-target="#exampleModal">
                          Tambah Data
                        </button>
                      </div>
                        <br>
                      <!-- /.card-header -->
                        <table id="sponsor" class="table table-bordered table-hover">
                          <thead>
                          <tr style="text-align: center">
                            <th>Nama Perusahaan / Partner</th>
                            <th>Benefit</th>
                            <th>Nominal</th>
                            <th>Action</th>
                          </tr>
                          </thead>
                          <tbody>
                            @foreach($dataS as $item)
                              <tr style="text-align:center;">
                                <td title="{{$item->getCompany->company_name	}}">{!! Str::limit($item->getCompany->company_name, 40) !!}</td>
                                <td title="{{$item->benefit_sponsor	}}">{!! Str::limit($item->benefit_sponsor, 40) !!}</td>
                                <td> {{$item->nominal}} </td>
                                <td title="">
                                    <form action="#" method="POST">
                                        <a href=" {{route('sponsor.edit', $item->id)}} " class="btn btn-success btn-sm" role="button" aria-disabled="true"><i class="fas fa-edit"></i></a>
                                        @csrf
                                        @method('post')
                                        {{-- <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yang bener?');"><i class="fas fa-trash"></i></button></td> --}}
                                    </form>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                  </div>
                  {{-- KEYNOTE SPEAKER --}}
                  <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                    <div class="header">
                      <button type="button" class="btn-sm btn-primary" onclick="window.location='{{url('/keynote/create', $data->id)}}'" data-toggle="modal" data-target="#exampleModal">
                        Tambah Data
                      </button>
                    </div>
                      <br>
                    <!-- /.card-header -->
                      <table id="keynote" class="table table-bordered table-hover">
                        <thead>
                        <tr style="text-align: center">
                          <th>Narasumber</th>
                          <th>Tema</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach($dataK as $item)
                            <tr style="text-align:center;">
                              <td title="{{$item->narasumber}}">{!! Str::limit($item->narasumber, 40) !!}</td>
                              <td title="{{$item->tema}}">{!! Str::limit($item->tema, 40) !!}</td>
                              <td title="">
                                  <form action="#" method="POST">
                                      <a href=" {{route('keynote.edit', $item->id)}} " class="btn btn-success btn-sm" role="button" aria-disabled="true"><i class="fas fa-edit"></i></a>
                                      @csrf
                                      @method('post')
                                      {{-- <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yang bener?');"><i class="fas fa-trash"></i></button></td> --}}
                                  </form>
                              </td>
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
                              <td title="{{$item->pic}}">{!! Str::limit($item->pic, 40) !!}</td>
                              <td title="{{$item->kegiatan}}">{!! Str::limit($item->kegiatan, 40) !!}</td>
                              <td title="">
                                  <form action="#" method="POST">
                                      <a href=" {{route('dailyTask.edit', $item->id)}} " class="btn btn-success btn-sm" role="button" aria-disabled="true"><i class="fas fa-edit"></i></a>
                                      @csrf
                                      @method('post')
                                      {{-- <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yang bener?');"><i class="fas fa-trash"></i></button></td> --}}
                                  </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                  </div>
                  {{-- DOKUMENTASI --}}
                  <div class="tab-pane fade" id="custom-tabs-one-doc" role="tabpanel" aria-labelledby="custom-tabs-one-doc-tab">
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
                      <br>
                      @if($doc->count())
                      <div class="p-2" style="width: 80%;">
                        <div class="card-columns">
                            @foreach($doc as $photo)
                                <div class="card">
                                    <a class="thumbnail fancybox" rel="ligthbox" href="/uploads/{{ $photo->file }}">
                                      <img class="card-img-top" src="/uploads/{{$photo->file}}" alt="Card image cap">
                                      <div class='text-center'>
                                        <small class='text-muted'>{{ $photo->title }}</small>
                                      </div> <!-- text-center / end -->
                                    </a>
                                    <form action="#" method="POST">
                                      <input type="hidden" name="_method" value="delete">
                                      {!! csrf_field() !!}
                                      <button type="submit" class="close-icon btn btn-danger"><i class="fas fa-minus-circle"></i></button>
                                      </form>
                                </div>
                            @endforeach
                        </div>
                      </div>
                      @endif 
                  </div>
                </div>
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
        $('#event_budget').DataTable({
          
        });
        $('#sponsor').DataTable({
          
        });
        $('#keynote').DataTable({
          
        });
        $('#daily_task').DataTable({
          
        });
        $('#doc').DataTable({
          
        });
        $('#product').selectpicker();
        $('#budget').mask('#.##0', {reverse: true});
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