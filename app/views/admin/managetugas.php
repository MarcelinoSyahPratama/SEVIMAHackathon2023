<div class="content" style="margin-top: 5%">
  <div class="d-flex justify-content-end">
    <button type="button" class=" button-data add btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalAdd" data-bs-whatever="@mdo"> Create Tugas</button>
    <button class=" button-data add btn btn-primary" href="https://drive.google.com/u/0/uc?id=1K4v9UwV2XECwx4JNnxZ7p8sbdgwZWAM_&export=download"> Download PDF</button><br />
  </div>
  <div class="table-customer">
    <table class="table1" id="table1">
      <thead>
        <tr>
          <th>Kode Kelas</th>
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
            <td><?= $tugas["kode"] ?></td>
            <td><?= $tugas["judul"] ?></td>
            <td><?= $tugas["deskripsi"] ?></td>
            <td><?= $tugas["deadline"] ?></td>
            <td><?= $tugas["status"] ?></td>
            <td><?= $tugas["DateTime"] ?></td>
            <td class="text-center">
              <a href="<?= BASEURL; ?>/nilaisiswa/index/<?= $tugas['id_tugas']; ?>"><span class="badge bg-success">Nilai Siswa</span></a>
              <a href="<?= BASEURL; ?>/halamanujian/index/<?= $tugas['id_tugas']; ?>"><span class="badge bg-success">Halaman Ujian</span></a>
              <a class="showModalUpdate enableButton" data-bs-toggle="modal" data-bs-target="#ModalUpload" onclick="upload('<?= $tugas['id_tugas']; ?>')">
              <span class="badge bg-primary">Upload File</span></a>
              <a class="showModalUpdate enableButton" data-bs-toggle="modal" data-bs-target="#ModalUpdate" onclick="detail('<?= $tugas['id_tugas']; ?>','<?= $tugas['judul']; ?>','<?= $tugas['deskripsi']; ?>','<?= $tugas['deadline']; ?>')">
              <span class="badge bg-warning">Edit</span></a>
              <a href="<?= BASEURL; ?>/managetugas/deleteTugas/<?= $tugas['id_tugas']; ?>"data-bs-target="#exampleModalDelete"><span class="badge bg-danger">Hapus</span></a>
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
          <form action="<?= BASEURL; ?>/managetugas/addTugas" method="POST">
            <div class="mb-3">
              <label for="desc" class="col-form-label">Kelas</label>
              <select class="form-select form-select-sm" name="kelas" aria-label=".form-select-sm example">
                <?php foreach($data["kelas"] as $key => $kelas) : ?>
                <option value="<?= $kelas["id_kelas"] ?>"><?= $kelas["nama"] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="judul" class="col-form-label">Judul</label>
              <input type="text" class="form-control shadow-none" id="judul" placeholder="Judul" name="judul">
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
        <form action="<?= BASEURL ?>/managetugas/updateTugas" method="POST">
          <div class="modal-body">
            <input type="hidden" name="id_tugas" id="id_tugas1">
            <div class="mb-3">
              <label for="judul" class="col-form-label">Judul</label>
              <input type="text" class="form-control shadow-none" id="judul1" placeholder="judul" name="judul">
            </div>
            <div class="mb-3">
              <label for="desc" class="col-form-label">Deskripsi</label>
              <textarea name="desc" id="desc1"></textarea>
            </div>
            <div class="mb-3">
              <label for="deadline" class="col-form-label">deadline</label>
              <input type="date" name="deadline" id="deadline1"></input>
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
<div class="modal fade" id="ModalUpload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload Soal</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?= BASEURL ?>/managetugas/uploadfile" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" name="id_tugas" id="id_tugas2">
            <div class="mb-3">
            <label for="filesoal" class="form-label">Upload File Excel Disini</label>
            <input class="form-control" type="file" id="filesoal" name="filesoal">
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn shadow-none btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn shadow-none btn-warning" id="upload">upload</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
      $('#table1').DataTable();
  });
  function upload(id) {
    document.getElementById("id_tugas2").setAttribute("value", id);
  }
  function detail(id, judul, desc, deadline) {
    document.getElementById("id_tugas1").setAttribute("value", id);
    document.getElementById("judul1").setAttribute("value", judul);
    document.getElementById("desc1").innerHTML = desc.replace('<br />', '\n');
    document.getElementById("deadline1").setAttribute("value", deadline);
}
$('#update').click(function update() {
    let id_tugas = document.getElementById("id_tugas1").value;
    let judul = document.getElementById("judul1").value;
    let desc = document.getElementById("desc1").value;
    let deadline = document.getElementById("deadline1").value;
    $.ajax({
        url: "<?= BASEURL; ?>/managetugas/updateTugas",
        data: {
          id_tugas: id_tugas,
          judul: judul,
          desc: desc,
          deadline: deadline,
        },
        method: 'POST',
        success: function (data) {
            console.log(data)
        }
    });
});
</script>