<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Tambah Data</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Tambah Data</h2>
                    <form method="post" enctype="multipart/form-data">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Nama</label>
                                    <input class="input--style-4" type="text" name="nama">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">NIM</label>
                                    <input class="input--style-4" type="text" name="nim">
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label">Agama</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="agama">
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghuchu">Konghuchu</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Gender</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male
                                            <input type="radio" checked="checked" name="gender" value="Laki-laki">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" name="gender" value="Perempuan">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-5">
                                <div class="input-group">
                                    <label class="label">Hobby</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Sepak Bola
                                            <input type="checkbox" name="hobby[]" value="Sepak Bola">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container m-r-45">Basket
                                            <input type="checkbox" name="hobby[]" value="Basket">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container m-r-45">Futsal
                                            <input type="checkbox" name="hobby[]" value="Futsal">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container m-r-75">Renang
                                            <input type="checkbox" name="hobby[]" value="Renang">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container m-r-45">Badminton
                                            <input type="checkbox" name="hobby[]" value="Badminton">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Unggah Foto Profil</label>
                                    <input class="btn--radius-2" type="file" name="image">
                                </div>
                            </div>
                        <div class="p-t-15">
                            <input class="btn btn--radius-2 btn--blue" name="sub" type="submit" value="Tambah"></input>
                            <!-- <input class="btn btn--radius-2 btn--blue" name="sub" type="submit" value="Kembali"></input> -->
                            <br>
                            <br>
                            <a style="font-size: 15px; color:white; background-image: linear-gradient(to right, #4272d7, #749ae8); text-decoration-line: none; border-radius: 15px;" href="index.php">--Kembali-- </a>
                        </div>
                    </form>
<?php
        if (isset($_POST['sub'])) { //mengecek udah ditekan atau belum   
            if ($_POST['sub']=="Tambah"){
                if (strlen($_POST['nama'])) { //strlen mengukur panjang string || Tujuannya mengecek data kosong atau tidak
                    if (strlen($_POST['nim'])) {
                        if (strlen($_POST['agama'])) {
                            include "00_koneksi.php";
                             $all = "";
                            foreach ($_POST['hobby'] as $olahraga) {
                                $all.= $olahraga."#"; 
                            }
                            if(!empty($_FILES["image"]["name"])) {
                                $fileName = basename($_FILES["image"]["name"]); 
                                $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
                                $allowTypes = array('jpg','png','PNG','JPG','jpeg','gif'); 
                                if(in_array($fileType, $allowTypes)){ 
                                    $image = $_FILES['image']['tmp_name']; 
                                }
                            }else{
                                $image="http://j3d118161.rf.gd/PBW/CRUD_Database/Foto/default.png";
                            }
                            $all = substr($all,0,strlen($all)-1);
                            $imgContent = addslashes(file_get_contents($image));
                            $insert = mysqli_query($kon,"INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `jk`, `agama`, `hobby`, `image`)
                                       VALUES (NULL, '".$_POST['nim']."', '".$_POST['nama']."', '".$_POST['gender']."', '".$_POST['agama']."', '".$all."', '".$imgContent."')");
                                if($insert){ 
                                    $status = 'success'; 
                                    $statusMsg = "File uploaded successfully."; 
                                }else{ 
                                     $statusMsg = "File upload failed, please try again."; 
                                }
                            echo "<br>$statusMsg";
                            echo "<br>Data <b>".$_POST['nama']."</b> Telah Disimpan di Database";       
                        }
                        else{
                            echo "<br>Data Agama Tidak Boleh Kosong";    
                        }
                    }
                    else{
                        echo "<br>Data NIM Tidak Boleh Kosong";
                    }
                }
                else
                    echo "<br>Data Nama Tidak Boleh Kosong";
            }
            else{
                //mulai sini
              
            }
            //sampe sini
            
        }
?>
                </div>
            </div>
        </div>
    </div>
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->