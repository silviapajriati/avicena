$(document).ready(function(){

	jadwal()
	kuota()
 
	$('#btn_update').click(function(){

		var mulai 	= $('#txt_start').val();
		var end		= $('#txt_end').val();
		var tes		= $('#txt_tes').val();
		var hasil	= $('#txt_hasil').val();

		if (mulai>end){
			alert('Tanggal Mulai tidak boleh lebih besar dari Tanggal Selesai');
			$('#txt_start').focus();
			return false;
		}
		if (end>tes){
			alert('Tanggal Selesai tidak boleh lebih besar dari Tanggal Tes');
			$('#txt_end').focus();
			return false;
		}
		if(tes>hasil){
			alert('Tanggal Tes tidak boleh lebih besar dari Tanggal Hasil');
			$('#txt_hasil').focus();
			return false;
		}

		$("#loading_control").show();

		$("#form_editing").ajaxSubmit({
			url:base_url+"ppdb/update",
			type: 'post',
			success: function(){

				alert('Data Jadwal Berhasil Diupdate.', {title: 'Update Sukses.',titleClass: 'info', modal: true, buttons: [{id: 0, label:'OK', val: 'X'}],callback:function(){ window.setTimeout('window.location="<?php echo base_url();?>ppdb/jadwal"',500); }});
				window.location = base_url + 'ppdb/jadwal';
			},
			error: function(){

				$("#loading_control").hide();
			}
		});

	});

	$('#btn_updatekuota').click(function(){

		$("#loading_control").show();

		$("#form_kuota").ajaxSubmit({
			url:base_url+"ppdb/updatekuota",
			type: 'post',
			success: function(){

				alert('Data Kuota Berhasil Diupdate.', {title: 'Update Sukses.',titleClass: 'info', modal: true, buttons: [{id: 0, label:'OK', val: 'X'}],callback:function(){ window.setTimeout('window.location="<?php echo base_url();?>ppdb/jadwal"',500); }});
				window.location = base_url + 'ppdb/jadwal';
			},
			error: function(){

				$("#loading_control").hide();
			}
		});

	});
	

});

function jadwal(){

	var privilege 	= $('#hid_privilege').val();

	$.ajax({
			
		type:"POST",
		url:base_url+"ppdb/data_jadwal",
		dataType:"json",
		success:function(data){

			// console.log(data);
				
			var content_data 	= "";

			for(i=0;i<data.length;i++){

				var edit		= ""; 
				var boxedit		= "";
				var param		= "";
				var requester 	= "";
				var str_link 	= "";
				
				param = JSON.stringify({
							'id'			:data[i].id,
							'gelombang'		:data[i].gelombang,
							'tgl_start'		:data[i].tgl_start,
							'tgl_end'		:data[i].tgl_end,
							'tgl_tes'		:data[i].tgl_tes,
							'tgl_hasil'		:data[i].tgl_hasil,
							'tgl_daftar'	:data[i].tgl_daftar

				});

				if(privilege=='1'){

					boxedit = "<div id='panel_edit" + data[i].id + "' style='display:none'><a href='javascript:;' onclick='return viewedit(" + param + ")' >Edit </a></div>";
					requester = data[i].id;
				}

				content_data += "<tr id='"+data[i].id+"'  onmouseover='on_editview("+param+",this.id)'  onmouseout='off_editview(this.id)' class='odd gradeX'>";				
				content_data += "<td>"+data[i].gelombang+boxedit+"</td>";
				content_data += "<td>"+data[i].tgl_start+"</td>";				
				content_data += "<td>"+data[i].tgl_end+"</td>";
				content_data += "<td>"+data[i].tgl_tes+"</td>";
				content_data += "<td>"+data[i].tgl_hasil+"</td>";
				content_data += "<td>"+data[i].tgl_daftar+"</td>";
				content_data += "</tr>";

			}
			
			if(content_data!=''){
				$('#tabel_jadwal tbody').html(content_data);
				$('#tabel_jadwal').dataTable({
					"paging":   false,
					"ordering": false,
					"info":     false,
					"searching": false
				});
			}
		}
		});
}

function kuota(){

	var privilege 	= $('#hid_privilege').val();

	$.ajax({
			
		type:"POST",
		url:base_url+"ppdb/data_kuota",
		dataType:"json",
		success:function(data){

			// console.log(data);
				
			var content_data 	= "";

			for(i=0;i<data.length;i++){

				var edit		= ""; 
				var boxedit		= "";
				var param		= "";
				var requester 	= "";
				var str_link 	= "";
				
				param = JSON.stringify({
							'id'			:data[i].id,
							'jurusan'		:data[i].jurusan,
							'kelas'			:data[i].kelas,
							'siswa'			:data[i].siswa,

				});

				if(privilege=='1'){

					boxedit = "<div id='panel_edit" + data[i].id + "' style='display:none'><a href='javascript:;' onclick='return vieweditkuota(" + param + ")' >Edit </a></div>";
					requester = data[i].id;
				}

				content_data += "<tr id='"+data[i].id+"'  onmouseover='on_editview("+param+",this.id)'  onmouseout='off_editview(this.id)' class='odd gradeX'>";				
				content_data += "<td>"+data[i].jurusan+boxedit+"</td>";
				content_data += "<td>"+data[i].kelas+"</td>";				
				content_data += "<td>"+data[i].siswa+"</td>";
				content_data += "</tr>";

			}
			
			if(content_data!=''){
				$('#tabel_kuota tbody').html(content_data);
				$('#tabel_kuota').dataTable({
					"paging":   false,
					"ordering": false,
					"info":     false,
					"searching": false
				});
			}
		}
		});
}

function on_editview(e,b){
	jQuery('#panel_edit'+b).css('height','20px');
	jQuery('#panel_edit'+b).css('display','block');
}

function off_editview(e){
	jQuery('#panel_edit'+e).css('display','none');
}

function viewedit(e){

    $('#head_title').text("Update Data Jadwal");
	
	    var params="";
		params = JSON.stringify({
			'id':e.id,
			
		});
	
		var kirim = 'id='+e.id;

		$('#txt_id').val(e.id);
		$('#txt_gelombang').val(e.gelombang);
		$('#txt_start').val(e.tgl_start);
		$('#txt_end').val(e.tgl_end);
		$('#txt_tes').val(e.tgl_tes);
		$('#txt_hasil').val(e.tgl_hasil);
		$('#txt_daftar').val(e.tgl_daftar);
	 
	$('#modul_edit_data').modal('show');
}

function vieweditkuota(e){

    $('#head_title2').text("Update Data Kuota");
	
	    var params="";
		params = JSON.stringify({
			'id':e.id,
			
		});
	
		var kirim = 'id='+e.id;

		$('#id_kuota').val(e.id);
		$('#txt_jurusan').val(e.jurusan);
		$('#txt_kelas').val(e.kelas);
		$('#txt_siswa').val(e.siswa);
	 
	$('#modul_edit_kuota').modal('show');
}
