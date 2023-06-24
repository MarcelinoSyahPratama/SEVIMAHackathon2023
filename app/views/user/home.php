<div class="content" style="margin-top: 5%">
  <div class="d-flex justify-content-end">
    <button type="button" class=" button-data add" data-bs-toggle="modal" data-bs-target="#ModalAdd" data-bs-whatever="@mdo"> Gabung Kelas</button>
  </div>
  <div class="table-customer">
    <table class="table" id="table">
      <thead>
        <tr>
          <th>nama Kelas</th>
          <th>Nama Guru</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($data["kelas"] as $key => $kelas) : ?>
          <tr>
            <td><?= $kelas["nama"] ?></td>
            <td><?= $kelas["Username"] ?></td>
            <td class="text-center">
              <a href="<?= BASEURL; ?>/listtugas/index/<?= $kelas['id_kelas']; ?>"><span class="badge bg-danger">Belum Selesai</span></a>
              <a href="<?= BASEURL; ?>/tugasselesai/index/<?= $kelas['id_kelas']; ?>"><span class="badge bg-success">Selesai</span></a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>

</div>


<div class="modal fade" id="ModalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"Gabung</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?= BASEURL; ?>/Home/joinkelas" method="POST">

            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Kode Kelas</label>
              <input type="text" class="form-control shadow-none" id="recipient-name" placeholder="Kode Kelas" name="KodeKelas">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn shadow-none btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn shadow-none btn-success">Create</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function(){
      $('#table').DataTable();
  });
</script>