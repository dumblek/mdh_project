<p>
@include('admin/kategori_kas/tambah')
</p>

<table class="table table-bordered" id="example1">
<thead>
<tr>
    <th width="5%">NO</th>
    <th width="40%">NAMA KATEGORI</th>
    <th width="25%">KODE</th>
    <th width="20%">AKSI></th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($kategori_kas as $kategori_kas) { ?>

<tr>
    <td class="text-center"><?php echo $i ?></td>
    <td><?php echo $kategori_kas->nama ?></td>
    <td><?php echo $kategori_kas->kode ?></td>
    <td>
      <div class="btn-group">
      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Edit<?php echo $kategori_kas->id ?>">
    <i class="fa fa-edit"></i> Edit
</button>
      <a href="{{ asset('admin/kategori_kas/delete/'.$kategori_kas->id) }}" class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt"></i> Hapus</a>
      </div>
      @include('admin/kategori_kas/edit')
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>