<?php
$login = $this->session->has_userdata('username','pass','email','priv');

print_r($login);
?>
<!DOCTYPE html>
<html lang="en">

  <style text="css">
    .brand {
      font-size: 30px;
      text-shadow: 3px 2px 1px grey;
    }
    #navbar,
    #navbar ul,
    #navbar ul li,
    #navbar ul li a,
    #navbar #menu-button {
      margin: 0;
      padding: 0;
      border: 0;
      list-style: none;
      line-height: 1;
      display: fixed;
      position: relative;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
    }
    #navbar:after,
    #navbar>ul:after {
      content: ".";
      display: fixed;
      clear: both;
      visibility: hidden;
      line-height: 0;
      height: 0;
    }
    #navbar #menu-button {
      display: none;
    }
    #navbar {
      font-family: Montserrat, sans-serif;
      background: #333333;
    }
    #navbar>ul>li {
      float: left;
    }
    #navbar>ul>li>a {
      padding: 17px;
      font-size: 12px;
      letter-spacing: 1px;
      text-decoration: none;
      color: #dddddd;
      font-weight: 700;
      text-transform: uppercase;
      -webkit-transition: color .25s ease;
      -moz-transition: color .25s ease;
      transition: color .25s ease;
    }
    .dropdown:hover .dropdown-menu{
      display: block;
    }
    #navbar>ul>li:hover>a {
      color: #ffffff;
      display: block;
    }
    #navbar>ul>li.has-sub>a {
      padding-right: 30px;
    }
    #navbar ul>li.has-sub>a:after {
      position: absolute ;
      top: 22px;
      right: 11px;
      width: 8px;
      height: 2px;
      display: block;
      background: #dddddd;
      content: '';
      -webkit-transition: background .25s ease;
      -moz-transition: background .25s ease;
      transition: background .25s ease;
    }
    #title{
      color: #ffffff;
      font-family:roboto;
      font-size: 30px;
      /* background: #ffffff; */
      padding: 12px;
    }
    #navbar>ul>li.has-sub:hover>a:after,
    #navbar>ul>li.has-sub>a:hover:after {
      background: #ffffff;
    }
    #navbar ul>li.has-sub>a:before {
      position: absolute;
      top: 19px;
      right: 14px;
      display: block;
      width: 2px;
      height: 8px;
      background: #dddddd;
      content: '';
      -webkit-transition: all .25s ease;
      -moz-transition: all .25s ease;
      -ms-transition: all .25s ease;
      -o-transition: all .25s ease;
      transition: all .25s ease;
    }
    #navbar ul>li.has-sub:hover>a:before,
    #navbar ul>li.has-sub>a:hover:before {
      top: 23px;
      height: 0;
    }
    #navbar ul ul {
      position: absolute;
      left: -9999px;
    }
    #navbar li:hover>ul {
      left: auto;
    }
    #navbar ul ul ul {
      margin-left: 100%;
      top: 0;
    }
    #navbar ul ul li {
      height: 0;
      -webkit-transition: height .25s ease;
      -moz-transition: height .25s ease;
      transition: height .25s ease;
    }
    #navbar li:hover>ul>li {
      height: 35px;
    }
    #navbar ul ul li a {
      width: 170px;
      padding: 11px 15px;
      border-bottom: 1px solid rgba(150, 150, 150, 0.15);
      font-size: 12px;
      text-decoration: none;
      color: #dddddd;
      font-weight: 400;
      background: #333333;
    }
    #navbar ul ul li:last-child>a,
    #navbar ul ul li.last-item>a {
      border-bottom: 0;
    }
    #navbar ul ul li:hover>a,
    #navbar ul ul li a:hover {
      color: #ffffff;
    }
    #navbar ul ul li.has-sub>a:after {
      top: 16px;
      right: 11px;
      background: #dddddd;
    }

    #navbar ul ul>li.has-sub:hover>a:after,
    #navbar ul ul>li.has-sub>a:hover:after {
      background: #ffffff;
    }

    #navbar ul ul li.has-sub>a:before {
      top: 13px;
      right: 14px;
      background: #dddddd;
    }

    #navbar ul ul>li.has-sub:hover>a:before {
      top: 17px;
      height: 0;
    }
    #navbar.small-screen {
      width: 100%;
    }

    #navbar.small-screen ul {
      width: 100%;
      display: none;
    }

    #navbar.small-screen ul li {
      width: 100%;
      border-top: 1px solid rgba(120, 120, 120, 0.2);
    }

    #navbar.small-screen ul ul li,
    #navbar.small-screen li:hover>ul>li {
      height: auto;
    }

    #navbar.small-screen ul li a,
    #navbar.small-screen ul ul li a {
      width: 100%;
      border-bottom: 0;
    }

    #navbar.small-screen>ul>li {
      float: none;
    }

    #navbar.small-screen ul ul,
    #navbar.small-screen ul ul ul {
      position: relative;
      left: 0;
      width: 100%;
      margin: 0;
      text-align: left;
    }
    #navbar.small-screen ul ul li a {
      padding-left: 25px;
    }

    #navbar.small-screen ul ul ul li a {
      padding-left: 35px;
    }

    #navbar.small-screen>ul>li.has-sub>a:after,
    #navbar.small-screen>ul>li.has-sub>a:before,
    #navbar.small-screen ul ul>li.has-sub>a:after,
    #navbar.small-screen ul ul>li.has-sub>a:before {
      display: none;
    }
    #navbar.small-screen #menu-button {
      display: block;
      padding: 17px;
      color: #dddddd;
      cursor: pointer;
      font-size: 12px;
      text-transform: uppercase;
      font-weight: 700;
    }
    #navbar.small-screen #menu-button:after {
      position: absolute;
      top: 22px;
      right: 17px;
      display: block;
      height: 4px;
      width: 20px;
      border-top: 2px solid #dddddd;
      border-bottom: 2px solid #dddddd;
      content: '';
    }

    #navbar.small-screen #menu-button:before {
      position: absolute;
      top: 16px;
      right: 17px;
      display: block;
      height: 2px;
      width: 20px;
      background: #dddddd;
      content: '';
    }
    #navbar.small-screen #menu-button.menu-opened:after {
      top: 23px;
      border: 0;
      height: 2px;
      width: 15px;
      background: #ffffff;
      -webkit-transform: rotate(45deg);
      -moz-transform: rotate(45deg);
      -ms-transform: rotate(45deg);
      -o-transform: rotate(45deg);
      transform: rotate(45deg);
    }

    #navbar.small-screen #menu-button.menu-opened:before {
      top: 23px;
      background: #ffffff;
      width: 15px;
      -webkit-transform: rotate(-45deg);
      -moz-transform: rotate(-45deg);
      -ms-transform: rotate(-45deg);
      -o-transform: rotate(-45deg);
      transform: rotate(-45deg);
    }
    #navbar.small-screen .submenu-button {
      position: absolute;
      z-index: 99;
      right: 0;
      top: 0;
      display: block;
      border-left: 1px solid rgba(120, 120, 120, 0.2);
      height: 46px;
      width: 46px;
      cursor: pointer;
    }

    #navbar.small-screen ul ul .submenu-button {
      height: 34px;
      width: 34px;
    }
    #navbar.small-screen .submenu-button.submenu-opened {
      background: #262626;
    }
    #navbar.small-screen .submenu-button:after {
      position: absolute;
      top: 22px;
      right: 19px;
      width: 8px;
      height: 2px;
      display: block;
      background: #dddddd;
      content: '';
    }

    #navbar.small-screen ul ul .submenu-button:after {
      top: 15px;
      right: 13px;
    }

    #navbar.small-screen .submenu-button.submenu-opened:after {
      background: #ffffff;
    }

    #navbar.small-screen .submenu-button:before {
      position: absolute;
      top: 19px;
      right: 22px;
      display: block;
      width: 2px;
      height: 8px;
      background: #dddddd;
      content: '';
    }

    #navbar.small-screen ul ul .submenu-button:before {
      top: 12px;
      right: 16px;
    }

    #navbar.small-screen .submenu-button.submenu-opened:before {
      display: none;
    }
    .container-fluid{
      width: 100%;
    }
    #navbar{
      width:100%;
      position:fixed;
      top:-50; left:0;      
    }
    #id_logo{
      width:50px;
      height:50px;
    }
  </style>

