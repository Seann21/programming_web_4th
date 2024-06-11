<?php 
    class Bola {
        private $jari2;

        public function __construct($jari2)
        {
            $this->jari2 = $jari2;
        }

        public function htungLuas(){
            $luas = 4 * pi() * pow($this->jari2, 2);
            return $luas;
        }

        public function htungVlume(){
            $volume = (4/3) * pi() * pow($this->jari2, 3);
            return $volume;
        }
    }

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $jari2 = $_POST["jarijari"];

    $bola = new Bola($jari2);
    $luas = $bola->htungLuas();
    $volume = $bola->htungVlume();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Luas dan volume Bola | Hs code</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-black to-indigo-700">
    <div class="bg-white p-11 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-6 text-center">Aplikasi Hitung luas volume bola</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="space-y-4">
    <div>
        <label for="jarijari" class="block text-gray-700 font-bold mb-2">Masukkan Jari-Jari (cm)</label>
        <input type="number" id="jarijari" name="jarijari" required class="w-full px-3 py-2 border border-gray-300 rounded-md">
    </div>
    <button type="submit" class="w-full bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md">Hitung</button>
    </form>
    <?php if(isset($luas) && isset($volume)): ?>
    <div class="mt-6">
        <p class="text-gray-700 font-bold">Luas Bola: <?php echo round($luas, 2);?> cm²</p>
        <p class="text-gray-700 font-bold">Luas Volume: <?php echo round($volume, 2);?> cm³</p>
    </div>
    <?php endif; ?>
    </div>
</body>
</html>