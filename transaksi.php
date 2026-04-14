<?php
include 'koneksi.php';

// --- LOGIC HAPUS ---
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM transaksi WHERE id_transaksi = '$id'");
    header("Location: transaksi.php");
}

// --- LOGIC TAMBAH (VERSI FIXED) ---
if (isset($_POST['tambah_transaksi'])) {
    // Fungsi yang benar adalah mysqli_real_escape_string
    $nama_input = mysqli_real_escape_string($conn, $_POST['nama_penyewa']);
    $unit_input = mysqli_real_escape_string($conn, $_POST['unit_manual']);
    $nominal    = $_POST['nominal'];
    $metode     = $_POST['metode'];
    
    // Generate Invoice Sederhana
    $invoice = "INV-" . strtoupper(substr(md5(time()), 0, 6));

    // 1. Cek apakah penyewa sudah ada
    $cek_penyewa = mysqli_query($conn, "SELECT id FROM penyewa WHERE nama = '$nama_input' LIMIT 1");
    
    if (mysqli_num_rows($cek_penyewa) > 0) {
        $data_p = mysqli_fetch_assoc($cek_penyewa);
        $id_penyewa = $data_p['id'];
    } else {
        // 2. Jika belum ada, buat penyewa baru otomatis
        mysqli_query($conn, "INSERT INTO penyewa (nama, unit) VALUES ('$nama_input', '$unit_input')");
        $id_penyewa = mysqli_insert_id($conn);
    }

    // 3. Masukkan ke tabel transaksi
    $sql = "INSERT INTO transaksi (id_penyewa, kode_invoice, nominal_bayar, metode_bayar) 
            VALUES ('$id_penyewa', '$invoice', '$nominal', '$metode')";
    
    if(mysqli_query($conn, $sql)) {
        header("Location: transaksi.php?status=sukses");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Ambil data untuk tabel
$query = "SELECT t.*, p.nama, p.unit FROM transaksi t 
          JOIN penyewa p ON t.id_penyewa = p.id 
          ORDER BY t.tanggal_bayar DESC";
$result = mysqli_query($conn, $query);

// Ambil list penyewa untuk fitur autocomplete (datalist)
$list_suggest = mysqli_query($conn, "SELECT nama FROM penyewa");

// Total Pendapatan
$total_d = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(nominal_bayar) as total FROM transaksi"));
$pendapatan = isset($total_d['total']) ? $total_d['total'] : 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Transaksi | iRent Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .btn-primary { background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); transition: all 0.3s ease; }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 10px 20px -5px rgba(37, 99, 235, 0.4); }
    </style>
