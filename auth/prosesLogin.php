<?php
session_start();
include '../include/koneksi.php';

if (isset($_POST['login'])){
      $username=$_POST['username'];
      $password=md5($_POST['password']);

      $query=$con->prepare("SELECT * FROM user WHERE username=:username AND password=:password");
      $query->BindParam(":username",$username);
      $query->BindParam(":password",$password);
      $query->execute();
      $data=$query->fetch();
      if ($query->rowCount()>0 && $data['status'] == 'aktif'){
            session_start();
            if($data['level']==2){
                  $_SESSION['loginAdmin'] = true;
                  $_SESSION['data'] = true;
                  $_SESSION['username']=$data['username'];
                  $_SESSION['level']=$data['level'];
                  $_SESSION['nama'] = $data['nama'];
                  $_SESSION['noLogin'] = $data['No'];
                  header('location:../views/home.php');
            }else{
                  $_SESSION['loginUser'] = true;
                  $_SESSION['data'] = true;
                  $_SESSION['username']=$data['username'];
                  $_SESSION['level']=$data['level'];
                  $_SESSION['nama'] = $data['nama'];
                  $_SESSION['noLogin'] = $data['No'];
                  header('location:../views/home_user.php');
            }
      }
      else
      {
        echo "<script>window.alert('username atau password salah / akun terbanned')
        window.location='../'</script>";
      }
    }
?>