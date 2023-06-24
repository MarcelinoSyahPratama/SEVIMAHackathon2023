<div class="content" style="margin-top: 5%">
  <div class="table-customer">
    <table class="table" id="table">
      <thead>
        <tr>
          <th>Judul</th>
          <th>deskripsi</th>
          <th>deadline</th>
          <th>Tanggal Upload</th>
          <th>Nilai</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($data["nilai"] as $key => $tugas) : ?>
          <tr>
            <td><?= $tugas["judul"] ?></td>
            <td><?= $tugas["deskripsi"] ?></td>
            <td><?= $tugas["deadline"] ?></td>
            <td><?= $tugas["DateTime"] ?></td>
            <td><?= $tugas["nilai"] ?></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>

</div>
<script>
    $(document).ready(function(){
      $('#table').DataTable();
  });
</script>