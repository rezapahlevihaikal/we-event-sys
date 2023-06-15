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
                <form class="" action="{{ route('evaluation.store', $dataEvent->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="demo_overview_minimal">Event</label>
                            <input type="text" class="form-control" value="{{$dataEvent->getProduct->name}}" disabled>
                        </div>
                        <div class="col">
                            <label for="formGroupExampleInput2">Divisi</label>
                            @if ($dataEvent->tipe_id == 6)
                              <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="parameter" required>
                                <option value="">PILIH DIVISI</option>
                                <option value="Design">Design</option>
                                <option value="EO">EO</option>
                                <option value="Special Report Non Sponsor">Special Report Non Sponsor</option>
                                <option value="Special Report Sponsor">Special Report Sponsor</option>
                                <option value="Riset">Riset</option>
                                <option value="Sales">Sales</option>
                                <option value="Admin">Admin</option>
                              </select>
                            @else
                              <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="parameter" required>
                                <option value="">PILIH DIVISI</option>
                                <option value="Design">Design</option>
                                <option value="EO">EO</option>
                                <option value="Special Report Sponsor">Special Report Sponsor</option>
                                <option value="Riset">Riset</option>
                                <option value="Sales">Sales</option>
                                <option value="Admin">Admin</option>
                              </select>
                            @endif
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
                    <hr class="hr hr-blurry" />
                    <h5>Keterangan</h5>
                    <div class="row" style="padding-top: 10px">
                      <div class="col-2">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                          <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Evaluasi</a>
                          <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Penyebab</a>
                          <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Akibat</a>
                          <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Solusi</a>
                        </div>
                      </div>
                      <div class="col">
                        <div class="tab-content" id="v-pills-tabContent">
                          {{-- EVALUASI --}}
                          <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                              <label for="formGroup">Evaluasi</label>
                              <textarea name="evaluasi" id="" cols="30" rows="10" class="form-control"></textarea>
                          </div>
                          {{-- PENYEBAB --}}
                          <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                              <label for="formGroup">Penyebab</label>
                              <textarea name="penyebab" id="" cols="30" rows="10" class="form-control"></textarea>
                          </div>
                          {{-- AKIBAT --}}
                          <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                              <label for="formGroup">Akibat</label>
                              <textarea name="akibat" id="" cols="30" rows="10" class="form-control"></textarea>
                          </div>
                          {{-- SOLUSI --}}
                          <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                              <label for="formGroup">Solusi</label>
                              <textarea name="solusi" id="" cols="30" rows="10" class="form-control"></textarea>
                          </div>
                        </div>
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