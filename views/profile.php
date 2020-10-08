<?php
session_start();
if(!isset($_SESSION['data'])){
      $_SESSION['redirectURL'] = $_SERVER['REQUEST_URL'];
      header('location:../');
}
?>
<!DOCTYPE html>
<html>

<?php 
  include "../include/head.php";
?>
<body>
  <?php 
 if(isset($_SESSION['loginAdmin'])){
    include "../include/navigation.php";
  }else{
    include "../include/navigation_user.php";
  }
  ?>

  <div class="main-content" id="panel">

      <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <h2 style="color:white;margin-right:20px;font-family:Courier, monospace">Dashboard Pengering Kerupuk </h2>
            </div>
          </div>
          <!-- Card stats -->
       
        </div>
      </div>
    </div>
     <div class="container-fluid mt--6">
     <div class="row">
      <?php
          include "../include/koneksi.php";
          $no = $_SESSION['noLogin'];
          $sql = mysqli_query($connection, "SELECT * FROM user WHERE No='$no'");
          while ($row = mysqli_fetch_array($sql)) { ?>
        <div class="col">
            <img src="../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
              
                <div class="card-profile-image">
                  <a href="#">
                  <?php echo  "<img src='../assets/img/user/".$row['foto']."' class='rounded-circle' width='200px'>" ?>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="#editPassword" data-toggle="modal"
                 data-no="<?php echo $row['No']; ?>"
                 class="btn btn-sm btn-default mr-4 editPassword">Edit Password</a>
                <a href="#edit" data-toggle="modal" 
                   data-no="<?php echo $row['No']; ?>"
                   data-telepon="<?php echo $row['noTelepon']; ?>"
                   data-alamat="<?php echo $row['alamat']; ?>"
                   data-nama="<?php echo $row['nama']; ?>"
                   data-username="<?php echo $row['username']; ?>"
                   class="btn btn-sm btn-info float-right editProfil">Edit Profil</a>
              </div>
            </div>
            <div class="card-body pt-0">
             
              <div class="text-center">
                <h5 class="h3">
                  <?php echo $row['nama'] ?>
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2">Alamat : </i><?php echo $row['alamat'] ?>
                </div>
                <center>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2">Username : </i><?php echo $row['username'] ?>
                </div>
                </center>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>No Telepon : <?php echo $row['noTelepon'] ?>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
        </div>
      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Edit User</h5 >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <div class="modal-body">
        <div class="card card-primary">
              
          <form action="../auth/prosesUser.php" method="post" enctype="multipart/form-data">
                <div class="pl-lg-4">
                    <div class="col-lg-8">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">No</label>
                        <input type="text" name="no" class="form-control no" id="no" placeholder="paijo" >
                    </div>
                    </div>                  
                    <div class="col-lg-8">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nama</label>
                        <input type="text" name="nama" class="form-control nama" id="nama" placeholder="paijo" >
                      </div>
                    </div>
                    <div class="col-lg-8">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" name="username" class="form-control username" id="username" placeholder="paijo" >
                      </div>
                    </div>
                    <div class="col-lg-8">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">No. Telepon</label>
                        <input  name="noTelepon" class="form-control telepon" id="telepon" placeholder="+62">
                      </div>
                    </div>  
                   <div class="col-lg-8">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Alamat</label>
                        <input type="text" id="alamat" name="alamat" class="form-control alamat" placeholder="tuban">
                      </div>
                   </div>  
                   <div class="col-lg-8">
                   <td>
                        <input type="checkbox" name="ubah_foto" value="true"> Ceklist jika ingin merubah foto
                        <br>
                        <input type="file" name="foto">
                      </td>
                      
                  </div>
                </div>
                <hr class="my-4" />
                <div class="modal-footer">
                     <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="editPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Edit Password</h5 >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <div class="modal-body">
        <div class="card card-primary">
              
          <form action="../auth/prosesUser.php" method="post">
                <div class="pl-lg-4">
                    <div class="col-lg-8">
                        <input type="hidden" name="no" class="form-control no" id="no" placeholder="paijo" >
                    </div>                  
                    <div class="col-lg-8">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Password Lama</label>
                        <input  name="passwordLama" type="password" class="form-control" placeholder="******">
                      </div>
                    </div>  
                   <div class="col-lg-8">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Password Baru</label>
                        <input type="password" name="passwordBaru" class="form-control" placeholder="******">
                      </div>
                   </div>  
                   
                </div>
                <hr class="my-4" />
                <div class="modal-footer">
                     <button type="submit" name="editPassword" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

      <?php 
        include "../include/footer.php";
      ?>
       </div>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->

  <script type="text/javascript">
    $(document).on("click", ".editProfil", function () {
    var id = $(this).data('id');
    var nama = $(this).data('nama');
    var telepon = $(this).data('telepon');
    var alamat = $(this).data('alamat');
    var username = $(this).data('username');
    
    $(".id").val(id);
    $(".nama").val(nama);
    $(".telepon").val(telepon);
    $(".alamat").val(alamat);
    $(".username").val(username);
    });
  </script>
  <script type="text/javascript">
    $(document).on("click", ".editPassword", function () {
    var no = $(this).data('no');
    
    $(".no").val(no);
    });
  </script>
</body>

</html>