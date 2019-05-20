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
                      <form class="form-horizontal" method="POST" action="{{ isset($acara)? route('acara-pengurus.edit') : route('acara-pengurus.create') }}">
                        <h3>Data Acara</h3>
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
                                </tr>
                            </thead>
                            <tbody id="tbody-jadwal">
                          
                              @foreach($acara->jadwal as $jadwal)
                              <tr>
                                <td> <p class="form-control-static">{{ $jadwal->tgl_wawan }}</p></td>
                               <td> <p class="form-control-static">{{ $jadwal->jam_wawan }}</p></td>
                                <td><p class="form-control-static">{{ $jadwal->tmpt_wawan }}</p></td>
                                <td><p class="form-control-static">{{ $jadwal->pewawancara }}</p></td>
                               
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