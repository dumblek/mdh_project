
<div class="modal fade" id="Edit<?php echo $kategori_kas->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
	<h4 class="modal-title" id="myModalLabel">Edit data</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
    
<form action="{{ asset('admin/kategori_kas/edit') }}" method="post" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id" value="{{ $kategori_kas->id }}">
<div class="form-group row">
	<label class="col-md-3 text-right">Nama Kategori</label>
	<div class="col-md-9">
		<input type="text" name="nama" class="form-control" placeholder="Nama kategori kas" value="<?php echo $kategori_kas->nama ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-3 text-right">Kode</label>
	<div class="col-md-9">
		<textarea name="kode" class="form-control" placeholder="Kode">{{ $kategori_kas->kode }}</textarea>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-3 text-right"></label>
	<div class="col-md-9">
<div class="btn-group">
<input type="submit" name="submit" class="btn btn-success " value="Simpan Data">
<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
</div>
</div>
</div>

<div class="clearfix"></div>

</form>

</div>
</div>
</div>
</div>
