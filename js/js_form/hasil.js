$(document).ready(function(){

    data_hasil()
    gelombang1()
    gelombang2()

});

function buildParam(){
	
	var str_param 		= '';
	var txt_no 			= $('#txt_no').val();
	var jurusan 		= $('#jurusan').val();
	var gel 			= $('#hid_gel').val();
	

	if(txt_no!=''){			

		str_param = '&no_daftar='+txt_no+
		'&gelombang='+gel;
	}

	if(jurusan!=''){
		
		if(str_param!='') str_param+='&';

		str_param += 'jurusan='+jurusan+
		'&gelombang='+gel;
	}

	
	
	return str_param;
}


function data_hasil(){

    var param 		= buildParam();

	$.ajax({
			
		type:"POST",
        url:base_url+"hasil/data_hasil",
        data:param,
		dataType:"json",
		success:function(data){

			console.log(data);
				
			var content_data 	= "";

			for(i=0;i<data.length;i++){

				var edit		= ""; 
				var param		= "";
				
				param = JSON.stringify({
							'id'			:data[i].id,
							'no_daftar'		:data[i].no_daftar,
							'nama'          :data[i].nama,
							'jurusan'		:data[i].jurusan,
							'gelombang'		:data[i].gelombang,
							'hasil'		    :data[i].hasil
                            

				});


				content_data += "<tr id='"+data[i].id+"'>";				
				content_data += "<td>"+data[i].no_daftar+"</td>";
				content_data += "<td>"+data[i].nama+"</td>";				
				content_data += "<td>"+data[i].jurusan+"</td>";
				content_data += "<td>"+data[i].gelombang+"</td>";
				content_data += "<td>"+data[i].hasil+"</td>";
				content_data += "<td><a href='#' onclick='lolos("+param+")'";
                content_data += "class='btn btn-xs green'>Lolos&nbsp;<i class=''></i></a> ";
                content_data += "<a href='#' onclick='gagal("+param+")'";
                content_data += "class='btn btn-xs red'>Gagal&nbsp;<i class=''></i></a>";
				content_data += "</td>";
				content_data += "</tr>";

			}
			
			if(content_data!=''){
				$('#tb_list tbody').html(content_data);
				$('#tb_list').dataTable({
					"paging":   false,
					"ordering": false,
					"info":     false,
					"searching": false
				});
			}
		}
	});
}

function gelombang2(){

    var param 		= buildParam();

	$.ajax({
			
		type:"POST",
        url:base_url+"hasil/gelombang2",
        data:param,
		dataType:"json",
		success:function(data){

			console.log(data);
				
			var content_data 	= "";

			for(i=0;i<data.length;i++){

				var edit		= ""; 
				var param		= "";
				
				param = JSON.stringify({
							'id'			:data[i].id,
							'no_daftar'		:data[i].no_daftar,
							'nama'          :data[i].nama,
							'jurusan'		:data[i].jurusan,
							'gelombang'	    :data[i].gelombang,
							'hasil'		    :data[i].hasil
                            

				});


				content_data += "<tr id='"+data[i].id+"'>";				
				content_data += "<td>"+data[i].no_daftar+"</td>";
				content_data += "<td>"+data[i].nama+"</td>";				
				content_data += "<td>"+data[i].jurusan+"</td>";
				content_data += "<td>"+data[i].gelombang+"</td>";
				content_data += "<td>"+data[i].hasil+"</td>";
                content_data += "<td><a href='#' onclick='cetak("+param+")'";
                content_data += "class='btn btn-xs green'>CETAK&nbsp;<i class=''></i></a></td>";
				content_data += "</td>";
				content_data += "</tr>";

			}
			
			if(content_data!=''){
				$('#gelombang2 tbody').html(content_data);
				$('#gelombang2').dataTable({
					"paging":   false,
					"ordering": false,
					"info":     false,
					"searching": false
				});
			}
		}
	});
}

function gelombang1(){

	var param 		= buildParam();
	// var gel 		= $('#hid_gel').val();

	$.ajax({
			
		type:"POST",
        url:base_url+"hasil/gelombang1",
        data:param,
		dataType:"json",
		success:function(data){

			console.log(data);
				
			var content_data 	= "";

			for(i=0;i<data.length;i++){

				var edit		= ""; 
				var param		= "";
				
				param = JSON.stringify({
							'id'			:data[i].id,
							'no_daftar'		:data[i].no_daftar,
							'nama'          :data[i].nama,
							'jurusan'		:data[i].jurusan,
							'gelombang'	    :data[i].gelombang,
							'hasil'		    :data[i].hasil
                            

				});


				content_data += "<tr id='"+data[i].id+"'>";				
				content_data += "<td>"+data[i].no_daftar+"</td>";
				content_data += "<td>"+data[i].nama+"</td>";				
				content_data += "<td>"+data[i].jurusan+"</td>";
				content_data += "<td>"+data[i].gelombang+"</td>";
				content_data += "<td>"+data[i].hasil+"</td>";
                content_data += "<td><a href='#' onclick='cetak("+param+")'";
                content_data += "class='btn btn-xs green'>CETAK&nbsp;<i class=''></i></a></td>";
				content_data += "</td>";
				content_data += "</tr>";

			}
			
			if(content_data!=''){
				$('#gelombang1 tbody').html(content_data);
				$('#gelombang1').dataTable({
					"paging":   false,
					"ordering": false,
					"info":     false,
					"searching": false
				});
			}
		}
	});
}


function modalSearch() {

	$('#modal_search').modal('show');
    
}

function searchData(){    

    var $tab        = $('.tab-content .tab-pane.active');
    var acticeId    = $tab.attr('id');

    if(activeId='update'){

        $('#tb_list').DataTable().destroy();
        $('#tb_list tbody').html('');	
    
        data_hasil();	
        
    }

    if(activeId='gel_1'){

        $('#gelombang1').DataTable().destroy();
        $('#gelombang1 tbody').html('');	
    
        gelombang1();

    }

    if(activeId='gel_2'){

        $('#gelombang2').DataTable().destroy();
        $('#gelombang2 tbody').html('');	
    
        gelombang2();

    }

	$('#modal_search').modal('hide');
	
}

function lolos(e){

    var str_data	= 'id='+e.id;

    $.ajax({
			
		type:"POST",
		url:base_url+"hasil/lolos",
		dataType:"html",
		data:str_data,
		success:function(data){

            alert('Berhasil Diupdate');
            
            $('#tb_list').DataTable().destroy();
            $('#tb_list tbody').html('');	

            data_hasil();
		}
	});
}


function gagal(e){

    var str_data	= 'id='+e.id;

    $.ajax({
			
		type:"POST",
		url:base_url+"hasil/gagal",
		dataType:"html",
		data:str_data,
		success:function(data){

            alert('Berhasil Diupdate');
            
            $('#tb_list').DataTable().destroy();
            $('#tb_list tbody').html('');	

            data_hasil();
            
		}
	});
}

function excel(){
	
    var data 	= buildParam();
    

    window.location.href = base_url+"hasil/to_excel?"+data;
    // window.location.href = base_url+"hasil/to_excel/"+data;
}

function cetak(e){

	var id	= e.id;

	window.open(base_url+"hasil/printkrs/"+id);
}