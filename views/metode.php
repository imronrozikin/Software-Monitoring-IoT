<?php
session_start();
if(!isset($_SESSION['data'])){
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
                  <li class="breadcrumb-item active" aria-current="page">Metode</li>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">Kadar Air (-)</h5>
                      <span class="h3 font-weight-bold mb-0" id="kadar"> </span><span class="h2 font-weight-bold mb-0" >%</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green  text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap"></span>
                    <span class="text-success mr-2" ></span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
     <div class="container-fluid mt--5">
      <div class="row">

        <div class="col">
          <div class="card border-0">
           <form>
            <center><h2 >Metode Fuzzy Sugeno</h2></center>
              <hr/>
              <center><h2 >Fuzzyfikasi</h2></center>
              <br/><br/>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <center><label class="form-control-label" forNGGOTAAN="input-username">Fuzzyfikasi Suhu</label></center>
                        <hr/>
                       <center> <span>U[Dingin] = <span id="dingin"></span></span> </center>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <center><label class="form-control-label" for="input-email">Fuzzyfikasi Kelembaban</label></center>
                        <hr/>
                       <center> <span>U[Kering] = <span id="kering"></span></span> </center>
                      </div>
                    </div>
                  </div> 
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                       <center> <span>U[Hangat] = <span id="hangat"></span></span> </center>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <center> <span>U[Lembab] = <span id="lembab"></span></span> </center>
                      </div>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                       <center> <span>U[Panas] = <span id="panas"></span></span> </center>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <center> <span>U[Basah] = <span id="basah"></span></span> </center>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <center><h2>Fuzzy Rules</h2></center><br/>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group" >
                        
                        <center><span>IF Suhu Dingin AND RH Kering THEN Halogen Normal</span></center>
                        <center><span>IF Suhu Dingin AND RH Lembab THEN Halogen Terang</span></center>
                        <center><span>IF Suhu Dingin AND RH Basah THEN Halogen Sangat Terang</span></center>
                        <center><span>IF Suhu Hangat AND RH Kering THEN Halogen Redup</span></center>
                        <center><span>IF Suhu Hangat AND RH Lembab THEN Halogen Normal</span></center>
                        <center><span>IF Suhu Hangat AND RH Basah THEN Halogen Terang</span></center>
                        <center><span>IF Suhu Panas AND RH Kering THEN Halogen Sangat Redup</span></center>
                        <center><span>IF Suhu Panas AND RH Lembab THEN Halogen Redup</span></center>
                        <center><span>IF Suhu panas AND RH Basah THEN Halogen Normal</span></center>                        
                      </div>
                    </div>
                  </div>
                  
                </div>
                <hr class="my-4" />
                <!-- Description -->
                <center><h2 >Defuzzyfikasi</h2></center>
                 <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <center><label class="form-control-label" for="input-username">Output Nilai</label>
                            <br/>
                            <h4 id="metode"></h4>
                        </center>
                        <hr/>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <center><label class="form-control-label" for="input-email">Status Lampu Halogen</label>
                        <h4 id="status"></h4>
                        </center>
                        <hr/>
                      </div>
                    </div>
                  </div> 
                 </div>
                </div>
              </form>      
          </div>
        </div>
      </div>

      <?php 
        include "../include/footer.php";
      ?>
       </div>
    </div>
  </div>
  
 
</body>

</html>