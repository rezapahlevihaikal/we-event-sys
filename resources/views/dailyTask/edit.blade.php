@extends('layout.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Daily Task</h1>
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
              <!-- /.card-header -->
              <div class="card-body">
                <form class="" action="{{ route('dailyTask.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                          <label for="demo_overview_minimal">Workflow</label>
                          <select data-live-search="true" id="" class="form-control" data-role="select-dropdown" data-profile="minimal" name="workflow_id" value="" selected="">
                              @foreach ($workflow as $item)
                              <option value="{{ $item->id }}" {{$data->workflow_id == $item->id  ? 'selected' : ''}}>{!! Str::limit($item->name, 60) !!}</option>
                              @endforeach
                          </select>
                        </div>
                        <div class="col">
                          <label for="demo_overview_minimal">Detail</label>
                          <select data-live-search="true" id="" class="form-control" data-role="select-dropdown" data-profile="minimal" name="detail_id" value="" selected="">
                              @foreach ($detail as $item)
                              <option value="{{ $item->id }}" {{$data->detail_id == $item->id  ? 'selected' : ''}}>{{$item->getTipe->name ?? ''}} | {!! Str::limit($item->detail, 60) !!}</option>
                              @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="formGroupExampleInput2">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" value="{{$data->tanggal}}">
                        </div>
                        <div class="col">
                            <label for="formGroupExampleInput2">PIC</label>
                            <input type="text" name="pic" class="form-control" value="{{$data->pic}}">
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="formGroupExampleInput2">Kegiatan</label>
                            <textarea name="kegiatan" id="" class="form-control" cols="10" rows="10"> {{$data->kegiatan}} </textarea>
                        </div>
                        <div class="col">
                            <label for="formGroupExampleInput2">Status</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="status" required>
                              <option value="new progress" {{$data->status == "new progress"  ? 'selected' : ''}}>New</option>
                              <option value="on progress" {{$data->status == "on progress"  ? 'selected' : ''}}>Progress</option>
                              <option value="done" {{$data->status == "done"  ? 'selected' : ''}}>Done</option>
                            </select>
                            <br>
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
                            <a href="{{route('dailyTask.download', $data->id)}}">{{$data->file}}</a>
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-success" onclick="history.back()" type="reset">Back</button>
                    <button class="btn btn-primary" type="submit">Create Data</button>
                  </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@push('js')

@endpush