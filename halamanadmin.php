<?php 
  session_start();
  $user = $_SESSION['username'];
  $level = $_SESSION['level'];
echo " Login Sebagai Admin $user";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<title>webku</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="styles/layout.css" type="text/css">
<!--[if lt IE 9]><script src="scripts/html5shiv.js"></script><![endif]-->
</head>
<body>
<div class="wrapper row1">
  <header id="header" class="clear">
    <div id="hgroup">
      <h1>< WEBSITEKU ></h1>
    </div>
    <form action="logout.php" method="post">
      <fieldset >
        <h1>
          <a href="login/login.php">< Login ></a>
        </h1>
        <h1>
          <a href="index.php?logout=success">< Logout ></a>
        </h1>
      </fieldset>
    </form>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li class="dropdown"><a href="#">WEB-learnig</a>
           <ul class="isi-dropdown">
              <li><a href="#">Html</a></li>
              <li><a href="#">CSS</a></li>
              <li><a href="#">PHP</a></li>
              <li><a href="#">JS</a></li>
            </ul>
        </li>
         <li class="dropdown"><a href="#">Galery</a>
           <ul class="isi-dropdown">
              <li><a href="about-us.php">Profile</a></li>
              <li><a href="gallery.php">Album</a></li>
              <li><a href="#">Contact US</a></li>
            </ul>
        </li>
        <li class="dropdown"><a href="#">Halaman Admin</a>
           <ul class="isi-dropdown">
              <li><a href="tampilpost.php">Tampil Postingan</a></li>
              <li><a href="tambahpost.php">Tambah Postingan</a></li>
              <li><a href="#">Contact US</a></li>
            </ul>
        </li>
        
      </ul>
    </nav>
  </header>
</div>
<!-- content -->
<div class="wrapper row2">
  <div id="container" class="clear">
    <!-- tampil post -->
    <?php 

include('koneksi.php');

$sql  ="select * from post order by tanggalpost";
$result =$db_connect->query($sql);

echo "<table border=4 width=600px >";
echo "<tr>
    <th>No</th>
    <th>Id post</th>
    <th>Tanggal post</th>
    <th>Penulis</th>
    <th>judul</th>
    <th>Isi</th>
    <th>idkategori</th>
    <th>AKSI</th>
     </tr>";
$no=0;
while($row=$result->fetch_assoc())
{
$no++;
$idpost     =$row['idpost'];
$tanggalpost=$row['tanggalpost'];
$penulis  =$row['penulis'];
$judul      =$row['judul'];
$isi    =$row['isi'];
$idkategori =$row['idkategori'];
echo "<tr>
    <td>$no</td>
    <td>$idpost</td>
    <td>$tanggalpost</td>
    <td>$penulis</td>
    <td>$judul</td>
    <td>$isi</td>
    <td>$idkategori</td>
    <td>
      <a href='edit_post.php?p=$idpost'>Edit</a>
       - 
      <a href='hapus_post.php?p=$idpost'>Hapus</a> 
    </td>
    </tr>";
echo "</table";

} 
?>

    <!-- main content -->
    <div id="intro">
      <section class="clear">
        <!-- article 1 -->
        
      </section>
    </div>
    <!-- ########################################################################################## -->
    <!-- ########################################################################################## -->
    <!-- ########################################################################################## -->
    <!-- ########################################################################################## -->
    <div id="homepage" class="last clear">
      <section class="one_quarter">
        <h2 class="title">tambahpost</h2>
        <?php 

include('koneksi.php');

// $user='';
// if(isset($_SESSION['user'])){
//  $user=$_SESSION['user'];
// }
  
$sql='select * from kategori';
$result=$db_connect->query($sql);
 ?>

 <form action="prosestambahpost.php" method="post">
  <table>
    <tr>
      <td>tanggal</td> <td>:</td>
     <td>
      <?php echo date('d-m-Y'); ?>
      <input type="hidden" value="<?php echo date('d-m-Y'); ?>" name="tanggal">
     </td>
    </tr>
    <tr>
      <td>penulis</td><td>:</td>
      <td>
        <?= $_SESSION['username']; ?>
        <input type="hidden" value="<?php echo $user; ?>" name="penulis">
      </td>
    </tr>
    <tr>
      <td>judul</td><td>:</td>
      <td>
        <input type="text" name="judul">
      </td>
    </tr>
    <tr>
      <td>kategori</td><td>:</td>
      <td>
        <select name="idkategori">
        <?php while($row=$result->fetch_assoc()){
            $k  =$row['namakategori'];
            $idk  =$row['idkategori'];
          echo "<option value=$idk>$k</option>";  
        } 
        ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>isi</td><td>:</td>
      <td><textarea name="isi"></textarea></td>
    </tr>
    <tr>
      <td align="center" colspan="3">
        <input type="submit">
      </td>
    </tr>
  </table>
 </form>
      </section>
      <section class="one_quarter">
        <h2 class="title">ganti</h2>
        <nav>
          <ul>
            <li><a href="#">Lorem ipsum dolor sit</a></li>
            <li><a href="#">Amet consectetur</a></li>
            <li><a href="#">Praesent vel sem id</a></li>
            <li><a href="#">Curabitur hendrerit est</a></li>
            <li class="last"><a href="#">Sed a nulla urna</a></li>
          </ul>
        </nav>
      </section>
      <section class="two_quarter lastbox">
        <h2 class="title">Quick Links</h2>
        <nav>
          <ul>
            <li><a href="#">Lorem ipsum dolor sit</a></li>
            <li><a href="#">Amet consectetur</a></li>
            <li><a href="#">Praesent vel sem id</a></li>
            <li><a href="#">Curabitur hendrerit est</a></li>
            <li class="last"><a href="#">Sed a nulla urna</a></li>
          </ul>
        </nav>
        <footer class="more"><a href="about-us.php">Read More &raquo;</a></footer>
      </section>
    </div>
    <!-- / content body -->
  </div>
</div>
<!-- Footer -->
<div class="wrapper row3">
  <footer id="footer" class="clear">
    <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">Domain Name</a></p>

    <p class="fl_right"><?php 
            include ("counter.php");
            echo "$kunjungan[0] kali kunjungan</p>";
            ?></p>


  </footer>
</div>
</body>
</html>
