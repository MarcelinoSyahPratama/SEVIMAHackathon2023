<div class="content" style="margin-top: 5%">
  <div class="d-flex justify-content-end">
    <button type="button" class=" button-data add btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalAdd" data-bs-whatever="@mdo"> Create User</button>
  </div>
  <div class="table-customer">
    <table class="table" id="table">
      <thead>
        <tr>
          <th>username</th>
          <th>Password</th>
          <th>Role</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($data["user"] as $key => $user) : ?>
          <tr>
            <td><?= $user["Username"] ?></td>
            <td><?= $user["Password"] ?></td>
            <td><?= $user["Role"] ?></td>
            <td class="text-center">
              <a class=showModalUpdate enableButton" data-bs-toggle="modal" data-bs-target="#ModalUpdate" data-id="<?= $user['id_user']; ?>" onclick="detail(<?= $user['id_user']; ?>,'<?= $user['Username']; ?>','<?= $user['Password']; ?>','<?= $user['Role']; ?>')">
              <span class="badge bg-warning">Edit</span></a>
              <a href="<?= BASEURL; ?>/manageuser/deleteUser/<?= $user['id_user']; ?>"><span class="badge bg-danger">Hapus</span></a>
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
          <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?= BASEURL; ?>/manageuser/addUser" method="POST">

            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Usermame</label>
              <input type="text" class="form-control shadow-none" id="recipient-name" placeholder="username" name="username">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Password</label>
              <input type="text" class="form-control shadow-none" id="recipient-name" placeholder="password" name="password">
            </div>

            <div class="mb-3">
              <label for="role" class="col-form-label">Role</label>
              <select class="form-select shadow-none  " id="inputimage" aria-label="Default select example" name="role">
                <option value="murid">Murid</option>
                <option value="guru">Guru</option>
                <option value="admin">Admin</option>
              </select>
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
            <input type="hidden" name="id_user" id="id_user">
            <div class="mb-3">
              <label for="username" class="col-form-label">Usermame</label>
              <input type="text" class="form-control shadow-none" id="username" name="username" placeholder="username">
            </div>
            <div class="mb-3">
              <label for="password" class="col-form-label">Password</label>
              <input type="text" class="form-control shadow-none" id="password" name="password" placeholder="password" readonly>
            </div>
            <div class="mb-3">
              <label for="role" class="col-form-label">Role</label>
              <select class="form-select shadow-none" id="role" name="role" aria-label="Default select example" name="role">
                <option id="customer1" value="guru">Guru</option>
                <option id="admin1" value="murid">Murid</option>
                <option id="admin1" value="admin">Admin</option>
              </select>
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

  function detail(id, username, password, role) {
    document.getElementById("id_user").setAttribute("value", id);
    document.getElementById("username").setAttribute("value", username);
    document.getElementById("password").setAttribute("value", password);
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