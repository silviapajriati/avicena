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
<script src="<?php echo base_url(); ?>js/jquery.form.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/js_form/jadwal.js"></script>
<input type="hidden" id="hid_privilege" value="<?php echo $priv;?>" />
<div class="portlet-body form">
    <div class="container">
        <div class="tabbable-line">
            <ul class="nav nav-tabs ">
                <li class="active">
                    <a aria-expanded="true" href="#jadwal" data-toggle="tab">
                    Jadwal Pendaftaran </a>
                </li>
                <li class="">
                    <a aria-expanded="true" href="#kuota" data-toggle="tab">
                    Kuota Pendaftaran </a>
                </li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="jadwal">
                    <div class="from_dotcs" style="width: 1000px;">
                        <label style="background: #555; color: #ffffff; font-size: 20px;" class="col-md-12 control-label">JADWAL PENDAFTARAN</label>
                        <table class="table table-striped table-bordered table-hover" role="grid" id="tabel_jadwal">
                            <thead>
                                <tr align="center" valign="middle">		
                                    <th>Gelombang</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Tes Tertulis</th>
                                    <th>Hasil Seleksi</th>
                                    <th>Daftar Ulang</th>
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
                    </div>
                </div>
                <div class="tab-pane" id="kuota">
                    <div class="from_dotcs" style="width: 1000px;">
                        <label style="background: #555; color: #ffffff; font-size: 20px;" class="col-md-12 control-label">KUOTA PENDAFTARAN</label>
                    <!-- <button type="button" data-target="modal_data_kuota" class="btn default">Tambah Jurusan</button> -->
                        <table class="table table-striped table-bordered table-hover" role="grid" id="tabel_kuota">
                            <thead>
                                <tr align="center" valign="middle">							
                                    <th>Jurusan</th>
                                    <th>Jumlah Kelas</th>
                                    <th>Jumlah Siswa/i</th>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal edit -->
<div id="modul_edit_data" class="modal fade bs-modal-lg" tabindex="-1" aria-hidden="true">
	 <div class="modal-dialog">     
		<div class="portlet light bg-inverse">
			<div class="portlet-title">
                <div class="caption tight-bottom">
                    <i class="icon-share-alt font-grey"></i>
                    <span class="caption-subject font-black bold" id="head_title"></span>
                    
                </div>
                <div class="actions tight-bottom    ">
                    <a href="#" data-dismiss="modal"><i class="icon-close"></i></a>
                </div>
            </div>
			<div class="portlet-body form">
				<div id="div_alert"></div>
					<form action="#" class="form-horizontal" id="form_editing">
						<div class="form-body">
							<input type="text" class="hidden" name="txt_id" id="txt_id" />
							<div class="form-group tight-bottom">
								<label class="col-md-3 control-label">Gelombang</label>
								<div class="col-md-4">	
									<input type="text" class="form-control input-sm" placeholder="Gelombang" id="txt_gelombang" name="txt_gelombang"/>
								</div>
							</div>
							<div class="form-group tight-bottom">
								<label class="col-md-3 control-label">Tanggal Mulai</label>
								<div class="col-md-4">
									<div class="input-group input-small date date-picker" data-date-format="dd-mm-yyyy">
										<input type="text" id="txt_start" name="txt_start" class="form-control input-sm"  placeholder="Date" value="">
										<span class="input-group-btn">
										<button class="btn default input-sm" type="button"><i class="fa fa-calendar"></i></button>
										</span>
									</div>
								</div>							
							</div>
                            <div class="form-group tight-bottom">
								<label class="col-md-3 control-label">Tanggal Selesai</label>
								<div class="col-md-4">
									<div class="input-group input-small date date-picker" data-date-format="dd-mm-yyyy">
										<input type="text" id="txt_end" name="txt_end" class="form-control input-sm"  placeholder="Date" value="">
										<span class="input-group-btn">
										<button class="btn default input-sm" type="button"><i class="fa fa-calendar"></i></button>
										</span>
									</div>
								</div>							
							</div>
                            <div class="form-group tight-bottom">
								<label class="col-md-3 control-label">Tanggal Tes</label>
								<div class="col-md-4">
									<div class="input-group input-small date date-picker" data-date-format="dd-mm-yyyy">
										<input type="text" id="txt_tes" name="txt_tes" class="form-control input-sm"  placeholder="Date" value="">
										<span class="input-group-btn">
										<button class="btn default input-sm" type="button"><i class="fa fa-calendar"></i></button>
										</span>
									</div>
								</div>							
							</div>
                            <div class="form-group tight-bottom">
								<label class="col-md-3 control-label">Hasil Seleksi</label>
								<div class="col-md-4">
									<div class="input-group input-small date date-picker" data-date-format="dd-mm-yyyy">
										<input type="text" id="txt_hasil" name="txt_hasil" class="form-control input-sm"  placeholder="Date" value="">
										<span class="input-group-btn">
										<button class="btn default input-sm" type="button"><i class="fa fa-calendar"></i></button>
										</span>
									</div>
								</div>							
							</div>
                            <div class="form-group tight-bottom">
								<label class="col-md-3 control-label">Daftar Ulang</label>
								<div class="col-md-4">
									<div class="input-group input-small date date-picker" data-date-format="dd-mm-yyyy">
										<input type="text" id="txt_daftar" name="txt_daftar" class="form-control input-sm"  placeholder="Date" value="">
										<span class="input-group-btn">
										<button class="btn default input-sm" type="button"><i class="fa fa-calendar"></i></button>
										</span>
									</div>
								</div>							
							</div>
						</div>
						<div class="row">
								<div class="col-md-offset-4 col-md-4">
									<div id="loading_control" style="display:none;text-align:center">
										<img class="col-md-offset-4" src="<?php echo base_url(); ?>images/pre_loader.gif" /><br/>
										<span>Please Wait, Updating Data....</span>
									</div>
									<div id="action_control">
										<button type="button" class="btn blue" id="btn_update">Update</button>
										<button type="button" data-dismiss="modal" class="btn default">Cancel</button>
									</div>                                
								</div>
							</div>
					</form>			
			</div>
		</div>
	</div>
