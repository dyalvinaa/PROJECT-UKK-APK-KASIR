<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Produk</h1>
    <nav>
      <p>Berikut ini adalah Data Produk</p>
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
              <a class="btn btn-secondary" href="<?= site_url('tambah-produk'); ?>">
                <span class="text">Tambah</span>
              </a>
            </div>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>No </th>
                  <th>Kode Produk</th>
                  <th>Nama Produk</th>
                  <th>Harga Beli</th>
                  <th>Harga Jual</th>
                  <th>Satuan Produk</th>
                  <th>Kategori Produk</th>
                  <th>stok</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach ($listProduk as $row): ?>
                  <tr>
                    <td>
                      <?= $no++ ?>
                    <td>
                      <?= $row['kode_produk']; ?>
                    </td>
                    <td>
                      <?= $row['nama_produk']; ?>
                    </td>
                    <td>
                      <?= $row['harga_beli']; ?>
                    </td>
                    <td>
                      <?= $row['harga_jual']; ?>
                    </td>
                    <td>
                      <?= $row['nama_satuan']; ?>
                    </td>
                    <td>
                      <?= $row['nama_kategori']; ?>
                    </td>
                    <td>
                      <?= $row['stok']; ?>
                    </td>
                    <td>
                      <a href="<?= site_url('edit-produk/' . $row['id_produk']); ?>" class="btn btn-outline-secondary bi bi-pencil-square"></a>
                      <form action="/produk/<?= $row['id_produk']; ?>" method="POST" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-outline-danger bi-trash-fill"
                          onClick="return confirm('Apakah anda yakin?');"></button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach; ?>
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