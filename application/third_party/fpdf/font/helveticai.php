<html>
    <head>
        <title>Aplikasi Menentukan Kenaikan Jabatan dengan Metode TOPSIS by M. Rodin - 2012141887 - 07TPLPE</title>
        <style type="text/css">
            input:focus {
                background-color: pink;
            }
            body {
                background-image: url("images/rodin_background.gif");
				background-size:100% 100%;
            }
            * {
                font-family: verdana;
            }
            #tempatdata {
                background:rgba(173,216,230,0.9);
                width: 1270px;
                margin: 20px;
                padding: 20px;
                border-radius: 10px 10px 10px 10px;
                -moz-border-radius: 10px 10px 10px 10px;
                -khtml-border-radius: 10px 10px 10px 10px;
                -webkit-border-radius: 10px 10px 10px 10px;
                box-shadow: 0 0 25px #000000;
            }
            table {
                border-collapse: collapse;
            }
            table th,td {
                padding: 10px;
            }
            .inputan {
                width: 115px;height: 50px;padding: 5px;font-size: 15pt
            }
            .wwww {
                margin-top: 15px;
                font-size: 15pt
            }
            .wwww input {
                width: 80px;
                padding: 5px;
                font-size: 15pt
            }
            .samping ul {

            }
            .samping li {
                padding: 5px;
                list-style: none;
                float: left;
            }
            .Tabeldata {
                border-collapse: collapse;
                font-size: 10pt;
            }
            
            .Tabeldata tr:hover {
                background-color: grey;
            }
            .Tabeldata th,td {
                padding: 0.5px;
            }
            .tableMatrix td{
                
            }
        </style>
    </head>

    <body><br/><br/>
        <div id="tempatdata">
            <?php
            include 'rodin_koneksidatabase.php';
            if (!empty($_GET['page'])) {
                if ($_GET['page'] == "rodin_data") {
                    include 'rodin_data.php';
                }
            } else {
                include 'rodin_input.php';
            }
            ?>

            <center><small>Created by Muhamad Rodin 2012141887 Universitas Pamulang</small></center>
        </div>
    </body>
</html>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    