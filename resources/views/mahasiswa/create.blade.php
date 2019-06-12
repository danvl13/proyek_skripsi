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
                      @if($errors->any())
                        <div class= "alert alert-danger">
                          <h4><i class="icon fa fa-ban"></i>&nbsp Error</h4>
                          <ul style="list-style-type:none;padding:0;">
                            @foreach($errors->all() as $error)
                            <li> {{ $error}}</li>
                            @endforeach
                          </ul>
                        </div>
                      @endif
                      <br><br>
                      <form style="clear:both" class="form-horizontal" method="POST" action="{{ isset($user)? route('mahasiswa.edit') : route('mahasiswa.create') }}" enctype="multipart/form-data" >
                        <div class="row">
                          <div class="col-lg-12">
                            @if(!isset($user))
                            <div class="form-group">
                              <label class="col-lg-2 control-label">NRP :</label>
                              <div class="col-lg-10">
                                  <input type="text" name="nrp" class="form-control" >
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Nama :</label>
                              <div class="col-lg-10">
                                <input type="text" name="nama" class="form-control" value="{{ isset($user)? $user->nama : '' }}">
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Program Studi :</label>
                              <div class="col-lg-10">
                                  <input type="text" name="prodi" class="form-control" value="{{ isset($user)? $user->prodi : '' }}">
                              </div>
                            </div>
                            @endif
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Tempat Tanggal Lahir :</label>
                              <div class="col-lg-10">
                                  <input type="text" name="ttl" class="form-control" value="{{ isset($user)? $user->ttl : '' }}">
                              </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Alamat :</label>
                                <div class="col-lg-10">
                                    <input type="text" name="alamat" class="form-control" value="{{ isset($user)? $user->alamat : '' }}">
                                </div>
                              </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Agama :</label>
                              <div class="col-lg-10">
                                  <input type="text" name="agama" class="form-control" value="{{ isset($user)? $user->agama : '' }}">
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Jenis Kelamin :</label>
                              <div class="col-lg-10">
                                 <select name="jnskl" class="form-control">
                                   <option value="0" {{ isset($user) && $user->jnskl ==0 ?'selected':'' }}>Perempuan</option>
                                   <option value="1" {{ isset($user) && $user->jnskl ==1 ?'selected':'' }}>Laki-laki</option>
                                 </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Nomor Handphone :</label>
                              <div class="col-lg-10">
                                  <input type="text" name="nohp" class="form-control" value="{{ isset($user)? $user->nohp : '' }}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Line :</label>
                              <div class="col-lg-10">
                                  <input type="text" name="line" class="form-control" value="{{ isset($user)? $user->line : '' }}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Email :</label>
                              <div class="col-lg-10">
                                  <input type="email" name="email" class="form-control" value="{{ isset($user)? $user->email : '' }}">
                              </div>
                            </div>
                            @if (Auth::user()->status!=3)
                            <div class="form-group">
                              <label class="col-lg-2 control-label">IPK :</label>
                              <div class="col-lg-10">
                                  <input type="number" step="0.01" min="0" max="4" name="ipk" class="form-control" autocomplete="off" value="{{ isset($user)? $user->ipk : '' }}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Jumlah Kredit Poin :</label>
                              <div class="col-lg-10">
                                  <input type="number" step="0.01" name="jumkp" class="form-control" value="{{ isset($user)? $user->jumkp : '' }}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Hobi :</label>
                              <div class="col-lg-10">
                                  <input type="text" name="hobi" class="form-control" value="{{ isset($user)? $user->hobi : '' }}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Motivasi :</label>
                              <div class="col-lg-10">
                                  <input type="text" name="motivasi" class="form-control" value="{{ isset($user)? $user->motivasi : '' }}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Komitmen :</label>
                              <div class="col-lg-10">
                                  <input type="text" name="komitmen" class="form-control" value="{{ isset($user)? $user->komitmen : '' }}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Keunggulan :</label>
                              <div class="col-lg-10">
                                  <input type="text" name="keunggulan" class="form-control" value="{{ isset($user)? $user->keunggulan : '' }}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Kelemahan :</label>
                              <div class="col-lg-10">
                                  <input type="text" name="kelemahan" class="form-control" value="{{ isset($user)? $user->kelemahan : '' }}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Foto :</label>
                              <div class="col-lg-10">
                                  <input type="file" name="foto" class="form-control" >
                              </div>
                            </div>
                            @endif    
                            <br>
                            @csrf
                            <div class="form-group">
                              <div class="col-lg-2"></div>
                              <div class="col-lg-10">
                                  <button type="submit" class="btn btn-success"> <i class="fa fa-plus"></i> Simpan</button>
                              </div>
                              @if(isset($user))
                              <input type="hidden" name='id' value='{{$user->id}}'>
                              @endif
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