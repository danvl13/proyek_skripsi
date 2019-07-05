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
                      @if(Auth::user()->status !=3)
                      <div class="pull-right">
                          <button class="btn btn-box-tools bg-navy" data-toggle="modal" data-target="#myModal"> Mengikuti Acara</button> 
                      </div>
                      @endif
                      <br><br>
                      <form style="clear:both" class="form-horizontal" method="POST" action="">
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Nama Pendaftar Acara:</label>
                          
                          <div class="col-lg-10">
                            <a href="{{route('mahasiswa.view', ['id'=>$acara->user->id])}}"><p class="form-control-static" >{{$acara->user->nama}}</p></a>
                          </div>
                          
                        </div>
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
                        <h3>Jadwal Wawancara</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Tempat</th>
                                    <th>Pewawancara</th>
                                    <th>Pendaftar</th>
                                    <th>Divisi Pendaftar</th>
                                    <th>Terima</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-jadwal">
                          
                              @foreach($acara->jadwal as $jadwal)
                              <tr>
                                <td> <p class="form-control-static">{{ $jadwal->tgl_wawan }}</p></td>
                                <td> <p class="form-control-static">{{ $jadwal->jam_wawan }}</p></td>
                                <td><p class="form-control-static">{{ $jadwal->tmpt_wawan }}</p></td>
                                <td><p class="form-control-static">{{ $jadwal->pewawancara }}</p></td>
                                <td><p class="form-control-static">{{ $jadwal->user? $jadwal->user->nama : '' }}</p></td>
                                <td><p class="form-control-static">{{ $jadwal->divisiperacara? $jadwal->divisiperacara->divisi->nama : '' }}</p></td>
                                <td>
                                @if($jadwal->user && $jadwal->status == 0)
                                <span class="label label-warning">Belum Diterima / Ditolak</span>
                                @elseif($jadwal->user && $jadwal->status == 1)
                                <span class="label label-success">Diterima</span>
                                @elseif($jadwal->user && $jadwal->status == 2)
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
        <form method="post" action="{{route ('acara.daftar')}}">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Form Mendaftar</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class="col-lg-2 control-label">Pilih Divisi ke 1</label>
              <div class="col-lg-10">
                <?php $max = 0; ?>
                <select name="divisi_id1" class="form-control">
                  @foreach($sort as $key => $s)
                  <?php 
                  if($key == 0){
                    $max = $s['count'];
                  }
                  ?>
                  <option value="{{ $s['divisi']->id }}">{{ ($key == 0 || $s['count'] == $max) && $s['count'] != 0? '*' : '' }} {{ $s['divisi']->divisi->nama }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label">Pilih Divisi ke 2</label>
                <div class="col-lg-10">
                  <?php $max = 0; ?>
                  <select name="divisi_id2" class="form-control">
                    @foreach($sort as $key => $s)
                    <?php 
                    if($key == 0){
                      $max = $s['count'];
                    }
                    ?>
                    <option value="{{ $s['divisi']->id }}">{{ ($key == 0 || $s['count'] == $max) && $s['count'] != 0? '*' : '' }} {{ $s['divisi']->divisi->nama }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            <br><br>
            <div class="form-group">
              <label class="col-lg-2 control-label">Pilih Jadwal Wawancara</label>
              <div class="col-lg-10">
                <select name="jadwal_id" class="form-control">
                  @foreach($list_jadwal as $key => $jadwal)
                  <option value="{{ $jadwal->id }}" >{{ $jadwal->tgl_wawan.' | '. $jadwal->jam_wawan.' | '.$jadwal->tmpt_wawan.' | '. $jadwal->pewawancara }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type ="hidden" name="id" value="{{$acara->id}}">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success" >Ikuti</button>
          </div>
          @csrf
        </form>
      </div>
  
    </div>
  </div>
@endsection

@push('scripts')
<script>

</script>
@endpush