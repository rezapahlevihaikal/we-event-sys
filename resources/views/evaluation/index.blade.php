@extends('layout.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Evaluasi</h1>
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
              @if (Auth::user()->id_core_bisnis == 19)
              <div class="card-header">
                <button type="button" onclick="window.location='{{url('/evaluation/create')}}'" class="btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Tambah Data
                </button>
              </div>
              @endif
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead style="text-align: center">
                  <tr>
                    <th>Event</th>
                    <th>Parameter</th>
                    <th>Keterangan</th>
                    <th>Skor</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $item)
                      <tr style="text-align:center;">
                        <td title="{{$item->getEvent->tema ?? 'data kosong'}}"> 
                            <a href="{{route('evaluation.edit', $item->id)}}">{!! Str::limit($item->getEvent->tema ?? 'kosong', 60) !!}</a>
                            <br>
                            {{$item->username}}
                        </td>
                        <td title="{{$item->parameter}}">{!! Str::limit($item->parameter ?? 'kosong', 60) !!}</td>
                        <td title="{{$item->keterangan}}">{!! Str::limit($item->keterangan ?? 'kosong', 60) !!}</td>
                        <td>{{$item->nilai}}</td>
                        <td title="">
                            <form action="{{route('evaluation.destroy', $item->id)}}" method="POST">
                                <a href="{{route('evaluation.edit', $item->id)}}" class="btn btn-success btn-sm" role="button" aria-disabled="true"><i class="fas fa-edit"></i></a>
                                @csrf
                                @method('post')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yang bener?');"><i class="fas fa-trash"></i></button></td>
                            </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
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
    $(document).ready (function (){
      $("#example2").DataTable({
        "responsive": true,
         "lengthChange": false,
         "autoWidth": false,
         "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
         ordering: false,
      }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
  </script>
@endpush