<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator PHP | Hs Code</title>
    <link rel="icon" href="favicon.ico">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-cover bg-center h-screen flex flex-col justify-center items-center" style="background-image: url('calc.jpg');">
    <h1 class="text-3xl text-center py-5 font-bold cursor-pointer mb-2">KALKULATOR SEDERHANA</h1>
    <div class="card bg-white shadow-2xl rounded-3xl p-20 text-center shadow-teal-400/50 w-96 h-4/6 mb-24">
        <form method="post" class="space-y-4">
            <div class="angka1">
                <h4 class="text-lg font-semibold">Input Angka Pertama</h4>
                <input type="number" class="no1 w-48 h-8 px-5 rounded-lg bg-gradient-to-tl from-blue-800 to-teal-400 text-white" placeholder="Masukkan disini" name="ip1" value="<?php echo isset($_POST['ip1']) ? $_POST['ip1'] : '' ?>">
            </div>
            <div class="angka2">
                <h4 class="text-lg font-semibold">Input angka Kedua</h4>
                <input type="number" class="no2 w-48 h-8 px-5 rounded-lg bg-gradient-to-tl from-blue-800 to-teal-400 text-white" placeholder="Masukkan disini" name="ip2" value="<?php echo isset($_POST['ip2']) ? $_POST['ip2'] : '' ?>">
            </div>
            <h3 class="text-xl font-semibold">Pilih Operasi</h3>
            <div class="flex justify-center space-x-2">
                <button class="operation-button bg-gradient-to-tl from-teal-400 to-blue-800 shadow-md p-2 w-12 rounded-full text-gray-200 font-bold font-cursive" name="operator" value="+">+</button>
                <button class="operation-button bg-gradient-to-tl from-teal-400 to-blue-800 shadow-md p-2 w-12 rounded-full text-gray-200 font-bold font-cursive" name="operator" value="-">-</button>
                <button class="operation-button bg-gradient-to-tl from-teal-400 to-blue-800 shadow-md p-2 w-12 rounded-full text-gray-200 font-bold font-cursive" name="operator" value="x">X</button>
                <button class="operation-button bg-gradient-to-tl from-teal-400 to-blue-800 shadow-md p-2 w-12 rounded-full text-gray-200 font-bold font-cursive" name="operator" value="/">/</button>
                <button class="operation-button bg-gradient-to-tl from-teal-400 to-blue-800 shadow-md p-2 w-12 rounded-full text-gray-200 font-bold font-cursive" name="operator" value="mod">Mod</button>
            </div>
        </form>
        <?php
        if (isset($_POST['operator'])) {
            $ip1 = $_POST['ip1'];
            $ip2 = $_POST['ip2'];
            $operator = $_POST['operator'];
            switch ($operator) {
                case '+':
                    $hasil = $ip1 + $ip2;
                    break;
                case '-':
                    $hasil = $ip1 - $ip2;
                    break;
                case 'x':
                    $hasil = $ip1 * $ip2;
                    break;
                case '/':
                    $hasil = $ip1 / $ip2;
                    break;
                case 'mod':
                    $hasil = $ip1 % $ip2;
                    break;
            }
        }
        ?>
        <div class="footer pt-8">
            <input type="text" class="no2 w-48 h-8 px-5 rounded-lg bg-gradient-to-tl from-blue-800 to-teal-400 text-white" name="hasil" readonly value="<?php echo isset($hasil) ? $hasil : ''; ?>">
            <span class="text-sm text-gray-500 sm:text-center">©2024 Develop with <a href="https://github.com/Seann21/" class="hover:underline" target="_blank">Hasan.</a> 
            </span>
        </div>
    </div>
</body>
</html>