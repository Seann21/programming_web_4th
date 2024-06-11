<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konversi Nilai PHP | Hs Code</title>
    <link rel="icon" href="favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body{
            background-image: url('books.jpg');
            background-position: center;
            background-size: cover;
        }

        .form-container{
            max-width: 50%;
            min-height: 50%;
            height: 70vh;
            margin: 0 auto;
            padding: 50px;
            background-color: transparent;
            border-radius: 10px;
            box-shadow: 6px 0px 9px 2px rgba(81, 34, 128, 0.95);
            font-family: cursive;
            font-weight: bold;
            font-size: 1.1rem;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <div class="form-container">
                <h2 class="text-center mb-4">Konversi Nilai</h2>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
            <div class="form-group">
                <label for="nilai_angka">Nilai Angka</label>
                <input type="number" class="form-control" id="nilai_angka" name="nilai_angka" required>
            </div>
            <div class="form-group">
                <label for="nilai_huruf">Nilai Huruf</label>
                <input type="text" class="form-control" id="nilai_huruf" name="nilai_huruf" readonly>
            </div>
            <button type="submit" class="btn btn-success btn-block">Konversi</button>
            </form>
            <p class="text-center mt-5 blockquote-footer ">Develop &#9982; with Hasan.</p>
        </div>
    </div>    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <?php 
     if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $nilai_angka = $_POST["nilai_angka"];

        if ($nilai_angka >= 86 && $nilai_angka <= 100){
            $nilai_huruf = 'A';
        } elseif ($nilai_angka >= 80 && $nilai_angka <= 85){
            $nilai_huruf  = 'A-';
        } elseif ($nilai_angka >=75 && $nilai_angka <= 79){
            $nilai_huruf  = 'B+';
        } elseif ($nilai_angka >=70 && $nilai_angka <= 74){
            $nilai_huruf  = 'B';
        } elseif ($nilai_angka >=66 && $nilai_angka <= 69){
            $nilai_huruf  = 'B-';
        } elseif ($nilai_angka >=61 && $nilai_angka <=65){
            $nilai_huruf  = 'C+';
        } elseif ($nilai_angka >=56 && $nilai_angka <=60){
            $nilai_huruf  = 'C';
        } elseif ($nilai_angka >=41 && $nilai_angka <=55){
            $nilai_huruf  = 'D';
        } elseif ($nilai_angka >=0 && $nilai_angka <=40){
            $nilai_huruf = 'E';
        } else {
            $nilai_huruf = 'Nilai tidak ada';
        }
        echo '<script>document.getElementById("nilai_huruf").value = "'.$nilai_huruf . '";</script>';
     }   
    
    ?>
</body>
</html>