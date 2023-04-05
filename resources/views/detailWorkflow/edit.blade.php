@extends('layout.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Detail Workflow</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Menu</a></li>
              <li class="breadcrumb-item active">Detail Workflow</li>
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
                <form class="" action="{{ route('detailWorkflow.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row" style="padding-top: 10px" >
                        <div class="col">
                            <label for="formGroupExampleInput2">Workflow</label>
                            <select data-live-search="true" id="workflow_id" class="form-control" data-role="select-dropdown" data-profile="minimal" name="workflow_id" value="" selected="">
                                @foreach ($workflow as $item)
                                <option value="{{ $item->id }}" {{$data->workflow_id == $item->id  ? 'selected' : ''}}> {{$item->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="formGroupExampleInput2">Tipe Event</label>
                            <select data-live-search="true" id="tipe_event_id" class="form-control" data-role="select-dropdown" data-profile="minimal" name="tipe_event_id" value="" selected="">
                                @foreach ($tipeEvent as $item)
                                <option value="{{ $item->id }}" {{$data->tipe_event_id == $item->id  ? 'selected' : ''}}> {{$item->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="demo_overview_minimal">Bobot</label>
                            <input type="text" name="bobot" class="form-control" value="{{$data->bobot}}">
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="demo_overview_minimal">Detail</label>
                            <textarea class="form-control" name="detail" id="" cols="20" rows="10">{{$data->detail}}</textarea>
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-success" onclick="history.back()" type="reset">Back</button>
                    <button class="btn btn-primary" type="submit">Update Data</button>
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