<div class="content" style="margin-top: 5%">
  <div class="d-flex justify-content-end">
    <button type="button" class=" button-data add" data-bs-toggle="modal" data-bs-target="#ModalAdd" data-bs-whatever="@mdo"> Create User</button>
  </div>
  <div class="table-customer">
    <table class="table" id="table">
      <thead>
        <tr>
          <th>Judul</th>
          <th>deskripsi</th>
          <th>deadline</th>
          <th>status</th>
          <th>DateTime</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($data["tugas"] as $key => $tugas) : ?>
          <tr>
            <td><?= $tugas["judul"] ?></td>
            <td><?= $tugas["deskripsi"] ?></td>
            <td><?= $tugas["deadline"] ?></td>
            <td><?= $tugas["status"] ?></td>
            <td><?= $tugas["DateTime"] ?></td>
            <td class="text-center">
              <button class="btn shadow-none btn-warning showModalUpdate enableButton" data-bs-toggle="modal" data-bs-target="#ModalUpdate" onclick="detail('<?= $tugas['id_tugas']; ?>','<?= $tugas['judul']; ?>','<?= $tugas['deskripsi']; ?>','<?= $tugas['deadline']; ?>')">
              </button>
              <a href="<?= BASEURL; ?>/manageuser/deleteUser/<?= $tugas['id_tugas']; ?>" class="btn shadow-none btn-danger" data-bs-target="#exampleModalDelete"></a>
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
          <h5 class="modal-title" id="exampleModalLabel">Create Tugas</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?= BASEURL; ?>/managetugas/addUser" method="POST">

            <div class="mb-3">
              <label for="judul" class="col-form-label">Judul</label>
              <input type="text" class="form-control shadow-none" id="judul" placeholder="username" name="judul">
            </div>
            <div class="mb-3">
              <label for="desc" class="col-form-label">Deskripsi</label>
              <textarea name="desc" id="desc"></textarea>
            </div>
            <div class="mb-3">
              <label for="deadline" class="col-form-label">deadline</label>
              <input type="date" name="deadline" id="deadline"></input>
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
          <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?= BASEURL ?>/manageuser/updateUser" method="POST">
          <div class="modal-body">
            <input type="hidden" name="id_tugasr" id="id_tugasr">
            <div class="mb-3">
              <label for="judul" class="col-form-label">Judul</label>
              <input type="text" class="form-control shadow-none" id="judul" placeholder="username" name="judul">
            </div>
            <div class="mb-3">
              <label for="desc" class="col-form-label">Deskripsi</label>
              <textarea name="desc" id="desc"></textarea>
            </div>
            <div class="mb-3">
              <label for="deadline" class="col-form-label">deadline</label>
              <input type="date" name="deadline" id="deadline"></input>
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

  function detail(id, judul, desc, deadline) {
    document.getElementById("id_tugas").setAttribute("value", id);
    document.getElementById("judul").setAttribute("value", judul);
    //document.getElementById("desc").setAttribute("value", desc);
    document.getElementById("deadline").setAttribute("value", deadline);
}
$('#update').click(function update() {
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    let role = document.getElementById("role").value;
    $.ajax({
        url: "<?= BASEURL; ?>/manageuser/updateUser",
        data: {
            username: username,
            password: password,
            role: role
        },
        method: 'POST',
        success: function (data) {
            console.log(data)
        }
    });
});
</script>