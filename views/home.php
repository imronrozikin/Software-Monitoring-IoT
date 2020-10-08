<?php
session_start();
if(!isset($_SESSION['loginAdmin'])){
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
    include "../include/navigation.php";
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
                  <li class="breadcrumb-item active" aria-current="page">Monitoring</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <h2 style="color:white;margin-right:20px;font-family:Courier, monospace">Dashboard Pengering Kerupuk </h2>
            </div>
          </div>
          <!-- Card stats -->
          <div class="row">

            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div id="load" class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Suhu Ruangan</h5>
                      <span class="h2 font-weight-bold mb-0" id="suhu"></span><span class="h2 font-weight-bold mb-0">C</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i> 
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"></span>
                    <span class="text-nowrap"></span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Berat</h5>
                      <span class="h2 font-weight-bold mb-0" id="berat"></span><span class="h2 font-weight-bold mb-0">gram</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"></span>
                    <span class="text-nowrap"></span>
                  </p>                
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Kelembaban</h5>
                      <span class="h2 font-weight-bold mb-0" id="kelembaban"></span><span class="h2 font-weight-bold mb-0" >%</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap"></span>
                    <span class="text-success mr-2"></span>
                  </p>
                </div>
              </div>
            </div>
             <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Status Kerupuk</h5>
                      <span class="h3 font-weight-bold mb-0" id="statuskerupuk"></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap"></span>
                    <span class="text-success mr-2" ></span>
                    <input type="hidden" id="metode">
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
       <div class="col-xl-8">
          <div class="card bg-default">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                 <center> <h5  class="h3 text-white mb-0">Grafik Monitoring Suhu Alat Pengering</h5></center>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart" id="chart">
                  <!-- Chart wrapper -->
              <!--  <canvas id="chart-sales-dark" ></canvas>
               --></div>
            </div>
          </div>
        </div>
                <div class="col-xl-4">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">History</h3>
                </div>
                <div class="col text-right">
                  <a href="histori.php" class="btn btn-sm btn-primary">Lihat Semua</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Berat</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                include "../include/koneksi.php";
  
                $query = "SELECT * FROM data_sensor where id_history order by id  desc Limit 7";
                $sql = mysqli_query($connection, $query);
                while ($data = mysqli_fetch_array($sql)) {
                ?>
                   <tr>
                    <th scope="row">
                      <?php 
                       $datetime = date_create($data['tanggal']);
                       $tanggal = date_format($datetime, "d F Y H:i:s");
                       echo $tanggal; ?>
                    </th>
                    <td>
                      <?php echo $data['berat'] ?> gram
                    </td>
                   </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      
      <?php 
        include "../include/footer.php";
      ?>
      
    </div>
  </div>


  <script type = "text/javascript" > 
  history.pushState(null, null); 
  window.addEventListener('popstate', function(event) { 
    history.pushState(null, null); 
    }); 
  </script>
</body>

</html>
