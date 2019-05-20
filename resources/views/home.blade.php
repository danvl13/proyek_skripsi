@extends('layouts.app')

@section('content')
<section class="content-header">
        <h1>
          List Acara Yang Didaftarkan
          
        </h1>
        <ol class="breadcrumb">
         
        </ol>
     </section>

     <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Hover Data Table</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>nama</th>
                                <th>nrp</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $user)
                            <tr>
                                <td> {{$key + 1}}</td>
                                <td> {{$user->nama}} </td>
                                <td>{{ $user->nrp }}</td>
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