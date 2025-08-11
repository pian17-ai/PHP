<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
</head>

<body>
    <h2>Kalkulator Sederhana</h2>
    <form action="proses.php" method="POST">
        <label for="angka1">Angka 1:</label>
        <input type="number" name="angka1" id="angka1" required><br><br>
        
        <label for="angka2">Angka 2:</label>
        <input type="number" name="angka2" id="angka2" required><br><br>
        
        <label for="angka3">Angka 3:</label>
        <input type="number" name="angka3" id="angka3" required><br><br>

        <label for="operator">Operator:</label>
        
        <select name="operator" id="operator" required>
            <option value="tambah">+</option>
            <option value="kurang">-</option>
            <option value="kali">*</option>
            <option value="bagi">/</option>
        </select><br><br>

        <input type="submit" value="Hitung">
    </form>
</body>

</html>