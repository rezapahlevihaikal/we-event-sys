@extends('layout.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Potensi</h1>
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
                <form class="" action="{{ route('potensi.store', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="demo_overview_minimal">Perusahaan</label>
                              <select data-live-search="true" id="company" class="form-control" data-role="select-dropdown" data-profile="minimal" name="company_id" value="" selected="">
                                  <option value="">PILIH NAMA PERUSAHAAN</option>
                                  @foreach ($company as $item)
                                  <option value="{{ $item->id }}">{!! Str::limit($item->company_name, 60) !!}</option>
                                  @endforeach
                              </select>
                        </div>
                        <div class="col">
                            <label for="formGroupExampleInput2">Potensi</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">Rp</div>
                                </div>
                                <input type="text" class="form-control" id="potensi" placeholder="1.000.000" name="potensi">
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        {{-- <div class="col">
                            <label for="formGroupExampleInput2">Aktual Potensi</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">Rp</div>
                                </div>
                                <input type="text" class="form-control" id="aktual_potensi" placeholder="1.000.0000" name="aktual_potensi">
                            </div>
                        </div> --}}
                        <div class="col">
                            <label for="formGroupExampleInput2">Aktual Revenue</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">Rp</div>
                                </div>
                                <input type="text" class="form-control" id="aktual_revenue" placeholder="1.000.0000" name="aktual_revenue">
                            </div>
                        </div>
                    </div>
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
     $(document).ready(function(){
        $('#company').selectpicker();
        $('#potensi').mask('#.##0', {reverse: true});
        $('#aktual_potensi').mask('#.##0', {reverse: true});
        $('#aktual_revenue').mask('#.##0', {reverse: true});
     });
  </script>
@endpush