@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        List Acara 
    </h1>
    <ol class="breadcrumb">
        
    </ol>
</section>

     <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <div class="box">
                  
                  <!-- /.box-header -->
                  <div class="box-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Acara</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list_acara as $key => $acara)
                            <tr>
                                <td> {{$key + 1}}</td>
                                <td> <a href="{{ route('acara-diikuti.view', ["id" => $acara->id]) }}">{{$acara->nama}} </a></td>
                                <td> <span class="label {{ $acara->jadwal[0]->status == 0?  'label-warning' : ($acara->jadwal[0]->status == 1? 'label-success' : 'label-danger') }}">{{ $acara->jadwal[0]->status == 0?  'Belum Diterima / Dtolak' : ($acara->jadwal[0]->status == 1? 'Diterima' : ' Ditolak' ) }}</span> </td>
                                
                              </tr>
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