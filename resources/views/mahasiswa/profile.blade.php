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
                      <div class="pull-right">
                          <button class="btn bg-navy" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus"></i> Ganti Password</button>
                          <a href="{{route('mahasiswa.edit-page',['id'=>$user->id])}}"><button class="btn btn-warning"> <i class="fa fa-plus"></i> Edit</button></a>
                      </div>
                      
                      <br><br>
                      <form style="clear:both" class="form-horizontal">
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
                                <p class="form-control-static" >{{$user->status== 1? 'mahasiswa' : 'Pengurus Acara'}}</p>
                              </div>
                            </div>
                            @if($list_acara->count() > 0)
                            <h3>Acara yang pernah diikuti</h3>
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Acara</th>
                                  <th>Divisi</th>
                                </tr>

                              </thead>
                              <tbody>
                                  @foreach($list_acara as $key =>$acara)
                                  <tr>
                                    <td>{{$key=1}}</td>
                                    <td> {{$acara->nama}}</td>
                                    <td>{{$acara->jadwal[0]->divisiperacara->divisi->nama}} </td>
                                  </tr>
                                    @endforeach
                              </tbody>
                            </table>
                          @endif
                          </div>
                          <div class="col-lg-4">
                            {{-- <img src="https://source.unsplash.com/400x600/?man" style="width: 100%; height: initial"> --}}
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

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
  
      <!-- Modal content-->
      <div class="modal-content">
        <form method="post" action="{{route ('mahasiswa.ganti-password')}}">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Ganti Password</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class="col-lg-2 control-label">Password Lama</label>
              <div class="col-lg-10">
                <input type="password" name="old" autocomplete="off" class="form-control">
              </div>
            </div>
            <br><br>
            <div class="form-group">
              <label class="col-lg-2 control-label">Password Baru</label>
              <div class="col-lg-10">
                <input type="password" autocomplete="off" name="new" class="form-control">
              </div>
            </div>  
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success" >Simpan</button>
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