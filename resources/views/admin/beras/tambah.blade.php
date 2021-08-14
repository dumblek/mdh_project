
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">

				<h4 class="modal-title" id="myModalLabel">Tambah data?</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="{{ asset('admin/pemasukan/tambah') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
{{ csrf_field() }}
				<!-- <div class="form-group row">
					<label class="col-sm-3 control-label text-right">No Kwitansi</label>
					<div class="col-sm-9">
						<input type="text" name="kode" class="form-control" placeholder="No Kwitansi" value="{{ old('kode') }}" required>
					</div>
				</div> -->
				<div class="row form-group">
					<label class="col-md-3 text-right">Kategori Kas</label>
					<div class="col-md-9">
						<select name="id_kategori_kas" class="form-control">

							<?php foreach($kategori_kas as $kategori_kas) { ?>
							<option value="<?php echo $kategori_kas->id ?>"><?php echo $kategori_kas->nama ?></option>
							<?php } ?>

						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 control-label text-right">Keterangan</label>
					<div class="col-sm-9">
						<input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="{{ old('keterangan') }}" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 control-label text-right">Tanggal</label>
					<div class="col-sm-9">
						<input type="date" name="tanggal" class="form-control" placeholder="Tanggal" value="{{ old('tanggal') }}" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 control-label text-right">Jumlah</label>
					<div class="col-sm-9">
						<input type="number" name="amount" class="form-control" placeholder="Jumlah" value="{{ old('amount') }}" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 control-label text-right"></label>
					<div class="col-sm-9">
						<div class="form-group pull-right btn-group">
							<input type="submit" name="submit" class="btn btn-primary " value="Simpan Data">
							<input type="reset" name="reset" class="btn btn-success " value="Reset">
							<button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				</form>

			</div>
		</div>
	</div>
</div>
