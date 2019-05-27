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
                      <form method="POST" action="{{ isset($kategori)? route('kategori.edit') : route('kategori.create') }}">
                        <h3>Data Kategori</h3>
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
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Nama Kategori</label>
                          <div class="col-lg-10">
                            <input class="form-control" type="text" name="nama" value="{{ isset($kategori)? $kategori->nama : '' }}">
                          </div>
                        </div>
                        @csrf
                        <input type="hidden" name="id"  value="{{ isset($kategori)? $kategori->id : '' }}">
                        <br>
                        <br>
                        <button type="submit" class="btn btn-success pull-right"><i class="fa fa-plus"></i>&nbsp; Simpan</button>
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