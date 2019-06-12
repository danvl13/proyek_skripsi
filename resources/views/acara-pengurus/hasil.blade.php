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
                        <h3 style="display:inline">Hasil Diterima</h3>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Pendaftar</th>
                                    <th>Divisi Pendaftar</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-jadwal">
                          
                              @foreach($list_terima as $key => $terima)
                              <tr>
                                <td> {{ $key+1 }} </td>
                                <td><a href="{{route('mahasiswa.view', ['id'=>$terima->user_id])}}"><p class="form-control-static">{{ $terima->user->nama  }}</p></a></td>
                                <td><p class="form-control-static">{{ $terima->divisiperacara->divisi->nama }}</p></td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                        
                        <h3 style="display:inline">Hasil Ditolak</h3>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Pendaftar</th>
                                    <th>Divisi Pendaftar</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-jadwal">
                          
                              @foreach($list_tolak as $key => $tolak)
                              <tr>
                                  <td> {{ $key +  1 }} </td>
                                <td><a href="{{route('mahasiswa.view', ['id'=>$tolak->user_id])}}"><p class="form-control-static">{{ $tolak->user->nama  }}</p></a></td>
                                <td><p class="form-control-static">{{ $tolak->divisiperacara->divisi->nama }}</p></td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                        <br>
                       
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
$('form').submit(function(e){
  e.preventDefault();
})
</script>
@endpush