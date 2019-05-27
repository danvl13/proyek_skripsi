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
                      <h3 style="display:inline">Data Mahasiswa</h3>
                      <br><br>
                      <form style="clear:both" class="form-horizontal" method="POST" action="{{ isset($acara)? route('acara-pengurus.edit') : route('acara-pengurus.create') }}">
                        <div class="row">
                          <div class="col-lg-8">
                            <div class="form-group">
                              <label class="col-lg-2 control-label">NRP :</label>
                              <div class="col-lg-10">
                                <p class="form-control-static" >{{$user->nrp}}</p>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Nama :</label>
                              <div class="col-lg-10">
                                <p class="form-control-static" >{{$user->nama}}</p>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Program Studi :</label>
                              <div class="col-lg-10">
                                <p class="form-control-static" >{{$user->prodi}}</p>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Tahun :</label>
                              <div class="col-lg-10">
                                <p class="form-control-static" >{{$user->tahun}}</p>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Tempat Tanggal Lahir :</label>
                              <div class="col-lg-10">
                                <p class="form-control-static" >{{$user->ttl}}</p>
                              </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Alamat :</label>
                                <div class="col-lg-10">
                                  <p class="form-control-static" >{{$user->alamat}}</p>
                                </div>
                              </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Agama :</label>
                              <div class="col-lg-10">
                                <p class="form-control-static" >{{$user->agama}}</p>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Jenis Kelamin :</label>
                              <div class="col-lg-10">
                                <p class="form-control-static" >{{$user->jnskl == 1? 'Laki-laki' : 'Perempuan'}}</p>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Nomor Handphone :</label>
                              <div class="col-lg-10">
                                <p class="form-control-static" >{{$user->nohp}}</p>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Line :</label>
                              <div class="col-lg-10">
                                <p class="form-control-static" >{{$user->line}}</p>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Email :</label>
                              <div class="col-lg-10">
                                <p class="form-control-static" >{{$user->email}}</p>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">IPK :</label>
                              <div class="col-lg-10">
                                <p class="form-control-static" >{{$user->ipk}}</p>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Jumlah Kredit Poin :</label>
                              <div class="col-lg-10">
                                <p class="form-control-static" >{{$user->jumkp}}</p>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Hobi :</label>
                              <div class="col-lg-10">
                                <p class="form-control-static" >{{$user->hobi}}</p>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Motivasi :</label>
                              <div class="col-lg-10">
                                <p class="form-control-static" >{{$user->motivasi}}</p>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Komitmen :</label>
                              <div class="col-lg-10">
                                <p class="form-control-static" >{{$user->komitmen}}</p>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Keunggulan :</label>
                              <div class="col-lg-10">
                                <p class="form-control-static" >{{$user->keunggulan}}</p>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Kelemahan :</label>
                              <div class="col-lg-10">
                                <p class="form-control-static" >{{$user->kelemahan}}</p>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Status :</label>
                              <div class="col-lg-10">
                                <p class="form-control-static" >{{$user->status}}</p>
                              </div>
                            </div>
                          
                          </div>
                          <div class="col-lg-4">
                            @if($user->foto)
                            <img src="{{ asset('/img/user/'.$user->foto) }}" style="width: 100%; height: initial">
                            @endif
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