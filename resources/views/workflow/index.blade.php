@extends('layout.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Workflow</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Config</a></li>
              <li class="breadcrumb-item active">Workflow</li>
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
              <div class="card-header">
                <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Tambah Data
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Workflow</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action=" {{route('workflow.store')}} " method="post" enctype="multipart/form-data">
                          @csrf                          
                            <div class="form-group">
                              <label for="formGroupExampleInput2">Nama Workflow</label>
                              <input type="text" class="form-control" name="name" id="">
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="sybmit" class="btn btn-primary">Add Data</button>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($dataWorkflow as $item)
                      <tr style="text-align:center;">
                        <td title="{{$item->name}}">{!! Str::limit($item->name, 40) !!}</td>
                        <td title="">
                            <form action="{{route('workflow.destroy', $item->id)}}" method="POST">
                                <a href="{{route('workflow.edit', $item->id)}}" class="btn btn-success btn-sm" role="button" aria-disabled="true"><i class="fas fa-edit"></i></a>
                                @csrf
                                @method('post')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?');"><i class="fas fa-trash"></i></button></td>
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

  <script src="{{asset('template/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <script src="{{asset('template/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{asset('template/plugins/jszip/jszip.min.js')}}"></script>
  <script src="{{asset('template/plugins/pdfmake/pdfmake.min.js')}}"></script>
  <script src="{{asset('template/plugins/pdfmake/vfs_fonts.js')}}"></script>
  <script src="{{asset('template/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{asset('template/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{asset('template/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

  <script type="text/javascript">
    $(document).ready (function (){
      $("#example2").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
  </script>
@endpush