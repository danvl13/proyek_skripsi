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
                    <a href="{{ route('mahasiswa.create')}}">
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
                                <th>Nama Mahasiswa</th>
                                <th>Ganti Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list_mahasiswa as $key => $user)
                            @if ($user->status!=3)
                            <tr>
                                <td> {{$key + 1}}</td>
                                <td> {{$user->nrp}} </td>
                                <td><a href="{{route('mahasiswa.view', ['id'=>$user->id])}}"> {{$user->nama}} </a></td>
                                @if ($user->status==1)
                                <td>
                                    <a href="{{route('mahasiswa.ganti', ['id'=>$user->id])}}"><button class='btn btn-warning'>Ganti Status</button></a>
                                </td>
                                @else
                                <td></td>
                                @endif
                                @endif
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