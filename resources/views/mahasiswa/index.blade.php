@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        List Mahasiswa
    </h1>
    <ol class="breadcrumb">
        
    </ol>
</section>

     <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                        <h3 class="box-title"></h3>
                    <div class="box-tools pull-right">
                    <a href="{{ route('mahasiswa.index')}}">
                        <button class="btn btn-box-tools bg-navy"> Tambah Mahasiswa</button> 
                    </a>
                    </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NRP</th>
                                <th>Nama</th>
                                <th>Ganti</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list_mahasiswa as $key => $user)
                            <tr>
                                <td> {{$key + 1}}</td>
                                <td> {{$user->nrp}} </td>
                                <td> {{$user->nama}} </td>
                                <td>
                                    <button class='btn btn-warning'>Ganti Status</button>
                                </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->
@endsection

@push('scripts')

<script>
$('.table').DataTable()
</script>
@endpush