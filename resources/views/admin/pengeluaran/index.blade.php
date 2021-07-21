@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<p>
  @include('admin/pengeluaran/tambah')
</p>

<div class="row">
    <div class="col-md-12">
        <div class="btn-group">
            <button type="button" class="btn btn-success " data-toggle="modal" data-target="#Tambah">
                <i class="fa fa-plus"></i> Tambah Baru
            </button>
        </div>
    </div>
</div>

<div class="clearfix"><hr></div>
<div class="table-responsive mailbox-messages">
    <div class="table-responsive mailbox-messages">
<table id="example1" class="display table table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr class="bg-info text-center">
            <th width="5%">No</th>
            <th width="15%">No Kwitansi</th>
            <th width="30%">Keterangan</th>
            <th width="12%">Tanggal</th>
            <th width="15%">Jumlah</th>
            <th width="13%">Dientry Oleh</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

        <?php $i=1; foreach($pengeluaran as $p) { ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $p->kode ?></td>
            <td><?php echo $p->keterangan ?></td>
            <td class="text-center"><?php echo $p->tanggal ?></td>
            <td class="text-right"><?php echo $p->rupiah ?></td>
            <td><?php echo $p->user->nama ?></td>
            <td>
                <div class="btn-group">
                <a href="{{ asset('admin/pengeluaran/edit/'.$p->id) }}" 
                class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                <a href="{{ asset('admin/pengeluaran/delete/'.$p->id) }}" class="btn btn-danger btn-sm  delete-link">
                    <i class="fa fa-trash"></i></a>
                </div>

            </td>
        </tr>

    <?php $i++; } ?>

    </tbody>
</table>
</div>
</div>