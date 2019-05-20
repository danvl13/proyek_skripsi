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
                                <th>Nama</th>
                                @if(Auth::user()->status == 3)
                                <th>Approve</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list_acara as $key => $acara)
                            <tr>
                                <td> {{$key + 1}}</td>
                                <td> <a href="{{ route('acara-pengurus.edit-page', ["id" => $acara->id]) }}">{{$acara->nama}} </a></td>
                                @if(Auth::user()->status == 3)
                                @if($acara->status==0)
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