<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Sewa iPhone</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">

    <div class="flex h-screen overflow-hidden">
        <aside class="w-64 bg-slate-900 text-white flex-shrink-0 hidden md:flex flex-col">
            <div class="p-6 text-2xl font-bold border-b border-slate-700">
                iRent <span class="text-blue-400">Admin</span>
            </div>
            <nav class="flex-1 p-4 space-y-2">
                <a href="#" class="flex items-center p-3 bg-blue-600 rounded-lg text-white">
                    <i class="fas fa-home mr-3"></i> Dashboard
                </a>
                </a>
                <a href="#" class="flex items-center p-3 hover:bg-slate-800 rounded-lg transition">
                    <i class="fas fa-file-invoice mr-3 text-gray-400"></i> Data Sewa
                </a>
                <a href="#" class="flex items-center p-3 hover:bg-slate-800 rounded-lg transition">
                    <i class="fas fa-users mr-3 text-gray-400"></i> Pelanggan
                </a>
            </nav>
        </aside>

        <main class="flex-1 overflow-y-auto p-8">
            <header class="flex justify-between items-center mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Ringkasan Operasional</h1>
                <div class="flex items-center space-x-4">
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        + Sewa Baru
                    </button>
                    <div class="w-10 h-10 rounded-full bg-gray-300"></div>
                </div>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <p class="text-gray-500 text-sm">Total Unit</p>
                    <h3 class="text-2xl font-bold">120</h3>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 border-l-4 border-l-blue-500">
                    <p class="text-gray-500 text-sm">Sedang Disewa</p>
                    <h3 class="text-2xl font-bold">85</h3>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 border-l-4 border-l-green-500">
                    <p class="text-gray-500 text-sm">Unit Tersedia</p>
                    <h3 class="text-2xl font-bold">30</h3>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 border-l-4 border-l-red-500">
                    <p class="text-gray-500 text-sm">Maintenance</p>
                    <h3 class="text-2xl font-bold">5</h3>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                    <h2 class="text-lg font-bold text-gray-800">Detail Penyewaan Aktif</h2>
                    <input type="text" placeholder="Cari penyewa..." class="border rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-gray-50 text-gray-600 text-sm uppercase">
                            <tr>
                                <th class="px-6 py-4 font-semibold">ID</th>
                                <th class="px-6 py-4 font-semibold">Penyewa</th>
                                <th class="px-6 py-4 font-semibold">Unit</th>
                                <th class="px-6 py-4 font-semibold">Tgl Kembali</th>
                                <th class="px-6 py-4 font-semibold">Status</th>
                                <th class="px-6 py-4 font-semibold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-gray-700">
                            <tr>
                                <td class="px-6 py-4">#001</td>
                                <td class="px-6 py-4 font-medium">Ahmad Fauzi</td>
                                <td class="px-6 py-4">iPhone 15 Pro</td>
                                <td class="px-6 py-4">10 Apr 2026</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Aktif</span>
                                </td>
                                <td class="px-6 py-4">
                                    <button class="text-blue-600 hover:underline">Detail</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">#002</td>
                                <td class="px-6 py-4 font-medium">Siti Sarah</td>
                                <td class="px-6 py-4">iPhone 14</td>
                                <td class="px-6 py-4 text-red-500 font-medium">08 Apr 2026</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-medium">Terlambat</span>
                                </td>
                                <td class="px-6 py-4">
                                    <button class="text-blue-600 hover:underline">Detail</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

</body>
</html>