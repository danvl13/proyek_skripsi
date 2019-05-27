@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        List Divisi
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
                    <a href="{{ route('divisi.create-page')}}">
                        <button class="btn btn-box-tools bg-navy"> Tambah Divisi</button> 
                    </a>
                    </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Divisi</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list_divisi as $key => $divisi)
                            <tr>
                                <td> {{$key + 1}}</td>
                                <td> {{$divisi->nama}} </td>
                                <td>
                                    <a href="{{ route('divisi.edit-page', ["id" => $divisi->id]) }}"><button class='btn btn-warning'>Edit</button></a>
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