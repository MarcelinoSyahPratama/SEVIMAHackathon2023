<div class="content" style="margin-top: 5%">
  <div class="table-customer">
    <table class="table" id="table">
      <thead>
        <tr>
          <th>Nama Siswa</th>
          <th>Tanggal Gabung</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($data["siswa"] as $key => $tugas) : ?>
          <tr>
            <td><?= $tugas["Username"] ?></td>
            <td><?= $tugas["DateTime"] ?></td>
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