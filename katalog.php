<?php
include 'koneksi.php'; // Menggunakan file koneksi mysqli yang Anda berikan tadi

// --- LOGIKA CRUD ---

// 1. TAMBAH PRODUK
if (isset($_POST['tambah'])) {
    $id_kategori = $_POST['id_kategori'];
    $model_name = $_POST['model_name'];
    $kapasitas = $_POST['kapasitas'];
    $warna = $_POST['warna'];
    $harga_sewa = $_POST['harga_sewa'];
    $gambar_ikon = $_POST['gambar_ikon'];

    $query = "INSERT INTO produk (id_kategori, model_name, kapasitas, warna, harga_sewa, gambar_ikon) 
              VALUES ('$id_kategori', '$model_name', '$kapasitas', '$warna', '$harga_sewa', '$gambar_ikon')";
    mysqli_query($conn, $query);
    header("Location: katalog_admin.php");
}

// 2. HAPUS PRODUK
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM produk WHERE id_produk = $id");
    header("Location: katalog_admin.php");
}

// 3. EDIT PRODUK (Logic sederhana)
if (isset($_POST['update'])) {
    $id = $_POST['id_produk'];
    $model_name = $_POST['model_name'];
    $harga_sewa = $_POST['harga_sewa'];
    
    $query = "UPDATE produk SET model_name='$model_name', harga_sewa='$harga_sewa' WHERE id_produk=$id";
    mysqli_query($conn, $query);
    header("Location: katalog.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Katalog - iRent Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-slate-50 p-6">

    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Manajemen Katalog</h1>
                <p class="text-slate-500 text-sm">Kelola daftar produk iPhone yang tersedia untuk disewa.</p>
            </div>
            <button onclick="document.getElementById('modalTambah').classList.remove('hidden')" class="bg-blue-600 text-white px-5 py-2 rounded-xl font-bold shadow-lg hover:bg-blue-700 transition">
                <i class="fas fa-plus mr-2"></i> Tambah Produk
            </button>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50 border-b border-slate-100">
                    <tr>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Unit</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Kategori</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Spesifikasi</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Harga/Hari</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php
                    $sql = "SELECT p.*, k.nama_kategori FROM produk p JOIN kategori k ON p.id_kategori = k.id_kategori";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)):
                    ?>
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">
                                <span class="text-2xl"><?= $row['gambar_ikon'] ?></span>
                                <span class="font-bold text-slate-700"><?= $row['model_name'] ?></span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-600 font-medium"><?= $row['nama_kategori'] ?></td>
                        <td class="px-6 py-4 text-xs text-slate-500"><?= $row['kapasitas'] ?> • <?= $row['warna'] ?></td>
                        <td class="px-6 py-4 font-bold text-blue-600">Rp <?= number_format($row['harga_sewa'], 0, ',', '.') ?></td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center space-x-2">
                                <a href="?hapus=<?= $row['id_produk'] ?>" onclick="return confirm('Hapus produk ini?')" class="w-8 h-8 flex items-center justify-center bg-red-50 text-red-600 rounded-lg hover:bg-red-600 hover:text-white transition">
                                    <i class="fas fa-trash text-xs"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="modalTambah" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md p-8 animate-in fade-in zoom-in duration-200">
            <h2 class="text-xl font-bold mb-6">Tambah Unit Baru</h2>
            <form method="POST" class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Model</label>
                        <input type="text" name="model_name" placeholder="iPhone 15 Pro" class="w-full bg-slate-100 border-none rounded-xl p-3 text-sm focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Kategori</label>
                        <select name="id_kategori" class="w-full bg-slate-100 border-none rounded-xl p-3 text-sm focus:ring-2 focus:ring-blue-500">
                            <option value="1">Pro Series</option>
                            <option value="2">Standard Series</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Kapasitas</label>
                        <input type="text" name="kapasitas" placeholder="256GB" class="w-full bg-slate-100 border-none rounded-xl p-3 text-sm focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Warna</label>
                        <input type="text" name="warna" placeholder="Titanium" class="w-full bg-slate-100 border-none rounded-xl p-3 text-sm focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Harga Sewa / Hari</label>
                    <input type="number" name="harga_sewa" placeholder="500000" class="w-full bg-slate-100 border-none rounded-xl p-3 text-sm focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Icon (Emoji)</label>
                    <input type="text" name="gambar_ikon" value="📱" class="w-full bg-slate-100 border-none rounded-xl p-3 text-sm focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex space-x-3 pt-4">
                    <button type="button" onclick="document.getElementById('modalTambah').classList.add('hidden')" class="flex-1 bg-slate-100 text-slate-600 py-3 rounded-xl font-bold hover:bg-slate-200">Batal</button>
                    <button type="submit" name="tambah" class="flex-1 bg-blue-600 text-white py-3 rounded-xl font-bold hover:bg-blue-700 shadow-lg shadow-blue-200">Simpan</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>