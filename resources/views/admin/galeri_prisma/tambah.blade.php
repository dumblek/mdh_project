<p class="text-right">
  <a href="{{ asset('admin/galeri-prisma') }}" 
  class="btn btn-success btn-sm"><i class="fa fa-backward"></i> Kembali</a>
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

<form action="{{ asset('admin/galeri-prisma/tambah_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}

<div class="row form-group">
<label class="col-md-3 text-right">Album</label>
<div class="col-md-9">
<select name="id_kategori_galeri" class="form-control">
	<?php foreach($kategori_galeri as $kategori_galeri) { ?>
	<option value="<?php echo $kategori_galeri->id_kategori_galeri ?>"><?php echo $kategori_galeri->nama_kategori_galeri ?></option>
	<?php } ?>
</select>
</div>
</div>

<div class="row form-group">
<label class="col-md-3 text-right">Upload gambar</label>
<div class="col-md-9">
<input type="file" name="gambar" class="form-control" required="required" placeholder="Upload gambar">
</div>
</div>

<!-- <div class="row form-group">
<label class="col-md-3 text-right">Judul galeri</label>
<div class="col-md-9">
<input type="text" name="judul_galeri" class="form-control" placeholder="Judul galeri" value="{{ old('judul_galeri') }}">
</div>
</div> -->

<div class="row form-group">
<label class="col-md-3 text-right"></label>
<div class="col-md-9">
<div class="form-group">
<input type="submit" name="submit" class="btn btn-success " value="Simpan Data">
<input type="reset" name="reset" class="btn btn-info " value="Reset">
</div>
</div>
</div>
</form>