@extends('layout.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data Event</h1>
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
                <form class="" action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="demo_overview_minimal">Tipe Event</label>
                            <select data-live-search="true" id="tipeEvent" class="form-control" data-role="select-dropdown" data-profile="minimal" name="tipe_id" value="" selected="">
                                <option value="">PILIH TIPE</option>
                                @foreach ($dataTipeEvent as $item)
                                <option value="{{ $item->id }}">{{ $item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="formGroupExampleInput2">Tema</label>
                            <input type="text" name="tema" class="form-control">
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px"> 
                        <div class="col">
                            <label for="demo_overview_minimal">Product</label>
                            <select data-live-search="true" id="product" class="form-control" data-role="select-dropdown" data-profile="minimal" name="product_id" value="" selected="">
                                <option value="">PILIH PRODUCT</option>
                                @foreach ($dataProduct as $item)
                                <option value="{{ $item->id }}">{!! Str::limit($item->name, 60) !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="formGroup">Lokasi</label>
                            <input type="text" class="form-control" name="lokasi">
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="formGroupExampleInput2">Budget</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">Rp</div>
                                </div>
                                <input type="text" class="form-control" id="budget" placeholder="" name="budget">
                            </div>
                        </div>
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
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="formGroupExampleInput2">Schedule</label>
                            <input id="" class="form-control" type="date" name="schedule" value=""/>
                        </div>
                        <div class="col">
                            <label for="formGroupExampleInput2">On Event</label>
                            <input id="" class="form-control" type="date" name="on_event" value=""/>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="col">
                            <label for="formGroupExampleInput2">Kendala</label>
                            <textarea name="status" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-success" onclick="window.location='{{url('/event')}}'" type="reset">Back</button>
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
        $('#product').selectpicker();
        $('#budget').mask('#.##0', {reverse: true})
    } );
</script>
@endpush