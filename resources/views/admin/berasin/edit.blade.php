@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ asset('admin/berasin/proses_edit') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id" value="<?php echo $berasin->id ?>">
<div class="form-group row">
	<label class="col-sm-3 control-label text-right">No Kwitansi</label>
	<div class="col-sm-9">
		<input type="text" name="kode" class="form-control" placeholder="No Kwitansi" value="<?php echo $berasin->kode ?>" readonly>
	</div>
</div>


<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Keterangan</label>
	<div class="col-sm-9">
		<input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="<?php echo $berasin->keterangan ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Tanggal</label>
	<div class="col-sm-9">
		<input type="date" name="tanggal" class="form-control" placeholder="Tanggal" value="<?php echo $berasin->tanggal ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Jumlah</label>
	<div class="col-sm-9">
		<input type="number" name="jumlah" class="form-control" placeholder="Jumlah" value="<?php echo $berasin->jumlah ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right"></label>
	<div class="col-sm-9">
		<div class="form-group pull-right btn-group">
			<input type="submit" name="submit" class="btn btn-primary " value="Simpan Data">
			<input type="reset" name="reset" class="btn btn-success " value="Reset">
			<a href="{{ asset('admin/berasin') }}" class="btn btn-danger">Kembali</a>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
</form>

