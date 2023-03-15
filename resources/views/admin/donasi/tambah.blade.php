<p class="text-right">
  <a href="{{ asset('admin/donasi') }}" class="btn btn-success btn-sm">
    <i class="fa fa-backward"></i> Kembali
  </a>
</p>
<hr>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ asset('admin/donasi/tambah_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}
<div class="row form-group">
  <label class="col-md-3 text-right">Judul atau Nama</label>
  <div class="col-md-6">
    <input type="text" name="judul" class="form-control form-control-lg" placeholder="Judul atau Nama" required="required" value="{{ old('judul') }}">
  </div>
</div>

<div class="row form-group">
  <label class="col-md-3 text-right">Tanggal Mulai</label>
  <div class="col-md-3">
    <input type="text" name="tanggal_mulai" class="form-control tanggal" placeholder="Tanggal mulai" value="<?php if(isset($_POST['tanggal_mulai'])) { echo old('tanggal_mulai'); }else{ echo date('d-m-Y'); } ?>" data-date-format="dd-mm-yyyy">
    <small class="text-success">Format: dd-mm-yyyy</small>
  </div>
</div>

<div class="row form-group">
  <label class="col-md-3 text-right">Tanggal Selesai</label>
  <div class="col-md-3">
    <input type="text" name="tanggal_selesai" class="form-control tanggal" placeholder="Tanggal selesai" value="<?php if(isset($_POST['tanggal_selesai'])) { echo old('tanggal_selesai'); }else{ echo date('d-m-Y'); } ?>" data-date-format="dd-mm-yyyy">
    <small class="text-success">Format: dd-mm-yyyy</small>
  </div>
</div>

<div class="row form-group">
  <label class="col-md-3 text-right">Upload gambar</label>
  <div class="col-md-6">
    <input type="file" name="gambar" class="form-control" placeholder="Upload gambar">
  </div>
</div>

<div class="row form-group">
  <label class="col-md-3 text-right">Target</label>
  <div class="col-md-6">
  <input type="number" name="target" class="form-control" placeholder="Target" value="{{ old('target') }}" required>
  </div>
</div>

<div class="row form-group">
  <label class="col-md-3 text-right">Kode Uniq</label>
  <div class="col-md-6">
  <input type="number" name="kode_uniq" class="form-control" placeholder="Kode Uniq" value="{{ old('kode_uniq') }}" required>
  </div>
</div>

<div class="row form-group">
  <label class="col-md-3 text-right">Isi dan Keterangan Lengkap</label> 
  <div class="col-md-9">
    <textarea name="isi" class="form-control" id="kontenku" placeholder="Isi agenda">{{ old('isi') }}</textarea>
  </div>
</div>

<div class="row form-group">
  <label class="col-md-3 text-right"></label>
  <div class="col-md-9">
    <div class="form-group">
      <button type="submit" name="submit" class="btn btn-success "><i class="fa fa-save"></i> Simpan Data</button>
      <input type="reset" name="reset" class="btn btn-info " value="Reset">
    </div>
  </div>
</div>
</form>

