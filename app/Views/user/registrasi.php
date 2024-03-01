<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="card mb-3 mt-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Buat Akun</h5>
                  </div>

                  <form class="row g-3 needs-validation" action="<?= site_url('daftar')?>" method="post">


                  <div class="col-12">
                    <label for="nama" class="form-label">Nama Pengguna</label>
                    <input type="text" name="nama_user" class="form-control" id="nama_user" required>
                    <div class="invalid-feedback">Nama Pengguna wajib diisi.</div>
                  </div>

                  <div class="col-12">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-group has-validation">
                      <input type="text" name="username" class="form-control" id="username" required>
                      <div class="invalid-feedback">Username wajib diisi.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                    <div class="invalid-feedback">Password wajib diisi</div>
                  </div>

                  <div class="col-12">
                    <label for="yourLevel" class="form-label">Level</label>
                    <select class="form-control form-control-sm" name="level" id="level">
                    <option selected>Pilih Level</option>
                      <option>Admin</option>
                      <option>Kasir</option>
                    </select>
                  </div>
</br>

                  <div class="col-12">
                    <div class="invalid-feedback">You must agree before submitting.</div>
                  </div>
                  <div class="col-12">
                    <button class="btn btn-secondary w-100" type="submit">Submit</button>
                  </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../../../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../../assets/vendor/quill/quill.min.js"></script>
  <script src="../../../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script async src='https://www.googletagmanager.com/gtag/js?id=G-P7JSYB1CSP'></script>
  <script>if (window.self == window.top) { window.dataLayer = window.dataLayer || []; function gtag() { dataLayer.push(arguments); } gtag('js', new Date()); gtag('config', 'G-P7JSYB1CSP'); } </script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
    integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
    data-cf-beacon='{"rayId":"849fbb2badf1562c","version":"2024.1.0","token":"68c5ca450bae485a842ff76066d69420"}'
    crossorigin="anonymous"></script>
</body>

</html>
<?=$this->endSection(); ?>