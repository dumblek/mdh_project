@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div>
    <form action="{{ asset('admin/keuangan/cari') }}" method="get" accept-charset="utf-8" class="form-inline">
      {{ csrf_field() }}
    <div class="input-group">
        <label for="kategori" class="mr-sm-2">Kategori Kas: </label>
        <select name="id_kategori" id="kategori" class="form-control mr-sm-2 input-group" value="2">
            <option value="all" <?php $kategori = $request->id_kategori ?? ''; if($kategori == 'all'){echo("selected");} ?>>Semua</option>
            <?php foreach($kategori_kas as $kategori_kas) { ?>
            <option value="<?php echo $kategori_kas->id ?>" <?php if($kategori_kas->id == $kategori){echo("selected");} ?>><?php echo $kategori_kas->nama ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="input-group">
        <label for="date" class="mr-sm-2">Tanggal: </label>
        <input type="date" name="start" id="date" class="form-control" value="{{ $request->start ?? $default_start }}">
        <span class="input-group-text">to</span>
        <input type="date" name="end" class="form-control" value="{{ $request->end ?? $default_end }}">
        <span class="input-group-btn btn-flat">
            <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>
        </span>
    </div>
    </form>
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
            <th width="10%">Tanggal</th>
            <th width="15%">Pemasukan</th>
            <th width="15%">Pengeluaran</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td>1</td>
            <td>-</td>
            <td colspan="1" class="text-left">Saldo Awal</td>
            <td>{{ $tanggal_saldo_awal }}</td>
            <td colspan="2" class="text-center">{{ $saldo_awal }}</td>
        </tr>
        <?php $i=2; foreach($keuangan as $k) { ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $k->kode ?></td>
            <td><?php echo $k->keterangan ?></td>
            <td class="text-center"><?php echo $k->tanggal ?></td>
            <td class="text-right"><?php if($k->type == 'in'){ echo $k->rupiah; } else { echo '-'; } ?></td>
            <td class="text-right"><?php if($k->type == 'out'){ echo $k->rupiah; } else { echo '-'; } ?></td>
        </tr>

    <?php $i++; } ?>

    </tbody>
    <tfoot>
        <tr>
            <th class="text-center" colspan="4">TOTAL</th>
            <th class="text-right"><?php echo $total_pemasukan ?></th>
            <th class="text-right"><?php echo $total_pengeluaran ?></th>
        </tr>
        <tr>
            <th class="text-center" colspan="4">SALDO AKHIR</th>
            <th class="text-center" colspan="2"><?php echo $saldo_akhir ?></th>
        </tr>
    </tfoot>
</table>
</div>
</div>