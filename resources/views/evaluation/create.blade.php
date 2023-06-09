@extends('layout.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data Evaluasi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Menu</a></li>
              <li class="breadcrumb-item active">Evaluasi</li>
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
                <form class="" action="{{ route('evaluation.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="demo_overview_minimal">Event</label>
                            <select data-live-search="true" id="event" class="form-control" data-role="select-dropdown" data-profile="minimal" name="event_id" value="" selected="">
                                <option value="">PILIH EVENT</option>
                                @foreach ($event as $item)
                                <option value="{{ $item->id }}">{{ $item->tema}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="formGroupExampleInput2">Parameter</label>
                            <input type="text" name="parameter" class="form-control">
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="formGroup">Nilai</label>
                            <input type="text" class="form-control" name="nilai">
                        </div>
                        <div class="col">
                            <label for="formGroup">Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="formGroupExampleInput2">Keterangan</label>
                            <textarea name="keterangan" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-success" onclick="window.location='{{url('/evaluation')}}'" type="reset">Back</button>
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
<script type="text/javascript">
    $(document).ready( function () {
        $('#event').selectpicker();
        $('#budget').mask('#.##0', {reverse: true})
    } );
</script>
@endpush