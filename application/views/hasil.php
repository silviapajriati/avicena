<style style="css">
body {
  font-family: Georgia, "Times New Roman", Times, serif;
  color: #555;
}
.from_dotcs{
  border:2px dotted #5c5353;
  padding: 5px 5px 5px 5px;
  margin-top:10px;
}
@media (min-width: 1200px) {
  .container {
    width: 970px;
    margin-top: 20px;
    margin-bottom: 50px;
  }
}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/plugins/icheck/skins/all.css"/>
<script src="<?php echo base_url(); ?>js/jquery.form.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/icheck/icheck.min.js"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/plugin/bootstrap-select.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.form.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/js_form/hasil.js"></script>
<input type="hidden" id="hid_privilege" value="<?php echo $priv;?>" />
<?php
	$gel = isset($gelombang)?$gelombang:'';

?>
<input type="hidden" id="hid_gel" value="<?php echo $gel;?>" />
<div class="portlet-body form">
    <div class="container">
        <div class="tabbable-line">
            <ul class="nav nav-tabs " id="mytab">
                <li class="active" id="first">
                    <a aria-expanded="true" href="#gel_1" data-toggle="tab">
                    Pengumuman Hasil </a>
                </li>
				<!-- <li class="" id="second">
                    <a aria-expanded="true" href="#gel_2" data-toggle="tab">
                    Gelombang II </a>
                </li> -->
				<?php
				if($priv==1){
					echo'<li class="" id="three">
						<a aria-expanded="true" href="#update" data-toggle="tab">
						Update Hasil </a>
					</li>';
				}
				?>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="gel_1">
                    <div class="from_dotcs" style="width: 1000px;">
                        <label style="background: #555; color: #ffffff; font-size: 20px;" class="col-md-12 control-label">HASIL SELEKSI GELOMBANG I</label>
						<?php
							$tgl = isset($tgl_hasil)?$tgl_hasil:'';
						?>
						<input type="hidden" id="hid_tgl" value="<?php echo $tgl;?>" />
						<?php if($tgl<=date('Y-m-d')){
							echo'
								<p>
								<p>
								<table class="table table-striped table-bordered table-hover" role="grid" id="gelombang1">
								<thead>
									<tr align="center" valign="middle">		
										<th>No Daftar</th>
										<th>Nama</th>
										<th>Jurusan</th>
										<th>Gelombang</th>
										<th>Hasil</th>
										<th>Act</th>
									</tr>
								</thead>
								<tbody>
								<tr>
									<td colspan="10" align="center">
										<span class="item font-medium">
											<span aria-hidden="true" class="icon-info"></span>&nbsp;Data Belum Ada
										</span>
									</td>
								</tr>
								</tbody>
							</table>';
						}else{
							echo'Data Hasil Belum Keluar';
						}
						?>
                    </div>
                </div>
				<div class="tab-pane" id="gel_2">
					<div class="from_dotcs" style="width: 1000px;">
                        <label style="background: #555; color: #ffffff; font-size: 20px;" class="col-md-12 control-label">HASIL SELEKSI GELOMBANG II</label>
						<?php if($tgl_hasil2<=date('Y-m-d')){
							echo'<button type="button" class="btn default" onclick="modalSearch();"><i class="fa fa-search"></i>&nbsp;Search</button>
							<button type="button" class="btn default" onclick="excel();"><i class="fa fa-download"></i>&nbsp;Download</button>
							<p>
							<p>
							<table class="table table-striped table-bordered table-hover" role="grid" id="gelombang2">
							<thead>
								<tr align="center" valign="middle">		
									<th>No Daftar</th>
									<th>Nama</th>
									<th>Jurusan</th>
									<th>Gelombang</th>
									<th>Hasil</th>
									<th>Act</th>
								</tr>
							</thead>
							<tbody>
							<tr>
								<td colspan="10" align="center">
									<span class="item font-medium">
										<span aria-hidden="true" class="icon-info"></span>&nbsp;Data Belum Ada
									</span>
								</td>
							</tr>
							</tbody>
						</table>';
						}else{
							echo'Data Hasil Belum Keluar';
						}
						?>
					</div>
				</div>
                <div class="tab-pane" id="update">
                    <div class="from_dotcs" style="width: 1000px;">
                        <label style="background: #555; color: #ffffff; font-size: 20px;" class="col-md-12 control-label">UPDATE HASIL</label>
						<button type="button" class="btn default" onclick="modalSearch();"><i class="fa fa-search"></i>&nbsp;Search</button>
						<button type="button" class="btn default" onclick="excel();"><i class="fa fa-download"></i>&nbsp;Download</button>
						<p>
						<p>
						<table class="table table-striped table-bordered table-hover nowrap" id="tb_list" width="100%">     
							<thead>
								<tr role="row" class="heading">
									<th>No Daftar</th>
									<th>Nama Siswa</th>
									<th>Jurusan</th>
									<th>Gelombang</th>
									<th>Status</th>
									<th>Act</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Search Data -->
<div id="modal_search" class="modal fade bs-modal-lg" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog"> 
        <div class="portlet light bg-inverse">
            <div class="portlet-title">
                <div class="caption tight-bottom">
                    <i class="glyphicon glyphicon-search font-black"></i>
                    <span class="caption-subject font-black bold" id="span_title">Search Data</span>
                </div>
                <div class="actions tight-bottom">
                    <a href="#" data-dismiss="modal"><i class="icon-close"></i></a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="#" class="form-horizontal" id="form_search">
                    <!-- row -->
						<div class="form-group tight-bottom">                                
							<label class="col-md-3 control-label">No Daftar</label>
							<div class="col-md-7">
								<input type="text" class="form-control" placeholder="No Daftar"
									name="txt_no" id="txt_no" maxlength="15" />                                             
							</div>                              
						</div>
						<div class="form-group tight-bottom">                                
							<label class="col-md-3 control-label">No Daftar</label>
							<div class="col-md-7">
								<select id="jurusan" name="jurusan" class="form-control input-sm">
										<option value="0">-Jurusan-</option>								      
										<option value="1">Multimedia</option>
										<option value="2">Admnistrasi Perkantoran</option>
										<option value="3">Akuntansi</option>
										<option value="4">Teknik Kendaraan Ringan (TKR)</option>
										<option value="5">Teknik Sepeda Motor (TSM)</option>
										<option value="6">Teknik Komputer dan Jaringan (TKJ)</option>
								</select>
							</div>                             
						</div>
                     	<div class="form-actions tight-bottom">
                        <div class="row">
                            <div style="text-align:right;padding-right:15px;">
                                <button type="button" class="btn blue" onclick="searchData();">Search Data</button>
                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                            </div>
                        </div>
                    </div>                    
                </form>
                <!-- END FORM-->
            </div>
        </div>
    </div>
</div>
<!-- End Modal Search Data -->
