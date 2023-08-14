@extends('layout.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data</h1>
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
                <form class="" action="{{ route('project-income.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <h5 class="card-header">WARTA EKONOMI</h5>
                                <div class="card-body">
                                    <label for="demo_overview_minimal">Income</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp</div>
                                        </div>
                                        <input type="text" class="form-control" id="income_we" placeholder="" name="income_we" value="{{$data->income_we}}">
                                    </div>
                                    <label for="demo_overview_minimal">PPN</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">Rp</div>
                                        </div>
                                        <input type="text" class="form-control" id="ppn_we" placeholder="" name="ppn_we" value="{{$data->ppn_we}}">
                                    </div>
                                    <label for="demo_overview_minimal">PPH</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">Rp</div>
                                        </div>
                                        <input type="text" class="form-control" id="pph_we" placeholder="" name="pph_we" value="{{$data->pph_we}}">
                                    </div>
                                </div>
                              </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <h5 class="card-header">PARTNER</h5>
                                <div class="card-body">
                                    <label for="demo_overview_minimal">Income</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">Rp</div>
                                        </div>
                                        <input type="text" class="form-control" id="income_partner" placeholder="" name="income_partner" value="{{$data->income_partner}}">
                                    </div>
                                    <label for="demo_overview_minimal">PPN</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">Rp</div>
                                        </div>
                                        <input type="text" class="form-control" id="ppn_partner" placeholder="" name="ppn_partner" value="{{$data->ppn_partner}}">
                                    </div>
                                    <label for="demo_overview_minimal">PPH</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">Rp</div>
                                        </div>
                                        <input type="text" class="form-control" id="pph_partner" placeholder="" name="pph_partner" value="{{$data->pph_partner}}">
                                    </div>
                                </div>
                              </div>
                        </div>
                    </div>
                    {{-- <input type="hidden" id="data-event" name="" class="form-control" value="{{$dataEvent->id}}"> --}}
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
        $(document).ready(function(){
            $('#income_we').mask('#.##0', {reverse: true});
            $('#ppn_we').mask('#.##0', {reverse: true});
            $('#pph_we').mask('#.##0', {reverse: true});
            $('#income_partner').mask('#.##0', {reverse: true});
            $('#ppn_partner').mask('#.##0', {reverse: true});
            $('#pph_partner').mask('#.##0', {reverse: true});
        })

  </script>
@endpush