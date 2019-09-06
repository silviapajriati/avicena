$(document).ready(function(){

    $('#btn_sign_up').click(function(){

        $("#form_signin").ajaxSubmit({
			url:base_url+"login/save_user",
			type: 'post',
			success: function(){

				alert('Pendaftaran User Baru Berhasil', {title: 'Update Sukses.',titleClass: 'info', modal: true, buttons: [{id: 0, label:'OK', val: 'X'}],callback:function(){ window.setTimeout('window.location="<?php echo base_url();?>login"',500); }});
				window.location = base_url + 'login';
			},
			error: function(){

				$("#loading_control").hide();
			}
		});


    });

});