<script type="text/javascript" src="<?php echo base_url() ?>js/js_form/main.js"></script>
<div class="page-header navbar navbar-fixed-top">
  <div class="page-header-inner">
    <div class="top-menu">
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <a id="title"  title="Goto Home" href="<?php echo base_url() ?>"><img id="id_logo" src="<?php echo base_url(); ?>/images/bg/logo.png">SMK AVICENA</a>
        </ul>
        <ul class="nav navbar-nav">
          <li><a href="<?php echo base_url() ?>profil">Profil</a></li>
        </ul>
        <ul class="nav navbar-nav">
          <li><a href="<?php echo base_url() ?>info">Informasi Sekolah</a></li>
        </ul>
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="<?php echo base_url() ?>ppdb" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PPDB Online <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo base_url(); ?>ppdb/jadwal">Jadwal Pendaftaran</a></li>
                <li><a href="<?php echo base_url(); ?>ppdb/daftar">Daftar Online</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav">
          <li><a href="<?php echo base_url(); ?>hasil">Hasil Seleksi</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php  if (!$login){ ?>
            <li class="active">
            <li><a href="<?php echo base_url() ?>login">Login</a></li>
            <?php }else{ ?>
            <li class="active">
            <li data-toggle="modal" ><a href="<?php echo site_url('login/logout'); ?>">Logout (<?php echo $this->session->userdata('username'); ?>)</a></li>
            <?php } ?>
        </ul>
      </div>
    </div>
  </div>
</div> 









