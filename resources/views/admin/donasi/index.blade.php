<?php $site   = DB::table('konfigurasi')->first(); ?>
<div class="row">

  <div class="col-md-6">
    <form action="{{ asset('admin/donasi/cari') }}" method="get" accept-charset="utf-8">
      {{ csrf_field() }}
    <div class="input-group">                  
      <input type="text" name="keywords" class="form-control" placeholder="Ketik kata kunci..." value="<?php if(isset($_GET['keywords'])) { echo strip_tags($_GET['keywords']); } ?>" required>
      <span class="input-group-btn btn-flat">
        <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>
        <?php if(Request::segment(3)=="jenis_agenda") { ?>
          <a href="{{ asset('admin/donasi/tambah?jenis_agenda='.Request::segment(4)) }}" class="btn btn-success">
          <i class="fa fa-plus"></i> Tambah Baru</a>
        <?php }else{ ?>
          <a href="{{ asset('admin/donasi/tambah') }}" class="btn btn-success">
          <i class="fa fa-plus"></i> Tambah Baru</a>
        <?php } ?>
      </span>
    </div>
    </form>
  </div>
  <div class="col-md-6 text-left">
   {{ $donasi->links() }}
  </div>
</div>

<div class="clearfix"><hr></div>

<form action="{{ asset('admin/donasi/proses') }}" method="post" accept-charset="utf-8">
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
      <th width="5%">GAMBAR</th>
      <th width="30%">JUDUL</th>
      <th width="25%">TANGGAL</th>
      <th width="25%">TARGET</th>
      <th width="25%">TERCAPAI</th>
      <th width="10%">STATUS</th>
      <th width="10%">OLEH</th>
      <th width="15%">ACTION</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($donasi as $donasi) { ?>

<tr>
    <td class="text-center">
      <div class="icheck-primary">
        <input type="checkbox" name="id[]" value="{{ $donasi->id }}" id="check<?php echo $i ?>">
        <label for="check<?php echo $i ?>"></label>
      </div>
    </td>
    <td class="text-center">
    <?php if($donasi->gambar!="") { ?>
      <img src="{{ asset('assets/upload/image/thumbs/'.$donasi->gambar) }}" class="img-thumbnail img-size-50 mr-2" >
      <?php }else{ ?>
      <img src="{{ asset('assets/upload/image/thumbs/'.website('icon')) }}" class="img-thumbnail img-size-50 mr-2" >
      <?php } ?>
    </td>
    <td>
      <a href="{{ asset('admin/donasi/edit/'.$donasi->id) }}">
        <?php echo $donasi->judul ?> <sup><i class="fa fa-pencil"></i></sup>
      </a>
    </td>
    <td>
      <small>
        Mulai: <?php echo date('d M Y',strtotime($donasi->tanggal_mulai)) ?>
        <br>Selesai: <?php echo date('d M Y',strtotime($donasi->tanggal_selesai)) ?>
      </small>
    </td>
    <td>
      <?php echo $donasi->target ?>
    </td>
    <td>
      <?php echo $donasi->tercapai ?>
    </td>
    <td>
      <a href="{{ asset('admin/donasi/'.$donasi->id.'/status/'.$donasi->status) }}">
      <small class="badge <?php if($donasi->status=="open") { echo 'badge-success'; }else{ echo 'badge-warning'; } ?> btn-block">
        <i class="fa <?php if($donasi->status=="open") { echo 'fa-check-circle'; }else{ echo 'fa-times'; } ?>"></i> <?php echo $donasi->status ?></small>
      </a>
    </td>
    <td>
      <?php echo $donasi->nama ?>
    </td>
    <td>
      <div class="btn-group">
        <a href="{{ asset('donasi/read/'.$donasi->slug_donasi) }}" 
        class="btn btn-success btn-sm" target="_blank"><i class="fa fa-eye"></i></a>

        <a href="{{ asset('admin/donasi/edit/'.$donasi->id) }}" 
        class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

        <a href="{{ asset('admin/donasi/delete/'.$donasi->id) }}" class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt"></i></a>
      </div>
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>
</form>