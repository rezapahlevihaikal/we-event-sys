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
                <form class="" action="{{ route('audience.store', $dataEvent->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col">
                          <label for="demo_overview_minimal">Jenis Peserta</label>
                          <select id="jenisPeserta" class="form-control" onchange="jenPeserta()" data-role="select-dropdown" data-profile="minimal" name="jenis_peserta" required >
                            <option value="" selected>MASUKKAN JENIS PESERTA</option>
                            <option value="1">Online</option>
                            <option value="2">Offline</option>
                            <option value="3">Hybrid</option>
                          </select>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label id="la1" for="formGroupExampleInput2">Target Peserta</label>
                            <input type="text" name="target_peserta" class="form-control">
                        </div>
                        <div class="col">
                            <label id="la2" for="formGroupExampleInput2">Aktual Peserta</label>
                            <input type="text" name="aktual_peserta" class="form-control">
                        </div>
                    </div>
                    <div class="row" id="hybrid" style="padding-top: 10px; display: none;">
                        <div class="col">
                            <label for="formGroupExampleInput2">Target Peserta (Online)</label>
                            <input type="text" name="target_hybrid" class="form-control">
                        </div>
                        <div class="col">
                            <label for="formGroupExampleInput2">Aktual Peserta (Online)</label>
                            <input type="text" name="aktual_hybrid" class="form-control">
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="formGroupExampleInput2">Keterangan</label>
                            <textarea name="keterangan" id="" class="form-control" cols="10" rows="10"></textarea>
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
                    <input type="hidden" id="data-event" name="" class="form-control" value="{{$dataEvent->id}}">
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
                            var e = document.getElementById('hybrid');
                            e.style.display = 'block';
                            
                            la1.innerHTML += ' (Offline)';
                            la2.innerHTML += ' (Offline)';
                        } else {
                            document.getElementById('hybrid').style.display = 'none'
                        }
                }
        </script>
@endpush