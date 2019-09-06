<?php
	$id_gel = isset($id)?$id:'';

?>
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
<script type="text/javascript" src="<?php echo base_url() ?>js/js_form/daftar.js"></script>
<input type="hidden" id="hid_privilege" value="<?php echo $priv;?>" />
<div class="portlet-body form">
    <div class="container">
        <div class="tabbable-line">
            <ul class="nav nav-tabs ">
                <li class="active">
                    <a aria-expanded="true" href="#daftar" data-toggle="tab">
                    Daftar </a>
                </li>
                <li class="">
                    <a aria-expanded="true" href="#cetak" data-toggle="tab">
                    Cetak Kartu Tes</a>
                </li>

            </ul>

            <div class="tab-content">
			<?php  if (isset($tgl_start)?$tgl_start:''!=null){ ?>
                <div class="tab-pane active" id="daftar">
                    <div class="from_dotcs" style="width: 1000px;">
                        <label style="background: #555; color: #ffffff; font-size: 20px;" class="col-md-12 control-label">
							PENERIMAAN SISWA BARU TAHUN <?php echo date("Y"); ?>
						</label>
							<div class="portlet-body form">
								<div id="div_alert"></div>
									<form action="#" class="form-horizontal" id="form_daftar">
										<div class="form-body">
											<input type="hidden" name="hid_gel" id="hid_gel" value="<?php echo $id_gel?>" />
											<input type="text" class="hidden" name="txt_id" id="txt_id" />
											<div class="form-group tight-bottom">
												<label class="col-md-3 control-label">No Daftar</label>
												<div class="col-md-5">	
													<input type="text" class="form-control input-sm" placeholder="No Daftar" id="no_daftar" name="no_daftar" readonly/>
												</div>
											</div>
											<div class="form-group tight-bottom">
												<label class="col-md-3 control-label">Nama</label>
												<div class="col-md-5">	
													<input type="text" class="form-control input-sm" placeholder="Nama" id="txt_nama" name="txt_nama"/>
												</div>
											</div>
											<div class="form-group tight-bottom">
												<label class="col-md-3 control-label">Jurusan</label>
												<div class="col-md-5">	
												<select id="jurusan" name="jurusan" class="form-control input-sm">
														<option value="1">Multimedia</option>								      
														<option value="2">Administrasi Perkantoran</option>
														<option value="3">Akuntansi</option>
														<option value="4">Teknik Kendaraan Ringan (TKR)</option>
														<option value="5">Teknik Sepeda Motor (TSM)</option>
														<option value="6">Teknik Komputer dan Jaringan (TKJ)</option>
												</select>		
												</div>
											</div>
											<div class="form-group tight-bottom">
												<label class="col-md-3 control-label">Tempat Lahir</label>
												<div class="col-md-5">	
													<input type="text" class="form-control input-sm" placeholder="Tempat Lahir" id="txt_ttl" name="txt_ttl"/>
												</div>
											</div>
											<div class="form-group tight-bottom">
												<label class="col-md-3 control-label">Tanggal Lahir</label>
												<div class="col-md-5">
													<div class="input-group input-small date date-picker" data-date-format="yyyy-mm-dd">
														<input type="text" id="txt_lahir" name="txt_lahir" class="form-control input-sm"  placeholder="Date" value="">
														<span class="input-group-btn">
														<button class="btn default input-sm" type="button"><i class="fa fa-calendar"></i></button>
														</span>
													</div>
												</div>							
											</div>
											<div class="form-group tight-bottom">
												<label class="col-md-3 control-label">Jenis Kelamin</label>
												<div class="col-md-5">	
												<select id="gender" name="gender" class="form-control input-sm">
														<option value="L">Laki-Laki</option>								      
														<option value="P">Perempuan</option>
												</select>		
												</div>
											</div>
											<div class="form-group tight-bottom">
												<label class="col-md-3 control-label">Alamat</label>
												<div class="col-sm-5">
													<textarea class="form-control" rows="3" placeholder="Alamat" name="alamat" id="alamat" name="IT_sugestion" value=""></textarea>
												</div>
											</div>
											<div class="form-group tight-bottom">
												<label class="col-md-3 control-label">Telp</label>
												<div class="col-md-5">	
													<input type="text" class="form-control input-sm" placeholder="Telp" id="telp" name="telp"/>
												</div>
											</div>
											<div class="form-group tight-bottom">
												<label class="col-md-3 control-label">Email</label>
												<div class="col-md-5">	
													<input type="text" class="form-control input-sm" placeholder="Email" id="email" name="email"/>
												</div>
											</div>
											<div class="form-group tight-bottom">
												<label class="col-md-3 control-label">Agama</label>
												<div class="col-md-5">	
												<select id="agama" name="agama" class="form-control input-sm">
														<option value="Islam">Islam</option>								      
														<option value="Kristen">Kristen</option>
														<option value="Katolik">Katolik</option>
														<option value="Hindu">Hindu</option>
														<option value="Budha">Budha</option>
												</select>		
												</div>
											</div>
											<div class="form-group tight-bottom">
												<label class="col-md-3 control-label">Asal Sekolah</label>
												<div class="col-md-5">	
													<input type="text" class="form-control input-sm" placeholder="Asal Sekolah" id="sekolah" name="sekolah"/>
												</div>
											</div>
											<div class="form-group tight-bottom">
												<label class="col-md-3 control-label">Nama Ayah</label>
												<div class="col-md-5">	
													<input type="text" class="form-control input-sm" placeholder="Nama Ayah" id="ayah" name="ayah"/>
												</div>
											</div>
											<div class="form-group tight-bottom">
												<label class="col-md-3 control-label">Pekerjaan Ayah</label>
												<div class="col-md-5">	
													<input type="text" class="form-control input-sm" placeholder="Pekerjaan Ayah" id="kerjaA" name="kerjaA"/>
												</div>
											</div>
											<div class="form-group tight-bottom">
												<label class="col-md-3 control-label">Nama Ibu</label>
												<div class="col-md-5">	
													<input type="text" class="form-control input-sm" placeholder="Nama Ibu" id="ibu" name="ibu"/>
												</div>
											</div>
											<div class="form-group tight-bottom">
												<label class="col-md-3 control-label">Pekerjaan Ibu</label>
												<div class="col-md-5">	
													<input type="text" class="form-control input-sm" placeholder="Pekerjaan Ibu" id="kerjaB" name="kerjaB"/>
												</div>
											</div>
											<div class="form-group tight-bottom">
												<label class="col-md-3 control-label">Telp Orang Tua</label>
												<div class="col-md-5">	
													<input type="text" class="form-control input-sm" placeholder="Telp Orang Tua" id="telpB" name="telpB"/>
												</div>
											</div>
										</div>
										<div class="row">
												<div class="col-md-offset-4 col-md-4">
													<div id="loading_control" style="display:none;text-align:center">
														<img class="col-md-offset-4" src="<?php echo base_url(); ?>images/pre_loader.gif" /><br/>
														<span>Please Wait, Saving Data....</span>
													</div>
													<div id="action_control">
														<button type="button" class="btn blue" id="btn_daftar">Daftar</button>
														<button type="button" data-dismiss="modal" class="btn default">Cancel</button>
													</div>                                
												</div>
											</div>
									</form>			
							</div>
                    </div>
                </div>
                <div class="tab-pane" id="cetak">
                    <div class="from_dotcs" style="width: 1000px;">
                    	<label style="background: #555; color: #ffffff; font-size: 20px;" class="col-md-12 control-label">CETAK KARTU</label>
						<table class="table table-striped table-bordered table-hover" role="grid" id="tabel_cetak">
							<thead>
								<tr align="center" valign="middle">							
									<th>No Daftar</th>
									<th>Nama</th>
									<th>Jurusan</th>
									<th>Act</th>
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
					<div class="from_dotcs" style="width: 1000px;">
						<label style="background: #555; color: #ffffff; font-size: 20px;" class="col-md-12 control-label">SYARAT DAN KETENTUAN</label>
						<p> 1. Harap Memakai Pakaian Kemeja Putih dan Celana(Laki-Laki)/Rok(Perempuan) Panjang Berwarna Hitam.
						<p> 2. Membawa Alat Tulis.
						<p> 3. Membawa Kartu Tes yang Sudah Dicetak.
						<p> 4. Hadir 30 Menit Lebih Awal Sebelum Ujian Berlangsung.
					</div>
                </div>
			<?php }else{ ?>
				Pendaftaran Belum Dibuka!!! Cek <a href="<?php echo site_url('ppdb/jadwal'); ?>">Jadwal</a>
			<?php } ?>
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
									<div class="input-group input-small date date-picker" data-date-format="yyyy-mm-dd">
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
									<div class="input-group input-small date date-picker" data-date-format="yyyy-mm-dd">
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
									<div class="input-group input-small date date-picker" data-date-format="yyyy-mm-dd">
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
									<div class="input-group input-small date date-picker" data-date-format="yyyy-mm-dd">
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
									<div class="input-group input-small date date-picker" data-date-format="yyyy-mm-dd">
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
					