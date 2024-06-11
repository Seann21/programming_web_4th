<?php
class NilaiMataKuliah
{
    private $nilaiAngka;

    public function __construct($nilaiAngka)
    {
        $this->nilaiAngka = $nilaiAngka;
    }

    public function konversiNilai()
    {
        if ($this->nilaiAngka >= 86 && $this->nilaiAngka <= 100) {
            $nilaiHuruf = 'A';
        } elseif ($this->nilaiAngka >= 80 && $this->nilaiAngka <= 85) {
            $nilaiHuruf = 'A-';
        } elseif ($this->nilaiAngka >= 75 && $this->nilaiAngka <= 79) {
            $nilaiHuruf = 'B+';
        } elseif ($this->nilaiAngka >= 70 && $this->nilaiAngka <= 74) {
            $nilaiHuruf = 'B';
        } elseif ($this->nilaiAngka >= 66 && $this->nilaiAngka <= 69) {
            $nilaiHuruf = 'B-';
        } elseif ($this->nilaiAngka >= 61 && $this->nilaiAngka <= 65) {
            $nilaiHuruf = 'C+';
        } elseif ($this->nilaiAngka >= 56 && $this->nilaiAngka <= 60) {
            $nilaiHuruf = 'C';
        } elseif ($this->nilaiAngka >= 41 && $this->nilaiAngka <= 55) {
            $nilaiHuruf = 'D';
        } elseif ($this->nilaiAngka >= 0 && $this->nilaiAngka <= 40) {
            $nilaiHuruf = 'E';
        } else {
            $nilaiHuruf = 'Nilai tidak valid';
        }

        return $nilaiHuruf;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nilaiAngka = $_POST["nilaiAngka"];

    $nilaiMataKuliah = new NilaiMataKuliah($nilaiAngka);
    $nilaiHuruf = $nilaiMataKuliah->konversiNilai();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konversi Nilai Angka ke Nilai Huruf</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: linear-gradient(to right, #ffecd2, #fcb69f);
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-6 text-center">Konversi Nilai Angka ke Nilai Huruf</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="space-y-4">
            <div>
                <label for="nilaiAngka" class="block text-gray-700 font-bold mb-2">Nilai Angka</label>
                <input type="number" id="nilaiAngka" name="nilaiAngka" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">Konversi</button>
        </form>
        <?php if (isset($nilaiHuruf)): ?>
            <div class="mt-6">
                <p class="text-gray-700 font-bold">Nilai Huruf: <?php echo $nilaiHuruf; ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>