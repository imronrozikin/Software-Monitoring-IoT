      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Skripsi Polinema</a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="#panduan" data-toggle="modal">Panduan</a>
              </li> 
            </ul>
          </div>
        </div>
      </footer>
      <div class="modal fade" id="panduan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Panduan Pengguna</h5 >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card card-primary">
              
             <form action="../auth/prosesUser.php" method="post" >
                <div class="pl-lg-4">

                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username"><h3 >Menu Monitoring</h3></label>
                        <h5 style="text-align:justify">Menu monitoring yang berada pada menu utama merupakan menu untuk memantau keadaan pada ruangan pengering kerupuk. Menu ini berisi data-data seperti suhu ruangan pengering, berat kerupuk, status pemanas, grafik suhu, dan histori terbaru.</h5>
                      </div>
                      <hr class="my-4" />
                      <div class="form-group">
                        <label class="form-control-label" for="input-username"><h3 >Menu Metode</h3></label>
                        <h5 style="text-align:justify">Menu metode merupakan menu untuk mengetahui alur pemrosesan data suhu pada metode fuzzy sugeno. Pada menu ini juga ditampilan informasi data seperti, suhu, berat, status pemanas, dan output metode</h5>
                      </div>
                      <hr class="my-4" />
                      <div class="form-group">
                        <label class="form-control-label" for="input-username"><h3 >Menu Histori</h3></label>
                        <h5 style="text-align:justify">Pada menu histori pengguna dapat melihat seluruh histori dari pemakaian alat pengering kerupuk ini tetapi pengeringan kerupuk akan tersimpan pada histori apabila pengguna menggunakan dashboard pengering kerupuk untuk memonitoring dan sebagainya.</h5>
                      </div>
                      <hr class="my-4" />
                      <div class="form-group">
                        <label class="form-control-label" for="input-username"><h3 >Menu Pengguna</h3></label>
                        <h5 style="text-align:justify">Menu pengguna adalah menu untuk menampilkan pengguna yang dapat mengakses dashboard pengering kerupuk. Pada daftar pengguna terdapat dua akses yaitu admin dan user dimana admin dapat menginputkan pengguna, menonaktifkan/mengkatifkan pengguna, dan menghapus pengguna</h5>
                      </div>
                      <hr class="my-4" />
                      <div class="form-group">
                        <label class="form-control-label" for="input-username"><h3 >Menu Profil</h3></label>
                        <h5 style="text-align:justify">Menu profile berada pada kanan atas tampilan dashboard pengering kerupuk. Pada menu ini pengguna dapat merubah password dan mengedit profil seperti nama, foto, alamat, dan nomer handphone pengguna</h5>
                      </div>
                      <hr class="my-4" />
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="../assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="../assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
  <script src="../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/mdb.min.js"></script>
  <script src="../assets/js/plotly.min.js"></script>
  <script src="../assets/js/components/jquery.min.js" type="text/javascript"></script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
  
  <script type="text/javascript" src="../assets/js/berat.js"></script>
  <script type="text/javascript" src="../assets/js/chart.js"></script>
  <script type="text/javascript" src="../assets/js/metode.js"></script>
  <script type="text/javascript" src="../assets/js/kadarAir.js"></script>
  <script type="text/javascript" src="../assets/js/fuzzyfikasiKering.js"></script>
  <script type="text/javascript" src="../assets/js/fuzzyfikasiLembab.js"></script>
  <script type="text/javascript" src="../assets/js/fuzzyfikasiBasah.js"></script>
  <script type="text/javascript" src="../assets/js/fuzzyfikasiDingin.js"></script>
  <script type="text/javascript" src="../assets/js/fuzzyfikasiHangat.js"></script>
  <script type="text/javascript" src="../assets/js/fuzzyfikasiPanas.js"></script>
  <script type="text/javascript" src="../assets/js/status.js"></script>
  <script type="text/javascript" src="../assets/js/statusKerupuk.js"></script>
  <script type="text/javascript" src="../assets/js/kelembaban.js"></script>

  <script type="text/javascript">
    $('.del-btn').on('click', function(e){
      e.preventDefault();
      const href = $(this).attr('href')
      Swal.fire({
        title: 'Anda Yakin?',
        text: "Anda akan menghapus akun ini!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus'
      }).then((result) => {
      if (result.value) {
          document.location.href = href;
        }
      })
    })

    $('.logout-btn').on('click', function(e){
      e.preventDefault();
      const href = $(this).attr('href')
      Swal.fire({
        title: 'Anda Yakin?',
        text: "Anda akan keluar dari halaman ini!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Keluar'
      }).then((result) => {
      if (result.value) {
          document.location.href = href;
        }
      })
    })    
    
    const flashdata = $('.flash-data').data('flashdata')
    if(flashdata){
      Swal.fire({
        type: 'success',
        title: 'Berhasil',
        text: 'Akun Berhasil Dihapus'
      })
    }

    const flashdata1 = $('.flash-tambah').data('flashdata1')
    if(flashdata1){
      Swal.fire({
        type: 'success',
        title: 'Berhasil',
        text: 'Akun Berhasil Disimpan'
      })
    }

  </script>