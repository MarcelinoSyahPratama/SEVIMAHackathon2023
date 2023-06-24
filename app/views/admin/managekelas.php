<div class="content" style="margin-top: 5%">
  <div class="d-flex justify-content-end">
    <button type="button" class=" button-data add" data-bs-toggle="modal" data-bs-target="#ModalAdd" data-bs-whatever="@mdo"> Create User</button>
  </div>
  <div class="table-customer">
    <table class="table" id="table">
      <thead>
        <tr>
          <th>Nama</th>
          <th>KodeKelas</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($data["kelas"] as $key => $kelas) : ?>
          <tr>
            <td><?= $kelas["nama"] ?></td>
            <td><?= $kelas["kode"] ?></td>
            <td class="text-center">
              <button class="btn shadow-none btn-warning showModalUpdate enableButton" data-bs-toggle="modal" data-bs-target="#ModalUpdate" data-id="<?= $kelas['id_kelas']; ?>" onclick="detail(<?= $kelas['id_kelas']; ?>,'<?= $kelas['nama']; ?>')">
              </button>
              <a href="<?= BASEURL; ?>/managekelas/deleteKelas/<?= $kelas['id_kelas']; ?>" class="btn shadow-none btn-danger" data-bs-target="#exampleModalDelete"></a>
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
          <h5 class="modal-title" id="exampleModalLabel">Create Kelas</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?= BASEURL; ?>/managekelas/addKelas" method="POST">

            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Nama Kelas</label>
              <input type="text" class="form-control shadow-none" id="recipient-name" placeholder="Nama Kelas" name="namakelas">
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
<div class="modal fade" id="ModalUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Kelas</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?= BASEURL ?>/managekelas/updateKelas" method="POST">
          <div class="modal-body">
            <input type="hidden" name="id_kelas" id="id_kelas">
            <div class="mb-3">
              <label for="kelas" class="col-form-label">Nama Kelas</label>
              <input type="text" class="form-control shadow-none" id="kelas" name="kelas" placeholder="kelas">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn shadow-none btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn shadow-none btn-warning" id="update">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
      $('#table').DataTable();
  });

  function detail(id,nama) {
    document.getElementById("id_kelas").setAttribute("value", id);
    document.getElementById("kelas").setAttribute("value", nama);
}
$('#update').click(function update() {
    let id_kelas = document.getElementById("id_kelas").value;
    let kelas = document.getElementById("kelas").value;
    $.ajax({
        url: "<?= BASEURL; ?>/managekelas/updateKelas",
        data: {
            id_kelas: id_kelas,
            kelas: kelas
        },
        method: 'POST',
        success: function (data) {
            console.log(data)
        }
    });
});
</script>