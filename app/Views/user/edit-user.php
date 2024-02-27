<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

  <section class="section">
    <div class="col-lg-6">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Edit Data User</h5>

          <form class="col-12 row g-3" action="<?= site_url('perbarui-user') ?>" method="post">
            <? csrf_field(); ?>
            <input type="hidden" name="id_user" value="<?= $listUser['id_user']; ?>">
            <div class="col-md-12">
              <div class="form-floating">
                <input type="text" class="form-control" id="nama_user" name="nama_user"
                  value="<?= $listUser['nama_user']; ?>">
                <label for="nama_user">Nama Lengkap</label>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-floating">
                <input type="text" class="form-control" id="username" name="username"
                  value="<?= $listUser['username']; ?>">
                <label for="nama">Username</label>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-floating">
                <input type="text" class="form-control" id="password" name="password"
                  value="<?= $listUser['password']; ?>">
                <label for="nama">Password</label>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-floating mb-3">
                <select class="form-select" id="floatingSelect" aria-label="State" name="level"
                  value="<?= $listUser['level']; ?>">
                  <option value="">--Pilih--</option>
                  <?php foreach ($enumValues as $value) : ?>
                    <option value="<?= $value ?>" <?= ($value == old('level')) ? 'selected' : '' ?> 
                    <?= ($value == $listUser['level']) ? 'selected' : '' ?>><?= $value ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="nama">Level</label>
              </div>
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </div>
      </div>
      </form><!-- End Horizontal Form -->
</main>
<?= $this->endSection(); ?>