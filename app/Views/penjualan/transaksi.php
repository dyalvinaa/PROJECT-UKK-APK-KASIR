<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Transaksi</h1>
  </div>
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
          <h1 class="card-title">Penjualan</h1>
            <div class="mt-2  col">
            </div>
            <form ation="<?= site_url('transaksi-penjualan'); ?>" class="row g-3" method="POST">
              <div class="col-md-3">
                <div class="form-floating">
                  <input type="text" class="form-control" id="floatingName" name="no_faktur" value="<?= $noFaktur; ?>"disabled>
                  <input type="hidden" class="form-control" id="floatingName" name="no_faktur" value="<?= $noFaktur; ?>" >
                  <label for="floatingName">No. Faktur </label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-floating">
                  <input type="text" class="form-control" id="floatingName" name="tanggal"
                    value="<?php echo date("d-m-Y"); ?>" disabled>
                  <label for="floatingName">Tanggal</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-floating">
                <input type="text" class="form-control" id="floatingName" name="waktu" value="<?php 
                      date_default_timezone_set('Asia/Jakarta');
                      echo date(" H:i:s "); ?>"disabled>
                  <input type="hidden" class="form-control" id="floatingName" name="waktu" value="<?php 
                      date_default_timezone_set('Asia/Jakarta');
                      echo date(" H:i:s "); ?>">
                  <label for="floatingName">Waktu</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-floating">
                  <input type="text" class="form-control" id="floatingName" name="kasir"
                    value="<?= session()->get('nama_user'); ?>" disabled>
                  <label for="floatingName">Kasir</label>
                </div>
              </div>
              <div class="col-md-7">
                <div class="form-floating">
                  <label for="floatingName"></label>
                  <select class="js-example-basic-multiple form-select" name="id_produk">
                    <?php if (isset($produkList)):
                      foreach ($produkList as $row): ?>
                        <option value="<?= $row->id_produk; ?>">
                          <?= $row->nama_produk; ?> |
                          <?= $row->stok; ?> |
                          <?= number_format($row->harga_jual, 0, ',', '.'); ?>
                        </option>
                        <?php
                      endforeach;
                    endif; ?>
                  </select>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-floating">
                  <input type="text" class="form-control" name="txtqty">
                  <label for="floatingName">Jumlah Produk</label>
                </div>
              </div>
              <div class="text-end">
                <button type="submit" class="btn sm btn-success"><i class="bi bi-cart-fill"></i></button>
              </div>

              <div class="col-md-6">
                <table class="table table-sm table-striped table-bordered text-center">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Produk</th>
                      <th>Qty</th>
                      <th>Total</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (isset($detailPenjualan) && !empty($detailPenjualan)):
                      $no = 1;
                      foreach ($detailPenjualan as $detail): ?>

                        <tr>
                          <td>
                            <?= $no++; ?>
                          </td>
                          <td>
                            <?= $detail['nama_produk']; ?>
                          </td>
                          <td>
                            <?= $detail['qty']; ?>
                          </td>
                          <td>
                            <?= number_format($detail['total_harga'], 0, ',', '.'); ?>
                          </td>
                          <td>
                          <form action="<?= site_url('hapus-produk/' . $detail['id_detail']); ?>" method="post" class="d-inline">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn bi-trash-fill"
                          onclick="return confirm('Apakah Anda yakin?')"></button>
                          </td>
                        </tr>

                      <?php endforeach;
                    else: ?>
                      <tr>
                        <td colspan="4">Tidak ada produk</td>
                      </tr>

                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card md-12">
      <div class="card-body">
        <h1 class="card-title">Pembayaran</h1>
        <div class="row g-3">
          <div class="col-md-3">
            <div class="form-floating">
              <input type="text" class="form-control" value="<?= number_format($totalHarga, 0, ',', '.'); ?>" id="total" name="total">
              <label for="floatingName">Total </label>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-floating">
              <input type="text" class="form-control " id="txtbayar" name="txtbayar">
              <label for="floatingName">Bayar </label>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-floating">
              <input type="text" class="form-control" id="kembali" name="kembali">
              <label for="floatingName">Kembali </label>
            </div>
          </div>
          <div class="text-end">
                <a button type="submit" class="btn sm btn-success" href="<?=site_url('pembayaran')?>" >Simpan</a>
              </div>
        </div>
      </div>
    </div>

  </section>
</main><!-- End #main -->

<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Ambil elemen-elemen yang diperlukan
    var txtBayar = document.getElementById('txtbayar');
    var kembali = document.getElementById('kembali');
    var totalHarga = <?= $totalHarga ?>; // Ambil total harga dari controller dan diteruskan ke view

    // Tambahkan event listener untuk memantau perubahan pada input bayar
    txtBayar.addEventListener('input', function () {
      // Ambil nilai yang dibayarkan
      var bayar = parseFloat(txtBayar.value);

      // Hitung kembaliannya
      var kembalian = bayar - totalHarga;

      // Tampilkan kembaliannya pada input kembali
      if (kembalian >= 0) {
        kembali.value = kembalian.toFixed(2).replace(/(\.00)+$/, ''); // Menampilkan hingga 2 digit desimal
      } else {
        kembali.value = '0'; // Jika kembalian negatif, tampilkan '0.00'
      }
    });
  });
</script>

<?= $this->endSection(); ?>