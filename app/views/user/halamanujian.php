<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/ujian.css" />
    <script src="https://kit.fontawesome.com/66d4c07337.js" crossorigin="anonymous"></script>
    <title>Document</title>
  </head>

  <style>
    .selected {
      background-color: lightgray;
    }
  </style>
  <body>
    <div class="" style="border:2px solid black;width:70%;margin-left:15%;margin-right:15%;">
    <center><h3>Selemat Mengerjakan Ujian Dengan Jujur</h3></center>
        <form name="ujian" method="post" action="<?= BASEURL ?>/halamanujian/Nilai">
            <?php $n=0; ?>
            <p><input type="text" name="jmlsoal" value="<?= $data['jumlahUser']["total_count"] ?>" hidden></p>
            <?php foreach($data["soal"] as $key => $value) : ?>
            <div class="soal">
                <div class="jwb">
                    <?php $n++; ?>
                    <p><?= $value["soal"] ?></p>
                    <p><input type="text" name="soal<?= $n ?>" value="<?= $value['id_soal'] ?>" hidden></p>
                    <p><input type="text" name="idtugas" value="<?= $value['id_tugas'] ?>" hidden></p>
                    <p><input type="radio" id="A" name="jawab<?= $n ?>" value="a"> A.<?= $value["a"] ?></p>
                    <p><input type="radio" id="B" name="jawab<?= $n ?>" value="b"> B.<?= $value["b"] ?></p>
                    <p><input type="radio" id="C" name="jawab<?= $n ?>" value="c"> C.<?= $value["c"] ?></p>
                    <p><input type="radio" id="D" name="jawab<?= $n ?>" value="d"> D.<?= $value["d"] ?></p>
                </div>
            </div>
            <?php endforeach; ?>
            <button type="submit" name="kirim">Kirim</button>
        </form>
    </div>
  </body>
</html>
