@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        List Acara yang didaftarkan 
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
                    <a href="{{ route('acara-pengurus.create-page')}}">
                        <button class="btn btn-box-tools bg-navy"> Tambah Acara</button> 
                    </a>
                    </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    @if(session()->has('successMsg'))
                    <div class= "alert alert-success">
                        <strong class="fa fa-check-circle"></strong>&nbsp {{ session('successMsg')}}
                    </div>
                    @endif
                    @if(session()->has('errorMsg'))
                    <div class= "alert alert-danger">
                        <strong class="fa fa-exclamation-circle"></strong>&nbsp {{ session('errorMsg')}}
                    </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Acara</th>
                                <th>Status Acara</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list_acara as $key => $acara)
                            <tr>
                                <td> {{$key + 1}}</td>
                                <td> <a href="{{ route('acara-pengurus.view', ['id' => $acara->id ])}}">{{$acara->nama}} </a></td>
                                <td> {{ $acara->tgl_mulai_acara > $today? 'Yang akan datang' : ( $acara->tgl_mulai_acara <= $today && $today <= $acara->tgl_selesai_acara? 'Berlangsung' : ( $today > $acara->tgl_selesai_acara? 'Berakhir' : '') ) }} </td>
                                <td>
                                    @if($today<$acara->tgl_mulai_acara)
                                    <a href="{{ route('acara-pengurus.edit-page', ["id" => $acara->id]) }}"><button class='btn btn-warning'>Edit</button></a>
                                    {{-- <button class='btn btn-danger delete-button' data-id="{{$acara->id}}">Delete</button> --}}
                                    @endif
                                </td>
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
datatable= $('.table').DataTable()

function deleteAcara(id){
    return $.ajax({
        url:"{{ route('acara-pengurus.delete') }}",
        type:"post",
        data:{'id':id, '_token':'{{csrf_token() }}'}
    })
}

function deleteData(){
    swal({
        title:"warning",
        text:'Are you sure you want to delete this data? \nthis action will also delete any data related to this data.',
        buttons: {
            cancel:"Cancel",
            delete:{text:"Delete"},
        },
        icon:"warning"
    }).then(data=> {
        if(data){
            deleteAcara($(this).data('id')).done(resp=>{
                if(resp.status=='ok'){
                    datatable
                        .row($(this).parents('tr'))
                        .remove()
                        .draw();
                    swal("Success","Data Successfully deleted","success");
                }
            }).fail(function(){
                swal("Error","Fail to delete data","error");
            });
        }
    });
}

$(function(){
    $('.table tbody').on('click','.delete-button', deleteData)
});
</script>
@endpush