</head>
<body class="bg-slate-50 text-slate-900">

    <div id="modalTambah" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-slate-900/40 backdrop-blur-md p-4">
        <div class="bg-white w-full max-w-lg rounded-[3rem] p-10 shadow-2xl">
            <div class="flex justify-between items-center mb-8">
                <h3 class="text-2xl font-extrabold text-slate-800 tracking-tight">Tambah Transaksi</h3>
                <button onclick="toggleModal()" class="text-slate-300 hover:text-slate-500"><i class="fas fa-times-circle text-2xl"></i></button>
            </div>

            <form action="" method="POST" class="space-y-5">
                <div>
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-widest ml-1">Nama Penyewa (Bebas Ketik)</label>
                    <input type="text" name="nama_penyewa" list="dataPenyewa" required placeholder="Ketik nama di sini..." class="w-full mt-2 p-4 bg-slate-50 border border-slate-100 rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold">
                    <datalist id="dataPenyewa">
                        <?php while($s = mysqli_fetch_assoc($list_suggest)) : ?>
                            <option value="<?= $s['nama']; ?>">
                        <?php endwhile; ?>
                    </datalist>
                </div>

                <div>
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-widest ml-1">Unit / handphone (Opsional)</label>
                    <input type="text" name="unit_manual" placeholder="Contoh: Sewa" class="w-full mt-2 p-4 bg-slate-50 border border-slate-100 rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-slate-600">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-widest ml-1">Nominal (Rp)</label>
                        <input type="number" name="nominal" required placeholder="0" class="w-full mt-2 p-4 bg-slate-50 border border-slate-100 rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-bold text-blue-600 text-lg">
                    </div>
                    <div>
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-widest ml-1">Metode</label>
                        <select name="metode" class="w-full mt-2 p-4 bg-slate-50 border border-slate-100 rounded-2xl outline-none font-semibold">
                            <option>Transfer</option>
                            <option>Tunai</option>
                            <option>E-Wallet</option>
                        </select>
                    </div>
                </div>

                <button type="submit" name="tambah_transaksi" class="w-full py-5 btn-primary text-white rounded-2xl font-bold text-sm tracking-widest mt-4">
                    SIMPAN TRANSAKSI
                </button>
            </form>
        </div>
    </div>

    <div class="flex h-screen">
        <aside class="w-64 bg-white border-r border-slate-200 hidden lg:flex flex-col p-8">
            <div class="flex items-center space-x-3 text-blue-600 mb-10">
                <i class="fas fa-apple-alt text-2xl"></i>
                <span class="text-xl font-extrabold text-slate-800 tracking-tighter">iRent<span class="text-blue-600">Pro</span></span>
            </div>
            <nav class="space-y-4">
                <a href="dashboard.php" class="flex items-center p-4 text-slate-400 hover:text-slate-800 rounded-2xl font-bold text-sm transition"><i class="fas fa-th-large mr-4"></i> Dashboard</a>
                <a href="transaksi.php" class="flex items-center p-4 bg-blue-50 text-blue-600 rounded-2xl font-bold text-sm shadow-sm shadow-blue-100"><i class="fas fa-file-invoice-dollar mr-4 text-lg"></i> Transaksi</a>
            </nav>
        </aside>

        <main class="flex-1 flex flex-col overflow-hidden">
            <header class="h-24 px-10 border-b border-slate-100 bg-white/50 backdrop-blur-md flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-extrabold text-slate-800 tracking-tight">Riwayat Keuangan</h2>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Manajemen transaksi masuk</p>
                </div>
                <div class="flex items-center space-x-6">
                    <div class="text-right border-r pr-6 border-slate-100">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Saldo Saat Ini</p>
                        <p class="text-lg font-black text-green-500 tracking-tighter">Rp <?= number_format($pendapatan, 0, ',', '.'); ?></p>
                    </div>
                    <button onclick="toggleModal()" class="btn-primary text-white px-8 py-4 rounded-2xl text-xs font-black tracking-widest shadow-lg shadow-blue-100 uppercase flex items-center">
                        <i class="fas fa-plus-circle mr-2 text-sm"></i> Tambah Baru
                    </button>
                </div>
            </header>

            <div class="flex-1 overflow-y-auto p-10">
                <div class="bg-white rounded-[3rem] border border-slate-100 shadow-sm overflow-hidden">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/50 border-b border-slate-100">
                                <th class="px-10 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Invoice</th>
                                <th class="px-10 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Nama & Unit</th>
                                <th class="px-10 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Nominal & Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            <?php while($row = mysqli_fetch_assoc($result)) : ?>
                            <tr class="hover:bg-slate-50/50 transition">
                                <td class="px-10 py-8">
                                    <span class="font-mono text-[10px] font-black text-blue-600 bg-blue-50 px-3 py-1.5 rounded-xl border border-blue-100">#<?= $row['kode_invoice']; ?></span>
                                </td>
                                <td class="px-10 py-8">
                                    <p class="font-bold text-slate-800 text-sm"><?= $row['nama']; ?></p>
                                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-tight"><?= $row['unit']; ?></p>
                                </td>
                                <td class="px-10 py-8">
                                    <div class="flex items-center justify-between">
                                        <p class="font-black text-slate-700">Rp <?= number_format($row['nominal_bayar'], 0, ',', '.'); ?></p>
                                        <div class="flex space-x-2">
                                            <a href="edit_transaksi.php?id=<?= $row['id_transaksi']; ?>" class="w-10 h-10 bg-slate-50 text-slate-400 rounded-xl flex items-center justify-center hover:bg-blue-600 hover:text-white transition shadow-sm"><i class="fas fa-edit text-xs"></i></a>
                                            <a href="transaksi.php?hapus=<?= $row['id_transaksi']; ?>" onclick="return confirm('Hapus data?')" class="w-10 h-10 bg-slate-50 text-slate-400 rounded-xl flex items-center justify-center hover:bg-red-500 hover:text-white transition shadow-sm"><i class="fas fa-trash text-xs"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <script>
        function toggleModal() {
            const m = document.getElementById('modalTambah');
            m.classList.toggle('hidden');
        }
    </script>
</body>
</html>