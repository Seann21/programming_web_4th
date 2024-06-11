<?php
class Bola
{
    private $jariJari;

    public function __construct($jariJari)
    {
        $this->jariJari = $jariJari;
    }

    public function hitungLuas()
    {
        $luas = 4 * pi() * pow($this->jariJari, 2);
        return $luas;
    }

    public function hitungVolume()
    {
        $volume = (4 / 3) * pi() * pow($this->jariJari, 3);
        return $volume;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jariJari = $_POST["jariJari"];

    $bola = new Bola($jariJari);
    $luas = $bola->hitungLuas();
    $volume = $bola->hitungVolume();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Luas dan Volume Bola</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: linear-gradient(to bottom right, #6dd5ed, #2193b0);
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-6 text-center">Hitung Luas dan Volume Bola</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="space-y-4">
            <div>
                <label for="jariJari" class="block text-gray-700 font-bold mb-2">Jari-jari (cm)</label>
                <input type="number" id="jariJari" name="jariJari" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">Hitung</button>
        </form>
        <?php if (isset($luas) && isset($volume)): ?>
            <div class="mt-6">
                <p class="text-gray-700 font-bold">Luas Bola: <?php echo round($luas, 2); ?> cm²</p>
                <p class="text-gray-700 font-bold">Volume Bola: <?php echo round($volume, 2); ?> cm³</p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>