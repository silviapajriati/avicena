<script type="text/javascript">
    var base_url        = '<?php echo base_url(); ?>';

    function site_url(url){
        var bu = "<?php echo base_url(); ?>";
        url = (url)?url:"";
        return bu+url;
    }
    
</script>
<script src="<?php echo base_url(); ?>js/jquery.form.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/perhitungan.js"></script>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h5 class="panel-title"><i class="icon-book"></i> Perhitungan</h5>
  </div>
  <div class="panel-body">
    <!-- <button type="submit" class="btn btn-primary btn-sm"><i class="icon-file-plus"></i> Tambah </button> -->
    <label style="background: #000000; color: #ffffff; font-size: 15px;" class="col-md-12 control-label">DATA PROJECT</label>
    <br>
      <table class="table table-striped table-bordered table-hover" role="grid" id="tabel_hitung">
		<thead>
			<tr align="center" valign="middle">							
				<th width="1%">No</th>
				<th>No Project</th>
				<th>Kategori</th>
				<th>Deadline</th>
				<th>Jabatan</th>
				<th>Waktu</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<tr>
					<td colspan="10" align="center">
					<span class="item font-medium">
						<span aria-hidden="true" class="icon-info"></span>&nbsp;Data Doesn't Exist'
					</span>
				</td>
			</tr>
		</tbody>
	  </table>
        <br>
        <br>
        <label style="background: #000000; color: #ffffff; font-size: 15px;" class="col-md-12 control-label">NORMALISASI</label>
        <br>
      <table class="table table-striped table-bordered table-hover" role="grid" id="tabel_normalisasi">
		<thead>
			<tr align="center" valign="middle">							
				<th width="1%">No</th>
				<th>No Project</th>
				<th>Kategori</th>
				<th>Deadline</th>
				<th>Jabatan</th>
				<th>Waktu</th>
			</tr>
		</thead>
		<tbody>
			<tr>
					<td colspan="10" align="center">
					<span class="item font-medium">
						<span aria-hidden="true" class="icon-info"></span>&nbsp;Data Doesn't Exist'
					</span>
				</td>
			</tr>
		</tbody>
	   </table>
        <br>
        <br>
        <label style="background: #000000; color: #ffffff; font-size: 15px;" class="col-md-12 control-label">NORMALISASI TERBOBOT</label>
        <br>
      <table class="table table-striped table-bordered table-hover" role="grid" id="tabel_bobot">
				<thead>
					<tr align="center" valign="middle">							
						<th width="1%">No</th>
						<th>No Project</th>
						<th>Kategori</th>
						<th>Deadline</th>
						<th>Jabatan</th>
            <th>Waktu</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						 <td colspan="10" align="center">
							<span class="item font-medium">
								<span aria-hidden="true" class="icon-info"></span>&nbsp;Data Doesn't Exist'
							</span>
						</td>
					</tr>
				</tbody>
			</table>
        <br>
        <br>
        <label style="background: #000000; color: #ffffff; font-size: 15px;" class="col-md-12 control-label">MATRIK SOLUSI IDEAL</label>
        <br>
      <table class="table table-striped table-bordered table-hover" role="grid" id="tabel_matrik">
				<thead>
					<tr align="center" valign="middle">							
						<th>Attribut</th>
						<th>Kategori</th>
						<th>Deadline</th>
						<th>Jabatan</th>
            <th>Waktu</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						 <td colspan="10" align="center">
							<span