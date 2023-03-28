  <!-- Modal Tambah Data
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('mahasiswa/store'); ?>">
                    <div class="form-group">
                        <label for="nama_karyawan" class="col-form-label">Nama</label>
                        <input type="text" class="form-control" id="Nama" name="Nama">
                    </div>
                    <div class="form-group">
                        <label for="usia" class="col-form-label">NIM</label>
                        <input type="text" class="form-control" id="NIM" name="NIM">
                    </div>
                    <div class="form-group">
                        <label for="usia" class="col-form-label">Umur</label>
                        <input type="text" class="form-control" id="Umur" name="Umur">
                    </div>
            </div>
            <div class="modal-footer">
                <a href="<?= base_url('/mahasiswa') ?>">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div> -->

<tr align="center">
      <td colspan="5">

          <form action="<?= base_url('mahasiswa/store'); ?>" method="post">
              <table>
                  <tr>
                      <td colspan="2">
                          <?php if (session()->getFlashdata('msg')) : ?>
                              <label style="color: red;"> <?= session()->getFlashdata('msg') ?> </label>
                          <?php endif; ?>
                      </td>
                  </tr>
                  <tr>
                      <td>Nama</td>
                      <td><input type="text" name="nama" value="<?= old('nama') ?>"></td>
                  </tr>
                  <tr>
                      <td>NIM</td>
                      <td><input type="number" name="nim" value="<?= old('nim') ?>"></td>
                  </tr>
                  <tr>
                      <td>Umur</td>
                      <td><input type="number" name="umur" value="<?= old('umur') ?>"></td>
                  </tr>
                  <tr>
                      <td><a href="<?= base_url('/mahasiswa') ?>">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                          </a>
                      </td>
                      <td><input type="submit" value="Simpan"></td>
                  </tr>
              </table>
          </form>

      </td>
  </tr>