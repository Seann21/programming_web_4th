<?php
class NilaiMataKuliah{
    private $nilaiangka;

    public function __construct($nilaiangka)
    {
        $this->nilaiangka = $nilaiangka;
    }

    public function konversiNilai()
    {
        if($this->nilaiangka >= 86 && $this->nilaiangka <=100){
            $nilaiHuruf = 'A';
        } elseif($this->nilaiangka >= 80 && $this->nilaiangka <= 85){
            $nilaiHuruf = 'A-';
        } elseif($this->nilaiangka >= 75 && $this->nilaiangka <= 79) {
            $nilaiHuruf = 'B+';
        } elseif($this->nilaiangka >= 70 && $this->nilaiangka <= 74){
            $nilaiHuruf = 'B';
        } elseif($this->nilaiangka >= 66 && $this->nilaiangka <= 69){
            $nilaiHuruf = 'B-';
        } elseif($this->nilaiangka >= 61 && $this->nilaiangka <= 65){
            $nilaiHuruf = 'C+';
        } elseif($this->nilaiangka >= 56 && $this->nilaiangka <= 60){
            $nilaiHuruf = 'C';
        } elseif($this->nilaiangka >= 41 && $this->nilaiangka <= 55){
            $nilaiHuruf = 'D';
        } elseif($this->nilaiangka >= 0 && $this->nilaiangka <= 40){
            $nilaiHuruf = 'E';
        } else {
            $nilaiHuruf = 'Nilai tidak ada';
        }

        return $nilaiHuruf;
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nilaiangka = $_POST["nilaiangka"];

    $nilaimatkul = new NilaiMataKuliah($nilaiangka);
    $nilaiHuruf = $nilaimatkul->konversiNilai();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Konversi Nilai | Hs code</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-teal-500 to-violet-800">
    <div class="bg-white p-11 rounded-lg shadow-lg px-16">
    <h1 class="text-3xl font-bold mb-11 px-4 text-center">Aplikasi Konversi Nilai</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="space-y-4">
    <div>
        <label for="nilaiangka" class="block text-gray-700 font-bold mb-2">Masukkan Nilai Angka</label>
        <input type="number" id="nilaiangka" name="nilaiangka" required class="w-full px-3 py-2 border border-gray-300 rounded-md">
    </div>
    <button type="submit" class="w-full bg-violet-500 hover:bg-indigo-800 text-white font-bold py-2 px-4 rounded-md">Konversi</button>
    </form>
    <?php if(isset($nilaiHuruf)): ?>
        <div class="mt-6">
            <p class="text-gray-700 text-center font-bold">Nilai Huruf: <?php echo $nilaiHuruf; ?></p>
        </div>
    </div>
    <?php endif; ?>
</body>
</html>