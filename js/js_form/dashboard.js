$(document).ready(function(){

        
    refreshListRequest();

});

function save(){

    $("#form_editing").ajaxSubmit({
        url:base_url+"dashboard/save",
        type: 'post',
        success: function(){

            alert('Data Baru Berhasil Ditambah.', {title: 'Simpan Sukses.',titleClass: 'info', modal: true, buttons: [{id: 0, label:'OK', val: 'X'}],callback:function(){ window.setTimeout('window.location="<?php echo base_url();?>it_project"',500); }});
            window.location = base_url+'dashboard';
        },
        error: function(){

        }
    });

}

function refreshListRequest(){

	
	$.ajax({
			
		type:"POST",
		url:base_url+"dashboard/get_data",
        dataType:"json",
		success:function(data){
				
			var content_data 	= "";
			var no				= 1;

			for(i=0;i<data.length;i++){

                var edit		= "";
                var param       = "";
				
				param = JSON.stringify({
                            'id'            :data[i].id,
							'nama_pohon'	:data[i].nama_pohon,
							'tinggi_pohon'	:data[i].tinggi_pohon,
							'warna_pohon'	:data[i].warna_pohon,
							'lokasi_pohon'	:data[i].lokasi_pohon

				});


				content_data += "<tr>";				
				content_data += "<td>"+data[i].nama_pohon+"</td>";
				content_data += "<td>"+data[i].tinggi_pohon+"</td>";				
				content_data += "<td>"+data[i].warna_pohon+"</td>";
                content_data += "<td>"+data[i].lokasi_pohon+"</td>";
                content_data += "<td><a href='#' onclick='edit("+param+")'";
				content_data += "	class='btn btn-xs green'>Edit&nbsp;<i class=''></i></a></td>"
				content_data += "</tr>";

				no++;
			}
			
			if(content_data!=''){
				$('#tabel_pohon tbody').html(content_data);
			// rowTemplate: kendo.template($("#row-template").html())				
			}
		}
		});
		
}


function edit(param){

    $("#txt_nama").val();

}
