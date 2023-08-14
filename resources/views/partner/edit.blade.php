@extends('layout.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Partner</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Menu</a></li>
              <li class="breadcrumb-item active">Partner</li>
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
                <form class="" action="{{ route('partner.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="demo_overview_minimal">Nama Partner</label>
                            <input type="text" class="form-control" name="nama_partner" id="" value="{{$data->nama_partner}}">
                        </div>
                        <div class="col">
                            <label for="demo_overview_minimal">Tipe Partner</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="type" required>
                              <option value="">TIPE PARTNER</option>
                              <option value="Internal" {{$data->type == "Internal"  ? 'selected' : ''}}>Internal</option>
                              <option value="External" {{$data->type == "External"  ? 'selected' : ''}}>External</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="demo_overview_minimal">Fee Marketing</label>
                            <select id="demo_overview_minimal" class="form-control" data-role="select-dropdown" data-profile="minimal" name="fee_marketing" required>
                              <option value="">FEE MARKETING</option>
                              <option value="5" {{$data->fee_marketing == "5"  ? 'selected' : ''}}>5%</option>
                              <option value="10" {{$data->fee_marketing == "10"  ? 'selected' : ''}}>10%</option>
                              <option value="15" {{$data->fee_marketing == "15"  ? 'selected' : ''}}>15%</option>
                              <option value="20" {{$data->fee_marketing == "20"  ? 'selected' : ''}}>20%</option>
                            </select>
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