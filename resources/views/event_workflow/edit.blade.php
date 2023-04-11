@extends('layout.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Workflow</h1>
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
                <form class="" action="{{ route('eventWorkflow.update', $eWorkflow->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="demo_overview_minimal">Workflow</label>
                            <select data-live-search="true" id="" class="form-control" data-role="select-dropdown" data-profile="minimal" name="workflow_id" value="" selected="">
                                @foreach ($dataWorkflow as $item)
                                <option value="{{ $item->id }}" {{$eWorkflow->tipe_id == $item->id  ? 'selected' : ''}}>{!! Str::limit($item->name, 60) !!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="formGroupExampleInput2">Start</label>
                            <input type="date" name="start_date" class="form-control" value="{{$eWorkflow->start_date}}">
                        </div>
                        <div class="col">
                            <label for="formGroupExampleInput2">End</label>
                            <input type="date" name="end_date" class="form-control" value="{{$eWorkflow->end_date}}">
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="demo_overview_minimal">Deskripsi</label>
                            <textarea name="desc" class="form-control" id="" cols="30" rows="10">{{$eWorkflow->desc}}</textarea>
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

@endpushx`