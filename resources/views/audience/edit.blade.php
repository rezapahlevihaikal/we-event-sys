@extends('layout.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data Peserta</h1>
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
                <form class="" action="{{ route('audience.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col">
                          <label for="demo_overview_minimal">Jenis Peserta</label>
                          <select id="jenisPeserta" class="form-control" onchange="jenPeserta()" data-role="select-dropdown" data-profile="minimal" name="jenis_peserta" required >
                            {{-- <option value="" selected>MASUKKAN JENIS PESERTA</option> --}}
                            <option value="1" {{$data->jenis_peserta == "1"  ? 'selected' : ''}}>Online</option>
                            <option value="2" {{$data->jenis_peserta == "2"  ? 'selected' : ''}}>Offline</option>
                            <option value="3" {{$data->jenis_peserta == "3"  ? 'selected' : ''}}>Hybrid</option>
                          </select>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="formGroupExampleInput2">Target Peserta</label>
                            <input type="text" name="target_peserta" class="form-control" value="{{$data->target_peserta}}">
                        </div>
                        <div class="col">
                            <label for="formGroupExampleInput2">Aktual Peserta</label>
                            <input type="text" name="aktual_peserta" class="form-control" value="{{$data->aktual_peserta}}">
                        </div>
                    </div>
                    @if ($data->jenis_peserta == 3)
                    <div class="row" id="hybrid" style="padding-top: 10px;">
                        <div class="col">
                            <label for="formGroupExampleInput2">Target Peserta (Hybrid)</label>
                            <input type="text" name="target_hybrid" class="form-control" value="{{$data->target_hybrid}}">
                        </div>
                        <div class="col">
                            <label for="formGroupExampleInput2">Aktual Peserta (Hybrid)</label>
                            <input type="text" name="aktual_hybrid" class="form-control" value="{{$data->aktual_hybrid}}">
                        </div>
                    </div>
                    @endif
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="formGroupExampleInput2">Keterangan</label>
                            <textarea name="keterangan" id="" class="form-control" cols="10" rows="10">{{$data->keterangan}}</textarea>
                        </div>
                        <div class="col">                            
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
        <script>
                function jenPeserta() {
                    let jp = document.getElementById('jenisPeserta')
                        if (jp.value == 3) {
                            document.getElementById('hybrid').style.display = 'block'
                        } else {
                            document.getElementById('hybrid').style.display = 'none'
                        }
                }
        </script>
@endpush