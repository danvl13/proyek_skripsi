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
                      <form style="clear:both" class="form-horizontal" method="POST" action="{{ isset($acara)? route('acara-pengurus.edit') : route('acara-pengurus.create') }}">
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
                        
                        
                        <h3>Jadwal Wawancara</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Tempat</th>
                                    <th>Pewawancara</th>
                                    <th>Divisi</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-jadwal">
                              <tr>
                                <td><p class="form-control-static">{{ $acara->jadwal[0]->tgl_wawan }}</p></td>
                                <td><p class="form-control-static">{{ $acara->jadwal[0]->jam_wawan }}</p></td>
                                <td><p class="form-control-static">{{ $acara->jadwal[0]->tmpt_wawan }}</p></td>
                                <td><p class="form-control-static">{{ $acara->jadwal[0]->pewawancara }}</p></td>
                                <td><p class="form-control-static">{{ $acara->jadwal[0]->divisiperacara->divisi->nama }}</p></td>
                              </tr>
                            </tbody>
                        </table>
                        <br>
                        
                        
                      </div>
                      
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

</script>
@endpush