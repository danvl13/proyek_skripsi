@extends('layouts.app')

@section('content')
<section class="content-header">
    
    <ol class="breadcrumb">
        
    </ol>
</section>

     <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <div class="box">
                  <!-- /.box-header -->
                  <div class="box-body">
                    <div class="container">
                      <br>
                      <h3 style="display:inline">Data Acara</h3>
                      
                      <form style="clear:both" class="form-horizontal" method="POST" action="#">
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Nama Acara:</label>
                          <div class="col-lg-10">
                            <p class="form-control-static" >{{$acara->nama}}</p>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Tanggal Mulai Acara:</label>
                          <div class="col-lg-10">
                            <p class="form-control-static" >{{$acara->tgl_mulai_acara}}</p>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Tanggal Selesai Acara:</label>
                          <div class="col-lg-10">
                            <p class="form-control-static" >{{$acara->tgl_selesai_acara}}</p>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Tanggal Batas Pendaftaran:</label>
                          <div class="col-lg-10">
                            <p class="form-control-static" >{{$acara->tgl_batas_ubah}}</p>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Tempat Acara:</label>
                          <div class="col-lg-10">
                            <p class="form-control-static" >{{$acara->tmpt_acara }}</p>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Keterangan:</label>
                          <div class="col-lg-10">
                            <p class="form-control-static" >{{$acara->keterangan }}</p>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">IPK Minimum:</label>
                          <div class="col-lg-10">
                            <p class="form-control-static" >{{$acara->ipkmin }}</p>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Kategori:</label>
                          <div class="col-lg-10">
                            <p class="form-control-static">{{ $acara->kategori->nama }}</p>
                          </div>
                        </div>
                        @if(Auth::user()->status !=1 )
                        <h3>Divisi yang dibutuhkan </h3>
                        
                        <table class="table">
                            <thead>
                                <tr>
                                    
                                    <th>Divisi</th>
                                    <th>Kuota</th>
                                    
                                </tr>
                            </thead>
                            <tbody id="tbody-divisi">
                            
                              @foreach($acara->divisiperacara as $key => $divisiperacara)
                              <tr>
                                <td> <p class="form-control-static">{{ $divisiperacara->divisi->nama}}</p></td>
                                <td> <p class="form-control-static">{{  $divisiperacara->kuota }}</p></td>
                              </tr>
                              @endforeach
                            
                            </tbody>
                        </table>
                        <br>
                        <h3 style="display:inline">Jadwal Wawancara</h3>
                        <div class ="pull-right">
                          <a href="{{ route('acara-pengurus.hasil',['id'=> $acara->id]) }}"><button type="button" class='btn bg-navy' ><i class="fa fa-eye"></i>&nbsp; Hasil Wawancara</button></a>
                        </div>
                        <br><br>
                        @if(session()->has('errorMsg'))
                          <div class= "alert alert-danger">
                            <strong class="fa fa-exclamation-circle"></strong>&nbsp {{ session('errorMsg')}}
                          </div>
                        @endif
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Tempat</th>
                                    <th>Pewawancara</th>
                                    <th>Pendaftar</th>
                                    <th>Rating</th>
                                    <th>Divisi1 Pendaftar</th>
                                    <th>Divisi2 Pendaftar</th>
                                    <th>Diterima/ Ditolak</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-jadwal">
                          
                              @foreach($list_jadwal as $key => $jadwal)
                              <tr>
                                <td><p class="form-control-static">{{ $jadwal->tgl_wawan }}</p></td>
                                <td><p class="form-control-static">{{ $jadwal->jam_wawan }}</p></td>
                                <td><p class="form-control-static">{{ $jadwal->tmpt_wawan }}</p></td>
                                <td><p class="form-control-static">{{ $jadwal->pewawancara }}</p></td>
                                @if($jadwal->nama)
                                <td><a href="{{route('mahasiswa.view', ['id'=>$jadwal->user_id])}}"><p class="form-control-static">{{ $jadwal->nama? $jadwal->nama : '' }}</p></a></td>
                                <td><p class="form-control-static">{{ (($jadwal->ipk/4*0.4) + (($tahun - $jadwal->tahun)/6*0.6)) *100 }}</p></td>
                                @else
                                <td></td>
                                <td></td>
                                @endif
                                <td><p class="form-control-static">{!! $jadwal->divisi_id1? ($jadwal->divisi_diterima == $jadwal->divisi_id1? '<span class="label label-primary">'.$jadwal->divisi_nama1.'</span>' : $jadwal->divisi_nama1) : '' !!}</p></td>
                                <td><p class="form-control-static">{!! $jadwal->divisi_id2? ($jadwal->divisi_diterima == $jadwal->divisi_id2? '<span class="label label-primary">'.$jadwal->divisi_nama2.'</span>' : $jadwal->divisi_nama2) : '' !!}</p></td>
                                <td>
                                  @if($jadwal->nama && $jadwal->status == 0)
                                  <button id="terima-button" type="button" class='btn btn-success' data-toggle="modal" data-target="#myModal" data-jadwal="{{ $jadwal->id }}" data-divisi-id-1="{{$jadwal->divisi_id1}}" data-divisi-id-2="{{$jadwal->divisi_id2}}" data-divisi-nama-1="{{$jadwal->divisi_nama1}}" data-divisi-nama-2="{{$jadwal->divisi_nama2}}">Terima</button>
                                  <a href="{{ route('acara-pengurus.tolak', ['acara' => $acara->id,'id' => $jadwal->id]) }}">
                                    <button type="button" class='btn btn-danger' >Tolak</button>
                                  </a>
                                  @elseif($jadwal->nama && $jadwal->status == 1)
                                  <span class="label label-success">Diterima</span>
                                  @elseif($jadwal->nama && $jadwal->status == 2)
                                  <span class="label label-danger">Ditolak</span>
                                  @endif
                                </td>
                              </tr>
                              @endforeach
                            
                            </tbody>
                        </table>
                        <br>
                        @csrf
                        @if(isset($acara))
                        <input type="hidden" name='id' value='{{$acara->id}}'>
                        @endif
                        <div class="form-group">
                          <div class="col-lg-2"></div>
                          <div class="col-lg-10">
                            
                          </div>
                        </div>
                      </div>
                      @endif
                    </form>

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

        <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <form method="post" action="{{route ('acara-pengurus.terima')}}">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Form Penerimaan</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class="col-lg-2 control-label">Pilih Divisi</label>
            <div class="col-lg-10">
              <select id= "select-divisi" name="id" class="form-control"></select>
            </div>
          </div>
          <br><br>
        </div>
        <div class="modal-footer">
          <input id="jadwal-id-modal" type ="hidden" name="jadwal" value="">
          <input type ="hidden" name="acara" value="{{$jadwal->acara_id}}">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success" >Terima</button>
        </div>
        @csrf
      </form>
    </div>

  </div>
</div>
@endsection

@push('scripts')
<script>
function generateOptions(){
  id1 = $(this).data('divisi-id-1')
  id2 = $(this).data('divisi-id-2')
  nama1= $(this).data('divisi-nama-1')
  nama2= $(this).data('divisi-nama-2')
  jadwal= $(this).data('jadwal')
  $('#select-divisi').html('')
  $('#select-divisi').append(`
    <option value='${id1}'>${nama1}</option>
    <option value='${id2}'>${nama2}</option>
  `)
  $('#jadwal-id-modal').val(jadwal)
}

$(document).ready(function(){
  $('#tbody-jadwal').on('click','#terima-button', generateOptions)
});
</script>
@endpush