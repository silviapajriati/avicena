$(document).ready(function(){

	cetak()
 
	$('#btn_daftar').click(function(){

		if ($('#txt_nama').val() == '') {
		alert('Nama Tidak Boleh Kosong');
		$('#txt_nama').focus();
		return false;
		}
		if ($('#txt_ttl').val() == '') {
		alert('Tempat Lahir Tidak Boleh Kosong');
		$('#txt_ttl').focus();
		return false;
		}
		if ($('#txt_lahir').val() == '') {
		alert('Tanggal Lahir Tidak Boleh Kosong');
		$('#txt_lahir').focus();
		return false;
		}
		if ($('#alamat').val() == '') {
		alert('Alamat Tidak Boleh Kosong');
		$('#alamat').focus();
		return false;
		}
		if ($('#telp').val() == '') {
		alert('Nomer Telp Tidak Boleh Kosong');
		$('#telp').focus();
		return false;
		}
		if ($('#email').val() == '') {
		alert('Email Tidak Boleh Kosong');
		$('#email').focus();
		return false;
		}
		if ($('#sekolah').val() == '') {
		alert('Asal Sekolah Tidak Boleh Kosong');
		$('#sekolah').focus();
		return false;
		}
		if ($('#ayah').val() == '') {
		alert('Nama Ayah Tidak Boleh Kosong');
		$('#ayah').focus();
		return false;
		}
		if ($('#kerjaA').val() == '') {
		alert('Pekerjaan Ayah Tidak Boleh Kosong');
		$('#kerjaA').focus();
		return false;
		}
		if ($('#ibu').val() == '') {
		alert('Nama Ibu Tidak Boleh Kosong');
		$('#ibu').focus();
		return false;
		}
		if ($('#kerjaB').val() == '') {
		alert('Pekerjaan Ibu Tidak Boleh Kosong');
		$('#kerjaB').focus();
		return false;
		}
		if ($('#telpB').val() == '') {
		alert('Nomer Telp Orang Tua Tidak Boleh Kosong');
		$('#telpB').focus();
		return false;
		}

		// Validasi email
		var email = $("input#email").val(); 
	
		if (email !== "") {  // If something was entered
			if (!isValidEmailAddress(email)) {
				alert('Wrong Format Email.');
				$("#email").focus();   //focus on email field
				return false;  
			}
		} 

		function isValidEmailAddress(email) {
			var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
			return pattern.test(email);
		};
		
		// End Validasi Email

		//validasi angka

		if ($("#telp").val() != ""){
			var x = $("input#telp").val();
			var status = true;
			var list = new Array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
			for (i=0; i<=x.length-1; i++)
			{
			if (x[i] in list) cek = true;
			else cek = false;
			status = status && cek;
			}
			if (status == false){
			alert("Telp harus angka!");
			$("#telp").focus();
			return false;
			}
		}

		//end validasi angka

		$("#loading_control").show();

		$("#form_daftar").ajaxSubmit({
			url:base_url+"ppdb/save_data",
			type: 'post',
			success: function(){

				alert('Pendaftaran PPDB Online Berhasil', {title: 'Update Sukses.',titleClass: 'info', modal: true, buttons: [{id: 0, label:'OK', val: 'X'}],callback:function(){ window.setTimeout('window.location="<?php echo base_url();?>ppdb/daftar"',500); }});
				window.location = base_url + 'ppdb/daftar';
			},
			error: function(){

				$("#loading_control").hide();
			}
		});

	});


});


function on_editview(e,b){
	jQuery('#panel_edit'+b).css('height','20px');
	jQuery('#panel_edit'+b).css('display','block');
}

function off_editview(e){
	jQuery('#panel_edit'+e).css('display','none');
}

function cetak(){

	var id_gel 	= $('#hid_gel').val();
	

	$.ajax({
			
		type:"POST",
		url:base_url+"ppdb/data_cetak",
		dataType:"json",
		success:function(data){

			console.log(data);
				
			var content_data 	= "";

			for(i=0;i<data.length;i++){

				var edit		= ""; 
				var boxedit		= "";
				var param		= "";
				var requester 	= "";
				var str_link 	= "";
				
				param = JSON.stringify({
							'id'			:data[i].id,
							'no_daftar'		:data[i].no_daftar,
							'nama'			:data[i].nama,
							'jurusan'		:data[i].jurusan

				});

				content_data += "<tr id='"+data[i].id+"'  onmouseover='on_editview("+param+",this.id)'  onmouseout='off_editview(this.id)' class='odd gradeX'>";				
				content_data += "<td>"+data[i].no_daftar+"</td>";
				content_data += "<td>"+data[i].nama+"</td>";				
				content_data += "<td>"+data[i].jurusan+"</td>";
				content_data += "<td><a href='#' onclick='cetakdata("+param+")'";
				content_data += "	class='btn btn-xs green'>Cetak&nbsp;<i class=''></i></a></td>"
				content_data += "</tr>";

			}
			
			if(content_data!=''){
				$('#tabel_cetak tbody').html(content_data);
				$('#tabel_cetak').dataTable({
					"paging":   false,
					"ordering": false,
					"info":     false,
					"searching": false
				});
			}
		}
	});
}

function cetakdata(e){

	var id	= e.id;

	window.open(base_url+"ppdb/printtes/"+id);
}
