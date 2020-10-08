<div id="logout" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="/action_page.php">
    <div class="container">
      <h1>Delete Account</h1>
      <p>Are you sure you want to delete your account?</p>

      <div class="clearfix">
        <button type="button" class="cancelbtn">Cancel</button>
        <button type="button" class="deletebtn">Delete</button>
      </div>
    </div>
  </form>
</div>

<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <div class="sidenav-header  align-items-center">
        <div class="sidenav-header  align-items-center">
        <li class="nav-item dropdown">
          <a class="navbar-brand" href="../views/profile.php">
            <?php 
              include "../include/koneksi.php";
              $no = $_SESSION['noLogin'];
              $sql = mysqli_query($connection, "SELECT * FROM user WHERE No='$no'");
              while ($row = mysqli_fetch_array($sql)) { ?>
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <?php echo  "<img alt='Image placeholder' src='../assets/img/user/".$row['foto']."'>"?>
              </span>
              <div class="media-body  ml-2  d-none d-lg-block">
                <span class="mb-0 text-sm  font-weight-bold"><?php echo $row['nama']; ?></span>
              </div>
            </div>
            <?php } ?>
          </a>
        </li>
      </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="../views/home.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Monitoring</span>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="../views/metode.php">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Metode</span>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="../views/histori.php">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Histori</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../views/user.php">
                <i class="ni ni-circle-08 text-pink"></i>
                <span class="nav-link-text">Pengguna</span>
              </a>
            </li>
            
             <li class="nav-item">
              <a class="nav-link logout-btn" href="../auth/logout.php" >
                <i class="ni ni-button-power text-danger"></i>
                <span class="nav-link-text">Keluar</span>
              </a>
            </li>
            
          </ul>
        </div>
      </div>
    </div>
  </nav>
