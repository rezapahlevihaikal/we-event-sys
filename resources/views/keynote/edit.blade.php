@extends('layout.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Keynote</h1>
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
                <form class="" action="{{ route('keynote.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row" style="padding-top: 10px">
                      <div class="col">
                          <label for="formGroupExampleInput2">Narasumber</label>
                          <input type="text" name="narasumber" class="form-control" value="{{$data->narasumber}}">
                      </div>
                      <div class="col">
                        <label for="formGroupExampleInput2">Status</label>
                        <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="status" required>
                          <option value="">PILIH STATUS</option>
                          <option value="keynote speaker"  {{$data->status == "keynote speaker"  ? 'selected' : ''}}>Keynote Speaker</option>
                          <option value="juri"  {{$data->status == "juri"  ? 'selected' : ''}}>Juri</option>
                        </select>
                     </div>
                  </div>
                  <div class="row" style="padding-top: 10px">
                    <div class="col">
                      <label for="formGroupExampleInput2">Tema</label>
                      <input type="text" name="tema" class="form-control" value="{{$data->tema}}">
                    </div>
                    <div class="col">
                      <label for="formGroupExampleInput2">URl</label>
                      <label class="sr-only" for="inlineFormInputGroup">URl</label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">https://</div>
                        </div>
                        <input type="text" name="url" class="form-control" id="inlineFormInputGroup" placeholder="URl" value="{{$data->url}}">
                      </div>  
                    </div>
                  </div>
                  <div class="row" style="padding-top: 10px">
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
                        <a href="{{route('keynote.download', $data->id)}}">{{$data->file}}</a>
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