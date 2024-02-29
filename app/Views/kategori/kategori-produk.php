<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Kategori Produk</h1>
    <nav>
      <p>Berikut ini adalah Data Kategori Produk</p>
    </nav>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
          <div class="mt-4 col">
          <?php if (session()->getFlashdata('pesan')): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <?= session()->getFlashdata('pesan'); ?>
              </div>
            <?php endif ?>
          </div>

            <div class="mt-4 col-3">
              <a class="btn btn-primary" href="/tambah-kategori">
                <span class="text">Tambah</span>
              </a>
            </div>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kategori Produk</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach ($listKategori as $row): ?>
                  <tr>
                    <td>
                      <?= $no++ ?>
                    <td>
                      <?= $row['nama_kategori']; ?>
                    </td>
                    <td>
                      <a href=<?=site_url('/edit-kategori/'.$row['id_kategori']); ?>><i class="btn btn-primary bi bi-pencil-square"></i></a>
                     
                      <form action="<?= site_url('hapus-kategori/' . $row['id_kategori']); ?>" method="post" class="d-inline">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-danger bi-trash-fill"
                          onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" id="hapusKategori"
                          data-id="<?= $row['id_kategori']; ?>"></button>
                      </form>
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