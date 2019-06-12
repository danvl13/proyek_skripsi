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
                        @if(session()->has('errorMsg'))
                        <div class= "alert alert-danger">
                          <strong class="fa fa-exclamation-circle"></strong>&nbsp {{ session('errorMsg')}}
                        </div>
                        
                        @endif
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
                          <label class="col-lg-2 control-label">Nama Acara</label>
                          <div class="col-lg-10">
                            <input  required class="form-control" type="text" name="nama" value="{{ isset($acara)? $acara->nama : '' }}">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Tanggal Mulai Acara</label>
                          <div class="col-lg-10">
                            <input required id="tgl_mulai_acara" min="{{ date('Y-m-d') }}" class="form-control" type="date" name="tgl_mulai_acara" value="{{ isset($acara)? $acara->tgl_mulai_acara : '' }}">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Tanggal Selesai Acara</label>
                          <div class="col-lg-10">
                            <input required id="tgl_selesai_acara" min="{{ date('Y-m-d') }}" class="form-control" type="date" name="tgl_selesai_acara" value="{{ isset($acara)? $acara->tgl_selesai_acara : '' }}">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Tempat Acara</label>
                          <div class="col-lg-10">
                            <input required class="form-control" type="text" name="tempat_acara"  value="{{ isset($acara)? $acara->tmpt_acara : '' }}">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Keterangan</label>
                          <div class="col-lg-10">
                            <input required class="form-control" type="text" name="keterangan"  value="{{ isset($acara)? $acara->keterangan : '' }}">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">IPK Minimum</label>
                          <div class="col-lg-10">
                            <input required class="form-control" type="number" step="0.01" min="0" max="4" name="ipkmin"  value="{{ isset($acara)? $acara->ipkmin : '' }}">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Kategori</label>
                          <div class="col-lg-10">
                            <select name="kategori_id" class="form-control">
                              @foreach($list_kategori as $key => $kategori)
                              <option value="{{ $kategori->id }}" {{ isset($acara)&& $acara->kategori_id==$kategori->id? 'selected': ''}}>{{ $kategori->nama }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        
                        <h3>Divisi yang dibutuhkan </h3>
                        <button id="divisi-button" type="button" class='btn btn-primary pull-right'><i class="fa fa-plus"></i>&nbsp; Divisi</button>
                        <table class="table">
                            <thead>
                                <tr>
                                    
                                    <th>Divisi</th>
                                    <th>Kuota</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-divisi">
                            @if(isset($acara))
                              @foreach($acara->divisiperacara as $key => $divisiperacara)
                              <tr>
                                <td> 
                                  <select name="divisi_id[]" class="form-control divisi_id">
                                    @foreach($list_divisi as $divisi)
                                    <option value="{{ $divisi->id }}" {{ isset($acara) && $acara->divisiperacara[$key]->divisi_id==$divisi->id? 'selected': ''}}>{{ $divisi->nama }}</option>
                                    @endforeach
                                  </select>
                                </td>
                                <td> <input class="form-control" type="number" name="kuota[]" value="{{ $divisiperacara->kuota }}" required></td>
                                <td>
                                    <input type="hidden" name="id_divisiperacara[]" value="{{ $divisiperacara->id }}">
                                    <button type="button" class="btn btn-danger hapus-button"><i class="fa fa-trash"></i></button>
                                </td>
                              </tr>
                              @endforeach
                            @else
                              <tr>
                                  <td> 
                                    <select name="divisi_id[]" class="form-control divisi_id">
                                      @foreach($list_divisi as $key => $divisi)
                                      <option value="{{ $divisi->id }}"> {{ $divisi->nama }}  </option>
                                      @endforeach
                                    </select>
                                  </td>
                                  <td> <input class="form-control" type="number" name="kuota[]" required></td>
                                  <td>
                                      <button type="button" class="btn btn-danger hapus-button"><i class="fa fa-trash"></i></button>
                                  </td>
                              </tr>
                            @endif
                            </tbody>
                        </table>
                        <br>
                        <h3>Jadwal Wawancara</h3>
                        <button id="jadwal-button" type="button" class='btn btn-primary pull-right'><i class="fa fa-plus"></i>&nbsp; Jadwal</button>
                        <table class="table">
                            <thead>
                                <tr>
                                    
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Tempat</th>
                                    <th>Pewawancara</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-jadwal">
                            @if(isset($acara))
                              @foreach($acara->jadwal as $jadwal)
                              <tr>
                                <td> <input class="form-control tgl_wawan" min="{{ date('Y-m-d') }}" type="date" name="tgl_wawan[]" value="{{ $jadwal->tgl_wawan }}" required></td>
                                <td> <input class="form-control jam_wawan" type="time" name="jam_wawan[]" value="{{ $jadwal->jam_wawan }}" required></td>
                                <td> <input class="form-control" type="text" name="tmpt_wawan[]" value="{{ $jadwal->tmpt_wawan }}" required></td>
                                <td> <input class="form-control pewawancara" type="text" name="pewawancara[]" value="{{ $jadwal->pewawancara }}" required></td>
                                <td>
                                  <input type="hidden" class="tgl_wawan_terbesar" name="tgl_wawan_terbesar[]" value="{{ $jadwal->tgl_wawan_terbesar }}">
                                    <input type="hidden" name="id_jadwal[]" value="{{ $jadwal->id }}">
                                    <button type="button" class="btn btn-danger hapus-button"><i class="fa fa-trash"></i></button>
                                </td>
                              </tr>
                              @endforeach
                            @else
                              <tr>
                                  <td> <input class="form-control tgl_wawan" min="{{ date('Y-m-d') }}" type="date" name="tgl_wawan[]" required></td>
                                  <td> <input class="form-control jam_wawan" type="time" name="jam_wawan[]" required></td>
                                  <td> <input class="form-control" type="text" name="tmpt_wawan[]" required></td>
                                  <td> <input class="form-control pewawancara" type="text" name="pewawancara[]" required></td>
                                  <td>
                                      <input type="hidden" class="tgl_wawan_terbesar" name="tgl_wawan_terbesar[]" value="0">
                                      <button type="button" class="btn btn-danger hapus-button"><i class="fa fa-trash"></i></button>
                                  </td>
                              </tr>
                            @endif
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
                            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-plus"></i>&nbsp; Simpan</button>
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
var list_divisi = <?= $list_divisi ?>;
function tambah_divisi(){
  html = `
  <tr>
      <td> 
        <select name="divisi_id[]" class="form-control divisi_id">
  `;

  list_divisi.forEach((divisi) => {
    html += `
      <option value="${divisi.id}"> ${divisi.nama}  </option>
    `;
  })

  html +=`
        </select>
      </td>
      <td> <input class="form-control" type="number" name="kuota[]" required></td>
      <td>
          <input type="hidden" name="id_divisiperacara[]">
          <button type="button" class="btn btn-danger hapus-button"><i class="fa fa-trash"></i></button>
      </td>
  </tr>
  `;

  $("#tbody-divisi").append(html)
}

function tambah_jadwal(){
  $("#tbody-jadwal").append(`
  <tr>
      <td> <input class="form-control tgl_wawan" min="{{ date('Y-m-d') }}" type="date" name="tgl_wawan[]" required></td>
      <td> <input class="form-control jam_wawan" type="time" name="jam_wawan[]" required></td>
      <td> <input class="form-control" type="text" name="tmpt_wawan[]" required></td>
      <td> <input class="form-control pewawancara" type="text" name="pewawancara[]" required></td>
      <td>
          <input type="hidden" name="id_jadwal[]" >
          <input type="hidden" class="tgl_wawan_terbesar" name="tgl_wawan_terbesar[]" value="0">
          <button type="button" class='btn btn-danger hapus-button'><i class="fa fa-trash"></i></button>
      </td>
  </tr>
  `);
}

function hapus_row(){
  $(this).parents('tr').remove()
}

function submit_form(e){
  // e.preventDefault();
  errorFlag = false;
  divisi=[];
  duplicateFlag = false;
  $('.divisi_id').each(function(){
    console.log($(this).val());
    if(divisi.find(e => e == $(this).val() )){
      duplicateFlag = true;
    }
    divisi.push($(this).val())
    // console.log(duplicateFlag);
  })
  // console.log(divisi)
  // return false;
  tgl_wawan=null;
  index_terbesar = 0;
  $(".tgl_wawan").each(function(index, value){
    if(tgl_wawan==null){
      tgl_wawan=$(this).val();
    }
    if($(this).val()>tgl_wawan){
      tgl_wawan=$(this).val();
      index_terbesar = index;
    }

  })
  duplicatePewawancara = false;
  tanggal = $(".tgl_wawan").toArray();
  jam = $(".jam_wawan").toArray();
  pewawancara = $(".pewawancara").toArray();
  for ( var i = 0; i < tanggal.length; i++ ) {
    
    for ( var j = 0; j < tanggal.length; j++ ) {
      if(i != j){
        if((tanggal[i].value==tanggal[j].value) && (jam[i].value==jam[j].value) && (pewawancara[i].value==pewawancara[j].value) ){
          duplicatePewawancara = true;
        }
      }
    }
  }
  if(duplicatePewawancara){
    alert("tanggal, jam, pewawancara tidak boleh sama");
    errorFlag =true;
  }
  document.getElementsByClassName('tgl_wawan_terbesar')[index_terbesar].value = 1;
  
  // cek tgl mulai acara dgn tgl selesai acara
  if($("#tgl_mulai_acara").val() > $("#tgl_selesai_acara").val()){
    alert("Tanggal mulai acara harus sebelum tanggal selesai acara");
    errorFlag =true;
  }

  // cek tgl wawancara dan tgl acara
  if (tgl_wawan>=$("#tgl_mulai_acara").val()){
    alert("Tanggal Wawancara harus sebelum tanggal mulai acara");
    errorFlag =true;
  }

  
  if(duplicateFlag){
    alert("Divisi tidak boleh kembar ");
    errorFlag =true;
  }

  if(errorFlag){
    return false;
  }

  return true;
}

$(document).ready(function(){
  $("#tbody-jadwal").on('click', ".hapus-button", hapus_row);
  $("#tbody-divisi").on('click', ".hapus-button", hapus_row);
  $("#divisi-button").click(tambah_divisi);
  $("#jadwal-button").click(tambah_jadwal);
  $("form").submit(submit_form);

})
</script>
@endpush