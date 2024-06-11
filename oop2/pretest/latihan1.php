<?php
class Balok
{
    private $panjang;
    private $lebar;
    private $tinggi;

    public function __construct($panjang, $lebar, $tinggi)
    {
        $this->panjang = $panjang;
        $this->lebar = $lebar;
        $this->tinggi = $tinggi;
    }

    public function hitungLuas()
    {
        $luas = 2 * (($this->panjang * $this->lebar) + ($this->panjang * $this->tinggi) + ($this->lebar * $this->tinggi));
        return $luas;
    }

    public function hitungVolume()
    {
        $volume = $this->panjang * $this->lebar * $this->tinggi;
        return $volume;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $panjang = $_POST["panjang"];
    $lebar = $_POST["lebar"];
    $tinggi = $_POST["tinggi"];

    $balok = new Balok($panjang, $lebar, $tinggi);
    $luas = $balok->hitungLuas();
    $volume = $balok->hitungVolume();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Luas dan Volume Balok</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: linear-gradient(to right, #f6d365, #fda085);
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-6 text-center">Hitung Luas dan Volume Balok</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="space-y-4">
            <div>
                <label for="panjang" class="block text-gray-700 font-bold mb-2">Panjang (cm)</label>
                <input type="number" id="panjang" name="panjang" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="lebar" class="block text-gray-700 font-bold mb-2">Lebar (cm)</label>
                <input type="number" id="lebar" name="lebar" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="tinggi" class="block text-gray-700 font-bold mb-2">Tinggi (cm)</label>
                <input type="number" id="tinggi" name="tinggi" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">Hitung</button>
        </form>
        <?php if (isset($luas) && isset($volume)): ?>
            <div class="mt-6">
                <p class="text-gray-700 font-bold">Luas Balok: <?php echo $luas; ?> cm²</p>
                <p class="text-gray-700 font-bold">Volume Balok: <?php echo $volume; ?> cm³</p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>