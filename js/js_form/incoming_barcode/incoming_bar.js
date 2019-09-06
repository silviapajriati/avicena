$(document).ready(function(){

	fill_grid();	

	$("#btn_add_popup").bind("click", function(){

		$("#add_window").data("kendoWindow").center().open();	
	});

	$("#btn_search_popoup").bind("click", function(){

		$("#search_window").data("kendoWindow").center().open();				
	});

	$("#btn_lookup").click(function(){

		if($("#txt_fbatch").val()!="" && $("#dtp_findate").val() !=""){

			LookUpBatch();
			return false;
		}
		else{

			new Messi('Mohon isi Batch No. & In Date terlebih dahulu.', {title: 'Invalid.',titleClass: 'anim warning', modal: true});
			return false;
		}
	});

	$("#btn_add_save").click(function(){

		if($("#d_item_no").text()==""){

			new Messi('Detail Batch No. tidak valid.', {title: 'Invalid.',titleClass: 'anim warning', modal: true});
			return false;	
		}

		SaveBatch();
	});

	$("#btn_search_act").click(function(){

		var param = JSON.stringify($("#form_search").serializeArray());
		
		$("#t-grid").kendoGrid("destroy");				
		fill_grid(param);

		$("#search_window").data("kendoWindow").close();
	});
	

	$("#add_window").kendoWindow({

		height:310,
		width: 370,
		modal: true,
		resizable: true,
		title: "Input Data"
	});

	$("#search_window").kendoWindow({

		height:170,
		width: 370,
		modal: true,
		resizable: true,
		title: "Search Data"
	});

	$("#dtp_findate").kendoDatePicker({
			
		format: "yyyy/MM/dd"
		
	}).data("kendoDatePicker");

	//datepicker search
	$("#txt_sindate1").kendoDatePicker({

		format: "yyyy/MM/dd",
        change: onIndate1Change
    });

    $("#txt_sindate2").kendoDatePicker({
		
		format: "yyyy/MM/dd",
        change: onIndate2Change
    });

	function onIndate1Change(){

		var date1 = $("#txt_sindate1").data("kendoDatePicker").value();

    	$("#txt_sindate2").data("kendoDatePicker").value(date1);    	
    	$("input[name='hid_date1']").val(kendo.toString(date1,'yyyy/MM/dd'));
    	$("input[name='hid_date2']").val(kendo.toString(date1,'yyyy/MM/dd'));
    }

    function onIndate2Change(){

    	var date = $("#txt_sindate2").data("kendoDatePicker").value();

    	$("input[name='hid_date2']").val(kendo.toString(date,'yyyy/MM/dd'));        
    }
    //end datepicker search
});

function fill_grid(param){

	if(typeof param!= "undefined"){

		var json_param = JSON.parse(param);	
	}
	else{

		var json_param = null;
	}	

	var products = $.ajax({
		type:"POST",
		data:json_param,
		typeData:"JSON",
		url:base_url+"incoming_bar/get_list_data",
		async:false						
	}).responseText;
	
	products = (products != '[[]]'?$.parseJSON(products):[]);

	var grid = $("#t-grid").kendoGrid({
		toolbar: kendo.template($("#template_st").html()),
		dataSource: {
			data: products,
			pageSize: 20,
			serverFiltering: true
		},
		pageable: {
			refresh: true,
			pageSizes: true
		},
		height: 460,
		groupable: false,
		sortable: true,
		resizable: true,
		editable:false,
		columns:[
			{ field: "id", title: "Id", width:10, hidden:true},
			//{ field: "no", title: "No.", width: 10 },
			{ field: "batch", title: "Purbatch", width: 25 },
			{ field: "in_date", title: "In Date", width:25},
			{ field: "item_no", title: "Item No", width:30},
			{ field: "item_name", title: "Item Specs", width:70},
			{ field: "color", title: "Color", width:70},
			{ field: "in_qty", title: "Qty In", width:15},
			{ field: "psheet", title: "Psheet", width:20},
			{ field: "supplier", title: "Supplier", width:30},
			{ field: "country", title: "Country", width:25},
			{ field: "art", title: "Article", width:20},
			{ command:[				
				{
					name: "print",
					click: PrintBarcode,
					text:"Show.Barcode",
				}							
				],width: "30px"				
			}			
		]
	}).data("kendoGrid");
	
}

function PrintBarcode(e){

	e.preventDefault();

	var idata 	= this.dataItem($(e.currentTarget).closest("tr"));
	var id 		= "param="+idata.batch;
	
	var qs_encrypt = $.ajax({
					type:"POST",
					url:base_url+"incoming_bar/get_qs_encrypt",
					async: false,
					data:id
	}).responseText;
	
	window.open(base_url+"incoming_bar/print_big_barcode/"+qs_encrypt,'_blank');

}

function DelBatch(){


}

function LookUpBatch(){

	var batchno = $("#txt_fbatch").val();
	var indate 	= $("#dtp_findate").val();

	var str_data = 'batch='+batchno+'&indate='+indate;

	$.ajax({
			
		type:"POST",
		url:base_url+"incoming_bar/lookup_batch",
		dataType:"json",
		data:str_data,
		cache:false,
		success:function(result){

			if(result!=null){

				$("#d_item_no").text(result.item_no);
				$("#d_item_name").text(result.item_name);
				$("#d_color").text(result.color);
				$("#d_in_qty").text(result.in_qty);
				$("#d_psheet").text(result.psheet);
				$("#d_supplier").text(result.supplier);
				$("#d_country").text(result.country);
				$("#d_article").text(result.art);
			}
			else{

				$("#d_item_no").text('');
				$("#d_item_name").text('');
				$("#d_color").text('');
				$("#d_in_qty").text('');
				$("#d_psheet").text('');
				$("#d_supplier").text('');
				$("#d_country").text('');
				$("#d_article").text('');
			}
		}
	});
}

function SaveBatch(){

	var purbatch 	= $("#txt_fbatch").val();
	var reach_date	= $("#dtp_findate").val();
	var item_no 		= $("#d_item_no").text();	
	var color 		= $("#d_color").text();
	var grn_qty 	= $("#d_in_qty").text();
	var psheet 		= $("#d_psheet").text();
	var supp_no 	= $("#d_supplier").text();
	var country 	= $("#d_country").text();
	var article 		= $("#d_article").text();

	var str_data = "purbatch="+purbatch+
		"&reach_date="+reach_date+
		"&item_no="+item_no+
		"&color="+color+
		"&grn_qty="+grn_qty+
		"&psheet="+psheet+
		"&supp_no="+supp_no+
		"&country="+country+
		"&article="+article;

	$.ajax({
			
		type:"POST",
		url:base_url+"incoming_bar/save_incoming_batch",
		dataType:"json",
		data:str_data,
		cache:false,
		success:function(data){
			
			$("#add_window").data("kendoWindow").close();

			if(data==true){

				$("#t-grid").kendoGrid("destroy");
				fill_grid();
			}
			else{

				new Messi('Batch No. dengan Tgl.Incoming tersebut sudah ada di database.', {title: 'Invalid.',titleClass: 'anim warning', modal: true});
			}
		}
		
	});
}