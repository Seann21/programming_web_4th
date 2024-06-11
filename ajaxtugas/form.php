<?php
    require 'class_db.php';
    $db = new database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
    <form name="addForm" method="post" action="proc.php">
        <select name="propinsi_id" id="propinsi_id">
            <option selected>Pilih Propinsi</option>
            <?php
            $sql = "SELECT * FROM propinsi ORDER BY nama";
            $data = $db->fetchdata($sql);
            foreach ($data as $dat) {
                echo "<option value='" . $dat['id'] . "'>" . $dat['nama'] . "</option>";
            }
            ?>
        </select>
        <select name="kabupaten_id" id="kabupaten_id">
            <option selected>Pilih Kabupaten</option>
        </select>
        <select name="kecamatan_id" id="kecamatan_id">
            <option selected>Pilih Kecamatan</option>
        </select>
        <select name="desa_id" id="desa_id">
            <option selected>Pilih Desa</option>
        </select>
    </form>

    <script>
        $(document).ready(function () {
            $('#propinsi_id').change(function () {
                let prop = $('#propinsi_id').val();
                $.ajax({
                    type: "POST",
                    url: "proc.php",
                    data: { jenis: 'kab', prop: prop },
                    success: function (res) {
                        $('#kabupaten_id').html(res);
                        $('#kecamatan_id').html('<option selected>Pilih Kecamatan</option>');
                        $('#desa_id').html('<option selected>Pilih Desa</option>');
                    }
                });
            });

            $('#kabupaten_id').change(function () {
                let kab = $('#kabupaten_id').val();
                $.ajax({
                    type: "POST",
                    url: "proc.php",
                    data: { jenis: 'kec', kab: kab },
                    success: function (res) {
                        $('#kecamatan_id').html(res);
                        $('#desa_id').html('<option selected>Pilih Desa</option>');
                    }
                });
            });

            $('#kecamatan_id').change(function () {
                let kec = $('#kecamatan_id').val();
                $.ajax({
                    type: "POST",
                    url: "proc.php",
                    data: { jenis: 'desa', kec: kec },
                    success: function (res) {
                        $('#desa_id').html(res);
                    }
                });
            });
        });
    </script>
</body>
</html>
