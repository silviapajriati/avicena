$(document).ready(function(){

});

function save(){

    $("#form_editing").ajaxSubmit({
        url:base_url+"dashboard/save_in",
        type: 'post',
        success: function(){

            alert('New Data IT Project Successfully Added.', {title: 'Simpan Sukses.',titleClass: 'info', modal: true, buttons: [{id: 0, label:'OK', val: 'X'}],callback:function(){ window.setTimeout('window.location="<?php echo base_url();?>it_project"',500); }});
            window.location = base_url+'dashboard';
        },
        error: function(){

        }
    });

}