<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4">
        <h3 class="text-center mb-4">Kalkulator Web Sederhana</h3>

        <form action="hitung.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Angka Pertama</label>
                <input type="number" step="any" name="angka1" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Angka Kedua</label>
                <input type="number" step="any" name="angka2" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Operasi</label>
                <select name="operasi" class="form-select">
                    <option value="+">Penjumlahan (+)</option>
                    <option value="-">Pengurangan (-)</option>
                    <option value="*">Perkalian (*)</option>
                    <option value="/">Pembagian (/)</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Hitung</button>
        </form>
    </div>
</div>

</body>
</html>
