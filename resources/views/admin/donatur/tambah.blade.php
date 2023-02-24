<p class="text-right">
  <a href="{{ asset('admin/donatur') }}" class="btn btn-success btn-sm">
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

<form action="{{ asset('admin/donatur/tambah_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}

<div class="row form-group">
  <label class="col-md-3 text-right">Nama</label>
  <div class="col-md-6">
    <input type="text" name="nama" class="form-control form-control-lg" placeholder="Nama" required="required" value="{{ old('nama') }}">
  </div>
</div>

<div class="row form-group">
  <label class="col-md-3 text-right">Tanggal</label>
  <div class="col-md-3">
    <input type="text" name="tanggal" class="form-control tanggal" placeholder="Tanggal" value="<?php if(isset($_POST['tanggal'])) { echo old('tanggal'); }else{ echo date('d-m-Y'); } ?>" data-date-format="dd-mm-yyyy">
    <small class="text-success">Format: dd-mm-yyyy</small>
  </div>
</div>

<div class="row form-group">
  <label class="col-md-3 text-right">Donasi Untuk</label>
  <div class="col-md-9">
    <select name="donasi_id" class="form-control">

      <?php foreach($donasi as $donasi) { ?>
      <option value="<?php echo $donasi->id ?>"><?php echo $donasi->judul ?></option>
      <?php } ?>

    </select>
  </div>
</div>

<div class="row form-group">
  <label class="col-md-3 text-right">Email</label>
  <div class="col-md-6">
    <input type="text" name="email" class="form-control form-control-lg" placeholder="Email" required="required" value="{{ old('email') }}">
  </div>
</div>

<div class="row form-group">
  <label class="col-md-3 text-right">Telepon</label>
  <div class="col-md-6">
    <input type="text" name="phone" class="form-control form-control-lg" placeholder="Telepon" required="required" value="{{ old('phone') }}">
  </div>
</div>

<div class="row form-group">
  <label class="col-md-3 text-right">Nominal</label>
  <div class="col-md-6">
    <input type="number" name="nominal" class="form-control" placeholder="Nominal" value="{{ old('nominal') }}" required>
  </div>
</div>

<div class="row form-group">
  <label class="col-md-3 text-right">Pesan</label> 
  <div class="col-md-9">
    <textarea name="pesan" class="form-control" id="kontenku" placeholder="Pesan">{{ old('pesan') }}</textarea>
  </div>
</div>

<!-- <div class="row form-group">
  <label class="col-md-3 text-right">Status</label>
  <div class="col-md-2">
  <select name="status" class="form-control select2">
    <option value="Pending">Pending</option>
    <option value="Diterima">Diterima</option>
    <option value="Tidak Diterima">Tidak Diterima</option>
  </select>
  </div>
</div> -->

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

