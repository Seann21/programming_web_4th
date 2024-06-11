<?php
    class Balok{
        private $p;
        private $l;
        private $t;

        public function __construct($p,$l,$t)
        {
            $this->p = $p;
            $this->l = $l;
            $this->t = $t;
        }

        public function htungLuas(){
            $l = 2 * (($this->p * $this->l) + ($this->p * $this->t) + ($this->l * $this->t));
            return $l;
        }

        public function htungVlume(){
            $vlume = $this->p * $this->l * $this->t;
            return $vlume;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $p = $_POST["panjang"];
        $l = $_POST["lebar"];
        $t = $_POST["tinggi"];

        $blok = new Balok($p, $l, $t);
        $luas = $blok->htungLuas();
        $volume = $blok->htungVlume();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi luasbalok | Hscode</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body{
            background-image: url("gg.jpg");
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">
    <div class="bg-white p-10 w-2/4 h-1/4 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-6 text-center">Aplikasi Luas Balok</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="space-y-4">
         <div>
            <label for="panjang" class="block text-gray-700 font-bold mb-2">Panjang (cm)</label>
            <input type="number" id="panjang" name="panjang" required class="w-full px-3 py-2 border border-gray-300 rounded-md">
         </div>   
          <div>
            <label for="tinggi" class="block text-gray-700 font-bold mb-2">Lebar (cm)</label>
            <input type="number" id="lebar" name="lebar" required class="w-full px-3 py-2 border border-gray-300 rounded-md">
          </div>
          <div>
            <label for="tinggi" class="block text-gray-700 font-bold mb-2">Tinggi (cm)</label>
            <input type="number" id="tinggi" name="tinggi" required class="w-full px-3 py-2 border border-gray-300 rounded-md">
          </div>
          <button type="submit" class="w-full bg-indigo-800 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded-md">Hitung</button>
    </form>
        <?php if (isset($luas) && isset($volume))
        :
            ?>
            <div class="mt-6 text-center">
                <p class="text-gray-700 font-bold">Luas Balok: <?php echo $luas; ?>cm²</p>
                <p class="text-gray-700 font-bold">Volume Balok: <?php echo $volume; ?>cm³</p>
            </div>
            <?php endif; ?>
    </div>
</body>
</html>