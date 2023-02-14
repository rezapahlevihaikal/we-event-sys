@extends('layout.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Data Budget</h1>
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
                <form class="" action="{{ route('eventBudget.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="formGroupExampleInput2">Jenis Pengeluaran</label>
                            <input type="text" name="jenis_pengeluaran" class="form-control" value="{{$data->jenis_pengeluaran}}">
                        </div>
                        <div class="col">
                            <label for="formGroupExampleInput2">Nominal</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">Rp</div>
                                </div>
                                <input type="text" class="form-control" id="nominal" placeholder="" name="nominal" value="{{$data->nominal}}">
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                      <div class="col">
                        <strong>File attach (Max 2 MB):</strong>
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
                          <a href="">{{$data->file}}</a>
                        </div>
                        <a href="{{route('eventBudget.download', $data->id)}}">{{$data->file}}</a>
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
<script type="text/javascript">
    $(document).ready( function () {
        $('#nominal').mask('#.##0', {reverse: true})
    } );
</script>
@endpush