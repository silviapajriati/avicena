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
<script type="text/javascript" src="<?php echo base_url() ?>js/js_form/main.js"></script>
<div class="portlet-body form">
    <div class="container">
        <div class="tabbable-line">
            <ul class="nav nav-tabs ">
                <li class="active">
                    <a aria-expanded="true" href="#login" data-toggle="tab">
                    Login </a>
                </li>
                <li class="">
                    <a aria-expanded="true" href="#daftar" data-toggle="tab">
                    Sign UP </a>
                </li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="login">
                    <div class="from_dotcs" style="width: 1000px;">
                        <label style="background: #555; color: #ffffff; font-size: 20px;" class="col-md-12 control-label">LOGIN</label>
                        <div id="div_alert"></div>
                        <form class="form-horizontal" action="<?php echo site_url('login/login')?>" method="post">
                            <?php 
                                $flash2 = $this->session->flashdata('pesan1');
                                if($flash2){
                                ?>
                                <div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label=""close>&times;</a><?php echo $this->session->flashdata('pesan1'); ?></div>
                                <?php
                                } else {
                                    echo '';    
                                }
                            ?>
                            <div class="form-body">
                                <div class="form-group tight-bottom">
                                    <label class="col-md-3 control-label">Username</label>
                                    <div class="col-md-4">	
                                        <input type="text" class="form-control input" placeholder="Username" id="txt_user" name="txt_user"/>
                                    </div>
                                </div>
                                <div class="form-group tight-bottom">
                                    <label class="col-md-3 control-label">Password</label>
                                    <div class="col-md-4">
                                        <input type="password" class="form-control input" placeholder="Password" id="txt_pass" name="txt_pass"/>
                                    </div>
                                </div>
                                <div class="form-group tight-bottom">
                                    <label class="control-label col-md-3"> </label>
                                    <div class="col-md-9">
                                        <div class="action_control">
                                            <input type="submit" name="login" value="Login" class="btn default">
                                            <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane" id="daftar">
                    <div class="from_dotcs" style="width: 1000px;">
                        <label style="background: #555; color: #ffffff; font-size: 20px;" class="col-md-12 control-label">SIGN UP</label>
                        <div id="div_alert"></div>
                        <form class="form-horizontal" action="<?php echo site_url('login/save_user')?>" method="post">
                            <?php 
                                $flash2 = $this->session->flashdata('pesan2');
                                if($flash2){
                                ?>
                                <div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label=""close>&times;</a><?php echo $this->session->flashdata('pesan2'); ?></div>
                                <?php
                                } else {
                                    echo '';    
                                }
                            ?>
                            <div class="form-body">
                                <div class="form-group tight-bottom">
                                    <label class="col-md-3 control-label">User ID</label>
                                    <div class="col-md-4">	
                                        <input type="text" class="form-control input" placeholder="User ID" id="txt_id" name="txt_id"/>
                                    </div>
                                </div>
                                <div class="form-group tight-bottom">
                                    <label class="col-md-3 control-label">Email</label>
                                    <div class="col-md-4">	
                                        <input type="text" class="form-control input" placeholder="Email" id="txt_email" name="txt_email"/>
                                    </div>
                                </div>
                                <div class="form-group tight-bottom">
                                    <label class="col-md-3 control-label">Password</label>
                                    <div class="col-md-4">
                                        <input type="password" class="form-control input" placeholder="Password" id="pass" name="pass"/>
                                    </div>
                                </div>
                                <div class="form-group tight-bottom">
                                    <label class="control-label col-md-3"> </label>
                                    <div class="col-md-9">
                                        <div id="loading_control" style="display:none;text-align:center">
                                            <img class="col-md-offset-4" src="<?php echo base_url(); ?>images/pre_loader.gif" /><br/>
                                            <span>Please Wait, Saving Data....</span>
                                        </div>
                                        <div id="action_control">
                                            <input type="submit" name="save_user" value="Sign UP" class="btn default">
                                            <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
