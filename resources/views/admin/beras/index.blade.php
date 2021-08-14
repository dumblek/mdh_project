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
    <form action="{{ asset('admin/beras/cari') }}" method="get" accept-charset="utf-8" class="form-inline">
      {{ csrf_field() }}

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
            <th width="15%">Masuk</th>
            <th width="15%">Keluar</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td>1</td>
            <td colspan="2" class="text-center">Saldo Awal</td>
            <td>{{ $tanggal_saldo_awal }}</td>
            <td colspan="2" class="text-center">{{ $saldo_awal }} Kg</td>
        </tr>
        <?php $i=2; foreach($beras as $k) { ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $k->kode ?></td>
            <td><?php echo $k->keterangan ?></td>
            <td class="text-center"><?php echo $k->tanggal ?></td>
            <td class="text-right"><?php if($k->type == 'in'){ echo $k->jumlah . ' Kg'; } else { echo '-'; } ?></td>
            <td class="text-right"><?php if($k->type == 'out'){ echo $k->jumlah . ' Kg'; } else { echo '-'; } ?></td>
        </tr>

    <?php $i++; } ?>

    </tbody>
    <tfoot>
        <tr>
            <th class="text-center" colspan="4">TOTAL</th>
            <th class="text-right"><?php echo $total_pemasukan ?> Kg</th>
            <th class="text-right"><?php echo $total_pengeluaran ?> Kg</th>
        </tr>
        <tr>
            <th class="text-center" colspan="4">SALDO AKHIR</th>
            <th class="text-center" colspan="2"><?php echo $saldo_akhir ?> Kg</th>
        </tr>
    </tfoot>
</table>
</div>
</div>