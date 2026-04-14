<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT t.*, p.nama FROM transaksi t JOIN penyewa p ON t.id_penyewa = p.id WHERE id_transaksi = '$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nominal = $_POST['nominal'];
    $metode = $_POST['metode'];
    mysqli_query($conn, "UPDATE transaksi SET nominal_bayar='$nominal', metode_bayar='$metode' WHERE id_transaksi='$id'");
    header("Location: transaksi.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Transaksi | iRent Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-slate-50">
    <div class="flex h-screen">
        <aside class="w-64 bg-white border-r border-slate-200 flex flex-col p-8">
            <div class="flex items-center space-x-3 text-blue-600 mb-10">
                <i class="fas fa-apple-alt text-2xl"></i>
                <span class="text-xl font-bold text-slate-800">iRent<span class="text-blue-600">Pro</span></span>
            </div>
            <nav class="space-y-2">
                <a href="dashboard.php" class="flex items-center p-3 text-slate-500 hover:bg-slate-50 rounded-2xl transition">
                    <i class="fas fa-th-large mr-3"></i> Dashboard
                </a>
                <a href="transaksi.php" class="flex items-center p-3 bg-blue-50 text-blue-600 rounded-2xl font-semibold">
                    <i class="fas fa-file-invoice-dollar mr-3"></i> Transaksi
                </a>
            </nav>
        </aside>

        <main class="flex-1 p-12 flex items-center justify-center">
            <div class="bg-white p-10 rounded-[3rem] shadow-xl border border-slate-100 w-full max-w-md">
                <h3 class="text-2xl font-bold text-slate-800 mb-6">Edit Nominal</h3>
                <form method="POST" class="space-y-5">
                    <div>
                        <label class="text-xs font-bold text-slate-400 uppercase tracking-widest">Penyewa</label>
                        <p class="mt-1 font-bold text-slate-700"><?= $row['nama']; ?></p>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-slate-400 uppercase tracking-widest">Nominal Baru (Rp)</label>
                        <input type="number" name="nominal" value="<?= $row['nominal_bayar']; ?>" class="w-full mt-2 p-4 bg-slate-50 border rounded-2xl focus:ring-2 focus:ring-blue-500 outline-none font-bold">
                    </div>
                    <div>
                        <label class="text-xs font-bold text-slate-400 uppercase tracking-widest">Metode</label>
                        <select name="metode" class="w-full mt-2 p-4 bg-slate-50 border rounded-2xl outline-none font-bold">
                            <option <?= $row['metode_bayar'] == 'Transfer' ? 'selected' : '' ?>>Transfer</option>
                            <option <?= $row['metode_bayar'] == 'Tunai' ? 'selected' : '' ?>>Tunai</option>
                            <option <?= $row['metode_bayar'] == 'E-Wallet' ? 'selected' : '' ?>>E-Wallet</option>
                        </select>
                    </div>
                    <div class="flex space-x-3 pt-6">
                        <a href="transaksi.php" class="flex-1 text-center py-4 bg-slate-100 rounded-2xl font-bold text-slate-500">Batal</a>
                        <button type="submit" name="update" class="flex-1 py-4 bg-blue-600 text-white rounded-2xl font-bold shadow-lg shadow-blue-200">Update</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>