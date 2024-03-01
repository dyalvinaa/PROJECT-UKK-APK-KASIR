<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Pengguna</h1>
    <nav>
      <p>Berikut ini adalah Data Pengguna Aplikasi Yo Mart</p>
    </nav>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="mt-4 col-3">
            <?php if (session()->getFlashdata('pesan')): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <?= session()->getFlashdata('pesan'); ?>
              </div>
            <?php endif ?>
              <a class="btn btn-secondary" href="<?=site_url('daftar');?>">
                <span class="text">Tambah</span>
              </a>
            </div>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama User</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Level</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach ($listUser as $row): ?>
                  <tr>
                    <td>
                      <?= $no++ ?>
                    <td>
                      <?= $row['nama_user']; ?>
                    </td>
                    <td>
                      <?= $row['username']; ?>
                    </td>
                    <td>
                      <?= $row['password']; ?>
                    </td>
                    <td>
                      <?= $row['level']; ?>
                    </td>
                    <td>
                      <a href=<?=site_url('/edit-user/'.$row['id_user']); ?>><i class="btn btn-outline-secondary bi bi-pencil-square"></i></a>
                      <a href=<?=site_url('/hapus-user/'.$row['id_user']); ?>><i class="btn btn-outline-danger bi-trash-fill"></i></a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tr>
              </tbody>
            </table>
            <!-- End Table with stripped rows -->
          </div>
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->
<?= $this->endSection(); ?>