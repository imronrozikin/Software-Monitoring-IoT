<?php
    include "../include/koneksi.php";

    //insert user
    if(isset($_POST['simpan'])) {

    $nama=$_POST['nama'];
    $noTelepon=$_POST['noTelepon'];
    $alamat = $_POST['alamat'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $level = $_POST['level'];

    if(empty($nama) || empty($noTelepon) || empty($alamat) || empty($username) || empty($password))
    {
          echo "<script>window.alert('Mohon data harus diisi dengan lengkap!!')
          window.location='../views/user.php'</script>";
    }else{

    $cek = mysqli_num_rows(mysqli_query($connection,"SELECT * FROM user WHERE username='$username'"));
    if ($cek > 0){
            echo "<script>window.alert('username atau email yang anda masukan sudah ada')
            window.location='../views/user.php'</script>";
    }else {
            mysqli_query($connection,"INSERT INTO user(No, nama, noTelepon, alamat, username, password, status, foto, level)
            VALUES ('','$nama','$noTelepon','$alamat', '$username',md5('$password'), 'aktif','user.jpg', '$level')");
            echo "<script>window.location='../views/user.php?s=1'</script>";
            }
        }
    }

    //edit profil
    else if(isset($_POST['edit'])){
    $no = $_POST['no'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $telepon = $_POST['noTelepon'];

    $sql = mysqli_query($connection, "SELECT username FROM user WHERE No='$no'");
    $user = mysqli_fetch_array($sql);
    $usernameDB = $user['username'];
    
    if($username == $usernameDB){ 
    
    if(isset($_POST['ubah_foto'])){ 
    
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
  
    $path = "../assets/img/user/".$foto;
  
    if(move_uploaded_file($tmp, $path)){ 
  
    $query = "SELECT * FROM user WHERE No='".$no."'";
    $sql = mysqli_query($connection, $query);
    $data = mysqli_fetch_array($sql); 
    if(is_file("../assets/img/user/".$data['foto']))
      unlink("../assets/img/user/".$data['foto']); 
    
    $query = "UPDATE user SET nama='".$nama."', noTelepon='".$telepon."', alamat='".$alamat."', foto='".$foto."' WHERE No='".$no."'";
    $sql = mysqli_query($connection, $query); 
    if($sql){ 
      header("location: ../views/profile.php"); 
    }else{
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      echo "<br><a href='location: ../views/profile.php'>Kembali Ke Form</a>";
        }
    }
    }else{
        $query = "UPDATE user SET nama='".$nama."', noTelepon='".$telepon."', alamat='".$alamat."' WHERE No='".$no."'";
        $sql = mysqli_query($connection, $query); 
        if($sql){ 
        header("location: ../views/profile.php"); 
        }else{
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='../views/profile.php'>Kembali Ke Form</a>";
            }
         }
      }
    else{
    $cek = mysqli_num_rows(mysqli_query($connection,"SELECT * FROM user WHERE username='$username'"));
    if ($cek > 0){
            echo "<script>window.alert('username atau email yang anda masukan sudah ada')
            window.location='../views/profile.php'</script>";
    }else{
    if(isset($_POST['ubah_foto'])){ 
    
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
  
    $path = "../assets/img/user/".$foto;
  
    if(move_uploaded_file($tmp, $path)){ 
  
    $query = "SELECT * FROM user WHERE No='".$no."'";
    $sql = mysqli_query($connection, $query);
    $data = mysqli_fetch_array($sql); 
    if(is_file("../assets/img/user/".$data['foto']))
      unlink("../assets/img/user/".$data['foto']); 
    
    $query = "UPDATE user SET nama='".$nama."',username='".$username."',noTelepon='".$telepon."', alamat='".$alamat."', foto='".$foto."' WHERE No='".$no."'";
    $sql = mysqli_query($connection, $query); 
    if($sql){ 
      header("location: ../views/profile.php"); 
    }else{
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      echo "<br><a href='location: ../views/profile.php'>Kembali Ke Form</a>";
        }
    }
    }else{
        $query = "UPDATE user SET nama='".$nama."',username='".$username."', noTelepon='".$telepon."', alamat='".$alamat."' WHERE No='".$no."'";
        $sql = mysqli_query($connection, $query); 
        if($sql){ 
        header("location: ../views/profile.php"); 
        }else{
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='../views/profile.php'>Kembali Ke Form</a>";
            }
         } 
       }
     }
    }

    //edit password
    else if(isset($_POST['editPassword'])){
        $no = $_POST['no'];
        $passwordLama = md5($_POST['passwordLama']);
        $passwordBaru = md5($_POST['passwordBaru']);

        $sql = mysqli_query($connection, "SELECT * FROM user WHERE No='$no'");
        $row = mysqli_fetch_array($sql);
        $password = $row['password'];

        if($passwordLama == $passwordBaru){
            echo "<script>window.alert('Password yang anda masukan sama')
            window.location='../views/profile.php'</script>";    
        }
        else if($passwordLama == $password){
            mysqli_query($connection, "UPDATE user SET password = '".$passwordBaru."' WHERE No= '$no' ");
            echo "<script>window.alert('Password berhasil dirubah')
            window.location='../views/profile.php'</script>";
        }else{
            echo "<script>window.alert('Password lama tidak sesuai')
            window.location='../views/profile.php'</script>";
        }
    }

    //akti/nonaktif user
    if(isset($_GET['no'])){
        $no = $_GET['no'];
        $cekStatus = mysqli_query($connection, "SELECT status FROM user WHERE No='$no'");
        $data = mysqli_fetch_array($cekStatus);
        $status = $data['status'];

        if($status == 'aktif'){
            mysqli_query($connection, "UPDATE user SET status='nonaktif' WHERE No='$no'");
            echo "<script>window.location='../views/user.php'</script>";
        }else if($status == 'nonaktif'){
            mysqli_query($connection, "UPDATE user SET status='aktif' WHERE No='$no'");
            echo "<script>window.location='../views/user.php'</script>";
        }
    }
    else if(isset($_GET['nouser'])){
        $noUser = $_GET['nouser'];
        mysqli_query($connection, "DELETE FROM user WHERE No='$noUser'");
        echo "<script>window.location='../views/user.php?m=1'</script>";
    }
?>