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
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Pengguna</li>
                  </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a  href="#tambahUser" data-toggle="modal" class="btn btn-sm btn-neutral"><i class="ni ni-fat-add"></i> Tambah User</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Daftar User</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" >Nama</th>
                    <th scope="col" >No. Telepon</th>
                    <th scope="col" >Alamat</th>
                    <th scope="col" >Level</th>
                    <th scope="col" >Status</th>
                    <th scope="col" >Action</th>
                    <th scope="col" >Hapus</th>
                  </tr>
                </thead>
                <tbody class="list">
                <?php 
                  
                  $result = mysqli_query($connection, "SELECT * FROM user");
                  $total = mysqli_num_rows($result);
                  $halaman = 5;
                  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                  $pages = ceil($total/$halaman);
                  $rs = mysqli_query($connection, "SELECT * FROM user INNER JOIN level ON user.level = level.id LIMIT  $mulai, $halaman"); 
                
                  $no = $mulai+1;
                  $data = mysqli_num_rows($rs);

                    if($data==0){
                  ?>

                <?php } else { ?>
                
                <?php while($row=mysqli_fetch_assoc($rs)) {?>
                  <tr>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <span class="status"><?php echo $row['nama']; ?></span>
                      </span>
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <span class="status"><?php echo $row['noTelepon']; ?></span>
                      </span>
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <span class="status"><?php echo $row['alamat']; ?></span>
                      </span>
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <span ><?php echo $row['level']; ?></span>
                      </span>                   
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="completion mr-2"><?php echo $row['status']; ?></span>
                        
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                      <?php if($row['status']=='aktif' && $row['username'] != 'admin') {?>
                       <?php echo " <a href='../auth/prosesUser.php?no=".$row['No']."'>
                        <button class='btn btn-danger'>Nonaktifkan</button>
                        </a>"?>
                      <?php } else if ($row['status']=='nonaktif' && $row['username'] != 'admin') {?>
                       <?php echo "<a href='../auth/prosesUser.php?no=".$row['No']."'> 
                        <button class='btn btn-success' style='width:130px'>Aktifkan</button>
                        </a>" ?>
                      <?php } else if ($row['username']== 'admin') {?>
                        <?php echo "<button class='btn btn-primary' style='width:130px'>Aktif</button>
                        "?>
                      <?php } ?> 
                      </div>
                    </td>

                    <td >
                        <?php if($row['username'] == 'admin') : ?>
                         <a id="btn1" href="#" class="btn btn-danger" >Hapus</a>
                        <?php endif; ?>
                        <?php if($row['username'] != 'admin') : ?>
                         <?php echo "<a href='../auth/prosesUser.php?nouser=".$row['No']."' class='btn btn-danger del-btn'>Hapus</a>" ?>
                        <?php endif; ?>
                    </td>
                  </tr>
                 <?php } ?>
                </tbody>
              </table>
            </div>
            <?php if(isset($_GET['m'])) : ?>
                <div class="flash-data" data-flashdata="<?= $_GET['m']; ?>"></div>            
            <?php endif ?>
            <?php if(isset($_GET['s'])) : ?>
                <div class="flash-tambah" data-flashdata1="<?= $_GET['s']; ?>"></div>            
            <?php endif ?>
            <?php 
             if($data!=0){ 
            ?>
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <?php if($page == 1) echo ""; else {?>
                  <li class="page-item">
                    <a  class="page-link" href="?halaman=<?php echo $_GET['halaman']-1; ?>" >
                      <i class="fas fa-angle-left"></i>    
                      </a>
                  </li>
                  <?php } for ($i=1; $i<=$pages ; $i++){ ?>
                  <li class="page-item active">
                    <a class="page-link" href="?halaman=<?php echo $i; ?>" ><?php echo $i; ?></a>
                  </li>
                  
                   <?php } if($page == $pages) echo ""; else {?>
                  <li class="page-item">
                    <a class="page-link" href="?halaman=<?php echo $_GET['halaman']+1; ?>">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                      <?php } ?>
                    </a>
                  </li>
                  <?php } ?>
                </ul>
              </nav>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>


      <?php 
        include "../include/footer.php";
      ?>

    </div>
  </div>
  <div class="modal fade" id="tambahUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah User</h5 >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card card-primary">
              
          <form action="../auth/prosesUser.php" method="post" >
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="paijo" >
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">No. Telepon</label>
                        <input type="number"  name="noTelepon" class="form-control" placeholder="+62">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Username</label>
                        <input type="text" id="input-first-name" name="username" class="form-control" placeholder="paijo123">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Password</label>
                        <input type="text" name="password" class="form-control" placeholder="paijo123" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Alamat</label>
                        <input type="text" name="alamat" class="form-control" placeholder="tuban" >
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Tipe Pengguna</label>
                        <select id="input-first-name" name="level" class="form-control" placeholder="Pengguna" >
                        <?php 
                          include "../include/koneksi.php";
                          $sql = mysqli_query($connection, "SELECT * FROM level");
                          while ($data = mysqli_fetch_array($sql)) {
                          echo "<option value='".$data['id']."'>".$data['level']."</option>";
                          }
                        ?>  
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <div class="modal-footer">
                     <button type="submit" name="simpan" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</html>