</div>
<!-- End Modal edit Request -->

<!-- Modal edit Kuota-->
<div id="modul_edit_kuota" class="modal fade bs-modal-lg" tabindex="-1" aria-hidden="true">
	 <div class="modal-dialog">     
		<div class="portlet light bg-inverse">
			<div class="portlet-title">
                <div class="caption tight-bottom">
                    <i class="icon-share-alt font-grey"></i>
                    <span class="caption-subject font-black bold" id="head_title2"></span>
                    
                </div>
                <div class="actions tight-bottom    ">
                    <a href="#" data-dismiss="modal"><i class="icon-close"></i></a>
                </div>
            </div>
			<div class="portlet-body form">
				<div id="div_alert"></div>
					<form action="#" class="form-horizontal" id="form_kuota">
						<div class="form-body">
							<input type="text" class="hidden" name="id_kuota" id="id_kuota" />
							<div class="form-group tight-bottom">
								<label class="col-md-3 control-label">Jurusan</label>
								<div class="col-md-4">	
									<input type="text" class="form-control input-sm" placeholder="Jurusan" id="txt_jurusan" name="txt_jurusan"/>
								</div>
							</div>
                            <div class="form-group tight-bottom">
								<label class="col-md-3 control-label">Kelas</label>
								<div class="col-md-4">	
									<input type="text" class="form-control input-sm" placeholder="Kelas" id="txt_kelas" name="txt_kelas"/>
								</div>
							</div>
                            <div class="form-group tight-bottom">
								<label class="col-md-3 control-label">Siswa</label>
								<div class="col-md-4">	
									<input type="text" class="form-control input-sm" placeholder="Siswa" id="txt_siswa" name="txt_siswa"/>
								</div>
							</div>
						</div>
						<div class="row">
								<div class="col-md-offset-4 col-md-4">
									<div id="loading_control" style="display:none;text-align:center">
										<img class="col-md-offset-4" src="<?php echo base_url(); ?>images/pre_loader.gif" /><br/>
										<span>Please Wait, Updating Data....</span>
									</div>
									<div id="action_control">
										<button type="button" class="btn blue" id="btn_updatekuota">Update</button>
										<button type="button" data-dismiss="modal" class="btn default">Cancel</button>
									</div>                                
								</div>
							</div>
					</form>			
			</div>
		</div>
	</div>
</div>
<!-- End Modal edit Request -->
