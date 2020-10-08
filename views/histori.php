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
                  <li class="breadcrumb-item active" aria-current="page">Histori</li>
                  </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <h2 style="color:white;margin-right:20px;font-family:Courier, monospace">Dashboard Pengering Kerupuk </h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col bg-default shadow">
          <div class="card bg-default shadow">
            <!-- Card header -->
            <div class="card-header bg-transparent border-0"">
              <h3 class="text-white mb-0">Daftar Histori</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">ID History</th>
                    <th scope="col" class="sort" data-sort="name">Tanggal</th>
                    <th scope="col" class="sort" data-sort="budget">Berat Kerupuk</th>
                  </tr>
                </thead>
                <tbody class="list">
                <?php 
                  include "../include/koneksi.php";
                  
                  $result = mysqli_query($connection, "SELECT * FROM data_sensor where id_history order by id  desc");
                  $total = mysqli_num_rows($result);
                  $halaman = 5;
                  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                  $pages = ceil($total/$halaman);
                  $rs = mysqli_query($connection, "SELECT * FROM data_sensor where id_history order by id  desc LIMIT $mulai, $halaman"); 
                
                  $no = $mulai+1;
                  $data = mysqli_num_rows($rs);

                    if($data==0){
                  ?>

                <?php } else { ?>
                
                <?php while($row=mysqli_fetch_assoc($rs)) {?>
                  <tr>
                    <th scope="row">
                      <span class="badge badge-dot mr-4">
                        <span class="status"><?php echo $row['id_history']; ?></span>
                      </span>
                    </th>
                    <td >
                      <?php
                      $datetime = date_create($row['tanggal']);
                      $tanggal = date_format($datetime, "d F Y H:i:s");
                      echo $tanggal;
                      ?>
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <span class="status"><?php echo $row['berat']; ?> gram</span>
                      </span>
                    </td>
                   </tr>
                 <?php } ?>
                </tbody>
              </table>
            </div>
            

            <?php 
             if($data!=0){ 
            ?>
            <div class="card-footer py-4 bg-default shadow">
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

</body>

</html>