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
                                <th>Status Acara</th>
                                @if(Auth::user()->status == 3)
                                <th>Status</th>
                                <th>Approve</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list_acara as $key => $acara)
                            <tr>
                                <td> {{$key + 1}}</td>
                                <td> <a href="{{ route('acara.view', ["id" => $acara->id]) }}">{{$acara->nama}} </a></td>
                                <td> {{ $acara->tgl_mulai_acara > $today? 'Yang akan datang' : ( $acara->tgl_mulai_acara <= $today && $today <= $acara->tgl_selesai_acara? 'Berlangsung' : ( $today > $acara->tgl_selesai_acara? 'Berakhir' : '') ) }} </td>
                                @if(Auth::user()->status == 3)
                                <td> <span class="label {{ $acara->status == 1? 'label-success' : 'label-warning' }}">{{ $acara->status == 1? 'Approved' : ($acara->tgl_mulai_acara < $today? 'Expired' :'Waiting for Approval') }}</span> </td>
                                @if($acara->status==0 && $acara->tgl_mulai_acara > $today)
                                <td><a href="{{route('acara.approve', ['id'=>$acara->id])}}"><button class='btn btn-success'>Approve</button></a></td>
                                @else 
                                <td></td>
                                @endif
                                @endif
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