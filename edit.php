<?php
  // memanggil file koneksi.php untuk membuat koneksi
include '00_koneksi.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM mahasiswa WHERE id='$id'";
    $result = mysqli_query($kon, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($kon).
         " - ".mysqli_error($kon));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
  }         
?>

<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Edit Data</title>

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
                    <h2 class="title">Edit Data <?php echo $data['nama'];?></h2>
                    <form method="post" enctype="multipart/form-data">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Nama</label>
                                    <input class="input--style-4" type="text" name="nama" value="<?php echo $data['nama'];?>">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">NIM</label>
                                    <input class="input--style-4" type="text" name="nim" value="<?php echo $data['nim'];?>">
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label">Agama</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="agama">
                                    <option disabled="disabled">Choose option</option>
                                    <option value="Islam" <?php if ($data['agama']=="Islam") {echo "selected";};?>>Islam</option>
                                    <option value="Kristen" <?php if ($data['agama']=="Kristen") {echo "selected";};?>>Kristen</option>
                                    <option value="Katolik" <?php if ($data['agama']=="Katolik") {echo "selected";};?>>Katolik</option>
                                    <option value="Hindu" <?php if ($data['agama']=="Hindu") {echo "selected";};?>>Hindu</option>
                                    <option value="Budha" <?php if ($data['agama']=="Budha") {echo "selected";};?>>Budha</option>
                                    <option value="Konghuchu" <?php if ($data['agama']=="Konghuchu") {echo "selected";};?>>Konghuchu</option>
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
                                            <input type="radio" <?php if ($data['jk']=="Laki-laki") {echo "checked";};?> name="gender" value="Laki-laki">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" name="gender" value="Perempuan" <?php if ($data['jk']=="Perempuan") {echo "checked";};?>>
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
                                            <input type="checkbox" name="hobby[]" value="Sepak Bola" <?php if (strpos($data['hobby'], "Sepak")!==false) {echo "checked";};?>>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container m-r-45">Basket
                                            <input type="checkbox" name="hobby[]" value="Basket" <?php if (strpos($data['hobby'], "Basket")!==false) {echo "checked";};?>>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container m-r-45">Futsal
                                            <input type="checkbox" name="hobby[]" value="Futsal" <?php if (strpos($data['hobby'], "Futsal")!==false) {echo "checked";};?>>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container m-r-75">Renang
                                            <input type="checkbox" name="hobby[]" value="Renang" <?php if (strpos($data['hobby'], "Renang")!==false) {echo "checked";};?>>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container m-r-45">Badminton
                                            <input type="checkbox" name="hobby[]" value="Badminton" <?php if (strpos($data['hobby'], "Badminton")!==false) {echo "checked";};?>>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Unggah Foto Profil</label>
                                    <img src='data:image/jpg;charset=utf8;base64,<?php echo base64_encode($data['image']); ?>' width="100px" height="100px"/>
                                    <input class="btn--radius-2" type="file" name="image">
                                </div>
                            </div>
                        <div class="p-t-15">
                            <input class="btn btn--radius-2 btn--blue" name="sub" type="submit" value="Edit"></input>
                            <!-- <input class="btn btn--radius-2 btn--blue" name="sub" type="submit" value="Kembali"></input> -->
                            <br>
                            <br>
                            <a style="font-size: 15px; color:white; background-image: linear-gradient(to right, #4272d7, #749ae8); text-decoration-line: none; border-radius: 15px;" href="index.php">--Kembali-- </a>
                        </div>
                    </form>
<?php
  $id=$_GET['id'];
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
                            $all = substr($all,0,strlen($all)-1);
                            if(!empty($_FILES["image"]["name"])) {
                                $fileName = basename($_FILES["image"]["name"]); 
                                $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
                                $allowTypes = array('jpg','png','PNG','JPG','jpeg','gif'); 
                                if(in_array($fileType, $allowTypes)){ 
                                    $image = $_FILES['image']['tmp_name']; 
                                    $imgContent = addslashes(file_get_contents($image));
                                }
                                $insert = mysqli_query($kon,"UPDATE mahasiswa SET nim='".$_POST['nim']."',nama='".$_POST['nama']."',jk='".$_POST['gender']."',agama='".$_POST['agama']."',hobby='$all',image='$imgContent' WHERE id='$id'");
                            }else{
                                 $insert = mysqli_query($kon,"UPDATE mahasiswa SET nim='".$_POST['nim']."',nama='".$_POST['nama']."',jk='".$_POST['gender']."',agama='".$_POST['agama']."',hobby='$all' WHERE id='$id'");
                                // $image="Foto\default.png";
                            }
                                if($insert){ 
                                    $status = 'success'; 
                                    $statusMsg = "File Updated successfully."; 
                                    echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
                                }else{ 
                                     $statusMsg = "File upload failed, please try again."; 
                                }
                            echo "<br>$statusMsg";
                            echo "<br>Data <b>".$_POST['nama']."</b> Telah Diubah di Database";       
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