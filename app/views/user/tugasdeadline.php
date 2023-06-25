<div class="content" style="margin-top: 5%">
  <div class="table-customer">
    <table class="table" id="table">
      <thead>
        <tr>
          <th>Judul</th>
          <th>deskripsi</th>
          <th>deadline</th>
          <th>Tanggal Upload</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($data["tugas"] as $key => $tugas) : ?>
          <tr>
            <td><?= $tugas["judul"] ?></td>
            <td><?= $tugas["deskripsi"] ?></td>
            <td><?= $tugas["deadline"] ?></td>
            <td><?= $tugas["DateTime"] ?></td>
            <td class="text-center">
              <a href="#"><span class="badge bg-danger">Hubungi Guru</span></a>
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