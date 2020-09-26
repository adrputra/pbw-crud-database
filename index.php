<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Database Mahasiswa</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="bootstrap-css/bootstrap.css">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper" style="max-width: 1280px">
            <div class="card card-4">
                <div class="card-body">
                	<div class="row row-space">
                    	<div class="col-2baru">
                    		<h2 class="title">Database Mahasiswa</h2>
                    	</div>
                    	<div class="col-2button" style="padding-right: 15px; padding-top: 8px;">
                    		<form action="add.php">
                				<input class="btn btn-primary" style="font-size: 16px;" type="submit" value="Tambah Data Baru">
                			</form>
                    	</div>
                	</div>
                    <table class="table table-striped" style="text-align: center; font-size: 14px">
                    	<thead class="thead-dark">
                		<tr>
                			<th>No.</th>
                			<th>NIM</th>
                			<th>Nama</th>
                			<th>Jenis Kelamin</th>
                			<th>Agama</th>
                			<th>Hobby</th>
                            <th>Foto Profil</th>
                            <th>Aksi</th>
                		</tr>
                		</thead>
<?php 

	include "00_koneksi.php";
	
	$i = 1;
	$r=mysqli_query($kon,"SELECT * FROM mahasiswa ORDER BY id ASC");
	while($data=mysqli_fetch_assoc($r))
	{
        $finalHobby = str_replace("#", ", ", $data['hobby']);
        // echo "<p>".$final."</p>";
        // echo "<form action=\"03_aksi.php\">";
        echo "<tr>";
        echo "<th style=\"vertical-align:middle;\">".$i++."</th>";
        echo "<th style=\"vertical-align:middle;\">".$data['nim']."</th>";
        echo "<th style=\"vertical-align:middle;\">".$data['nama']."</th>";
        echo "<th style=\"vertical-align:middle;\">".$data['jk']."</th>";
        echo "<th style=\"vertical-align:middle;\">".$data['agama']."</th>";
        echo "<th style=\"vertical-align:middle;\">".$finalHobby."</th>";
        // echo "<th><img src='data:image/PNG;charset=utf8;base64,'".base64_encode($data['image'])."</th>";
        // echo "</tr>";
		// echo $i++.". ". $data["nama"].". ".$data["nim"].". ".$data["jk"].". ".$data["agama"].". ".$data["olahraga"];
  //       echo " &nbsp;&nbsp;&nbsp;<input type=\"submit\" name=\"aksi\" value=\"Edit\">";
  //       echo " &nbsp;&nbsp;&nbsp;<input type=\"submit\" name=\"aksi\" value=\"Delete\">";
  //       echo "<br>";
		// echo "<input type=\"hidden\" name=\"id\" value=\"".$data["id"]."\">";
		// echo "<input type=\"hidden\" name=\"nm\" value=\"".$data["nama"]."\">";
		// echo "</form>";
 ?>
<th style="vertical-align: middle;"><img src='data:image/jpg;charset=utf8;base64,<?php echo base64_encode($data['image']); ?>' width="50px" height="50px"/></th>
<th>
    <a class="btn btn-outline-success" href="edit.php?id=<?php echo $data['id']; ?>">Edit</a>
    <br>
    <br>
    <a class="btn btn-outline-danger" href="delete.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin Hapus Data Ini?')">Hapus</a>
</th>
<?php } ?>
</tr>
                	</table>
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
    <script src="bootstrap-js/bootstrap.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->