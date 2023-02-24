<?php $site   = DB::table('konfigurasi')->first(); ?>
<div class="row">

  <div class="col-md-6">
    <form action="{{ asset('admin/donatur/cari') }}" method="get" accept-charset="utf-8">
      {{ csrf_field() }}
    <div class="input-group">                  
      <input type="text" name="keywords" class="form-control" placeholder="Ketik kata kunci..." value="<?php if(isset($_GET['keywords'])) { echo strip_tags($_GET['keywords']); } ?>" required>
      <span class="input-group-btn btn-flat">
        <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>
        <?php if(Request::segment(3)=="jenis_agenda") { ?>
          <a href="{{ asset('admin/donatur/tambah?jenis_agenda='.Request::segment(4)) }}" class="btn btn-success">
          <i class="fa fa-plus"></i> Tambah Baru</a>
        <?php }else{ ?>
          <a href="{{ asset('admin/donatur/tambah') }}" class="btn btn-success">
          <i class="fa fa-plus"></i> Tambah Baru</a>
        <?php } ?>
      </span>
    </div>
    </form>
  </div>
  <div class="col-md-6 text-left">
   {{ $donatur->links() }}
  </div>
</div>

<div class="clearfix"><hr></div>

<form action="{{ asset('admin/donatur/proses') }}" method="post" accept-charset="utf-8">
<input type="hidden" name="pengalihan" value="<?php echo url()->full(); ?>">
<?php $site   = DB::table('konfigurasi')->first(); ?>
{{ csrf_field() }}
<div class="row">
  <div class="col-md-12">

    <div class="input-group">
      <button class="btn btn-default btn-sm" type="submit" name="hapus" onClick="check();" >
          <i class="fa fa-trash"></i>
        </button> 
      <span class="input-group-btn" >
        <button type="submit" class="btn btn-info btn-sm btn-flat" name="update">Update</button>
        
      

        <button class="btn btn-warning btn-sm" type="submit" name="draft" onClick="check();" >
          <i class="fa fa-times"></i> Draft
        </button>

        <button class="btn btn-primary btn-sm" type="submit" name="publish" onClick="check();" >
          <i class="fa fa-check"></i> Publish
        </button>
      </span>
    </div>
  </div>
    </div>
<div class="table-responsive mailbox-messages">
<table class="display table table-bordered" cellspacing="0" width="100%">
<thead>
    <tr class="bg-dark">
      <th width="5%">
            <div class="mailbox-controls">
                <!-- Check all button -->
               <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
            </div>
      </th>
      <th width="10%">TANGGAL</th>
      <th width="20%">NAMA</th>
      <th width="10%">EMAIL / TELEPON</th>
      <th width="25%">DONASI</th>
      <th width="10%">NOMINAL</th>
      <th width="10%">STATUS</th>
      <th width="5%">ACTION</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($donatur as $donatur) { ?>

<tr>
    <td class="text-center">
      <div class="icheck-primary">
        <input type="checkbox" name="id[]" value="{{ $donatur->id }}" id="check<?php echo $i ?>">
        <label for="check<?php echo $i ?>"></label>
      </div>
    </td>
    <td>
      <?php echo date('d M Y',strtotime($donatur->tanggal)) ?>
    </td>
    <td>
      <?php echo $donatur->nama ?> <sup><i class="fa fa-pencil"></i></sup>
    </td>
    <td>
      <small>
        Email: <?php echo $donatur->email ?>
        <br>Telepon: <?php echo $donatur->phone ?>
      </small>
    </td>
    <td>
      <?php echo $donatur->judul ?>
    </td>
    <td>
      <?php echo $donatur->nominal ?>
    </td>
    <td>
      <a href="{{ asset('admin/donatur/'.$donatur->id.'/status/'.$donatur->status) }}">
      <small class="badge <?php if($donatur->status=="Diterima") { echo 'badge-success'; }elseif($donatur->status=="Tidak Diterima"){ echo 'badge-danger'; }else{ echo 'badge-warning'; } ?> btn-block">
        <i class="fa <?php if($donatur->status=="Diterima") { echo 'fa-check-circle'; }elseif($donatur->status=="Tidak Diterima"){ echo 'fa-times'; }else{ echo 'fa-clock'; } ?>"></i> <?php echo $donatur->status ?></small>
      </a>
    </td>
    <td>
      <div class="btn-group">
        <a href="{{ asset('admin/donatur/edit/'.$donatur->id) }}" 
        class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

        <a href="{{ asset('admin/donatur/delete/'.$donatur->id) }}" class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt"></i></a>
      </div>
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>
</form>