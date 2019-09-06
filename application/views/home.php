<?php
    $buka = isset($tgl_start)?$tgl_start:'';
?>

<style>
body {
  font-family: Georgia, "Times New Roman", Times, serif;
  color: #555;
}
.mySlides {
    display: none;
}

@media (min-width: 1200px) {
  .container {
    width: 1000px;
    margin-top: 20px;
    margin-bottom: 0px;
  }
}
.konten{
    width: 1000px;
    padding-bottom:100px;
}
.blog-header {
  padding-top: 20px;
  padding-bottom: 20px;
}
.blog-title {
  margin-top: 50px;
  margin-bottom: 0;
  font-size: 60px;
  font-weight: normal;
}
.blog-description {
  font-size: 20px;
  color: #999;
}
.form-horizontal .control-label {
    text-align: left !important;
}
.from_dotcs{
  border:2px dotted #5c5353;
  padding:5px 5px 5px 5px;
  margin-bottom: 20px;
}
</style>

<body>
<div class="portlet-body form">
    <div class="container">
        <div class="slideshow-container">

            <div class="mySlides">
                <img style="display: block; margin: 0 auto; text-align: center; width: 1000px; height: 400px;" src="<?php echo base_url(); ?>images/av8.jpg" style="width:100%">
            </div>

            <div class="mySlides">
                <img style="display: block; margin: 0 auto; text-align: center; width: 1000px; height: 400px;" src="<?php echo base_url(); ?>images/av4.jpg" style="width:100%">
            </div>

            <div class="mySlides">
                <img style="display: block; margin: 0 auto; text-align: center; width: 1000px; height: 400px;" src="<?php echo base_url(); ?>images/av3.jpg" style="width:100%">
            </div>

        </div>

    </div>
    <br>
    <div class="container">
            <div class="from_dotcs" style="width: 1000px;">Pembukaan PPDB Online :
            <?php  if ($buka!=null){ ?>
            <?php echo $gelombang?> Dibuka dari <?php echo $tgl_start?> sampai <?php echo $tgl_end?> || <a href="<?php echo site_url('ppdb/daftar'); ?>">Daftar</a>
            <?php }else{ ?>
                Pendaftaran Belum Dibuka!!! Cek <a href="<?php echo site_url('ppdb/jadwal'); ?>">Jadwal</a>            
            <?php } ?>
            </div>
            <div style="text-align: center; font-size: 40px;">PPDB ONLINE SMK AVICENA</div>
            
    </div>
</div>
</body>

<script text="javascript">
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none"; 
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1} 
        slides[slideIndex-1].style.display = "block"; 
        setTimeout(showSlides, 6000); // Change image every 2 seconds
    }

</script>
