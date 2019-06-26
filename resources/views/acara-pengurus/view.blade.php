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
                                    <th>Divisi Pendaftar</th>
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
                                <td><p class="form-control-static">{{ $jadwal->divisi? $jadwal->divisi : '' }}</p></td>
                                <td>
                                  @if($jadwal->nama && $jadwal->status == 0)
                                  <a href="{{ route('acara-pengurus.terima', ['acara' => $jadwal->acara_id,'id' => $jadwal->id]) }}">
                                    <button type="button" class='btn btn-success' >Terima</button>
                                    
                                  </a>
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
@endsection

@push('scripts')
<script>
$('form').submit(function(e){
  e.preventDefault();
})
</script>
@endpush