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
    <div class="line mt-3 mb-1"></div>
    <form name="ujian" method="post" action="<?= BASEURL ?>/HalamanUjian/Nilai">
        <?php foreach($data["soal"] as $key => $value) : ?>
        <div class="soal">
            <div class="jwb">
                <p><?= $value["soal"] ?></p>
                <p><input type="text" name="soal<?= $value['id_soal'] ?>" value="<?= $value['id_soal'] ?>" hidden></p>
                <p><input type="radio" id="A" name="jawab<?= $value['id_soal'] ?>" value="<?= $value["a"] ?>"> A.<?= $value["a"] ?></p>
                <p><input type="radio" id="B" name="jawab<?= $value['id_soal'] ?>" value="<?= $value["b"] ?>"> B.<?= $value["b"] ?></p>
                <p><input type="radio" id="C" name="jawab<?= $value['id_soal'] ?>" value="<?= $value["c"] ?>"> C.<?= $value["c"] ?></p>
                <p><input type="radio" id="D" name="jawab<?= $value['id_soal'] ?>" value="<?= $value["d"] ?>"> D.<?= $value["d"] ?></p>
            </div>
        </div>
        <?php endforeach; ?>
        <button type="submit" name="kirim">Kirim</button>
    </form>
  </body>
</html>
