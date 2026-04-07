<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iRent - Dashboard Sewa iPhone</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    </style>
</head>
<body class="bg-slate-50 font-sans text-slate-900">

    <div class="flex h-screen overflow-hidden">
        
        <aside class="w-64 bg-slate-900 text-white flex-shrink-0 hidden lg:flex flex-col">
            <div class="p-6 text-2xl font-bold flex items-center space-x-2">
                <i class="fas fa-mobile-alt text-blue-400"></i>
                <span>iRent<span class="text-blue-400">Pro</span></span>
            </div>
            <nav class="flex-1 px-4 space-y-1">
                <a href="#" class="flex items-center p-3 bg-blue-600 rounded-xl text-white shadow-lg shadow-blue-900/20">
                    <i class="fas fa-th-large mr-3"></i> Dashboard
                </a>
                <a href="#inventory" class="flex items-center p-3 hover:bg-slate-800 rounded-xl transition group">
                    <i class="fas fa-boxes mr-3 text-slate-400 group-hover:text-blue-400"></i> Pilihan Barang
                </a>
                <a href="#rent-data" class="flex items-center p-3 hover:bg-slate-800 rounded-xl transition group">
                    <i class="fas fa-users mr-3 text-slate-400 group-hover:text-blue-400"></i> Data Penyewa
                </a>
                <a href="#" class="flex items-center p-3 hover:bg-slate-800 rounded-xl transition group">
                    <i class="fas fa-chart-line mr-3 text-slate-400 group-hover:text-blue-400"></i> Laporan
                </a>
            </nav>
            <div class="p-4 border-t border-slate-800">
                <div class="flex items-center p-2 space-x-3 bg-slate-800 rounded-lg">
                    <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center font-bold text-xs">AD</div>
                    <div class="text-xs">
                        <p class="font-bold">Admin Utama</p>
                        <p class="text-slate-400">Online</p>
                    </div>
                </div>
            </div>
        </aside>

        <main class="flex-1 flex flex-col overflow-hidden">
            
            <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 flex-shrink-0">
                <div class="relative w-96">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" class="w-full pl-10 pr-4 py-2 bg-slate-100 border-none rounded-lg text-sm focus:ring-2 focus:ring-blue-500" placeholder="Cari unit atau nama penyewa...">
                </div>
                <div class="flex items-center space-x-4">
                    <button class="relative p-2 text-slate-500 hover:bg-slate-100 rounded-full">
                        <i class="fas fa-bell"></i>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                    </button>
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-blue-700 transition">
                        + Input Sewa Baru
                    </button>
                </div>
            </header>

            <div class="flex-1 overflow-y-auto p-8 custom-scrollbar">
                
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                        <div class="flex items-center justify-between mb-2">
                            <span class="p-2 bg-blue-50 text-blue-600 rounded-lg"><i class="fas fa-mobile"></i></span>
                            <span class="text-xs font-bold text-green-500">+5%</span>
                        </div>
                        <p class="text-slate-500 text-sm font-medium">Total iPhone</p>
                        <h3 class="text-3xl font-bold">142</h3>
                    </div>
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                        <div class="flex items-center justify-between mb-2">
                            <span class="p-2 bg-purple-50 text-purple-600 rounded-lg"><i class="fas fa-hand-holding-usd"></i></span>
                            <span class="text-xs font-bold text-blue-500">82%</span>
                        </div>
                        <p class="text-slate-500 text-sm font-medium">Sedang Disewa</p>
                        <h3 class="text-3xl font-bold">116</h3>
                    </div>
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                        <div class="flex items-center justify-between mb-2">
                            <span class="p-2 bg-orange-50 text-orange-600 rounded-lg"><i class="fas fa-tools"></i></span>
                            <span class="text-xs font-bold text-orange-500">2 Unit</span>
                        </div>
                        <p class="text-slate-500 text-sm font-medium">Dalam Perbaikan</p>
                        <h3 class="text-3xl font-bold">4</h3>
                    </div>
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                        <div class="flex items-center justify-between mb-2">
                            <span class="p-2 bg-green-50 text-green-600 rounded-lg"><i class="fas fa-wallet"></i></span>
                        </div>
                        <p class="text-slate-500 text-sm font-medium">Pendapatan Hari Ini</p>
                        <h3 class="text-3xl font-bold">Rp 4.2jt</h3>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    
                    <div id="inventory" class="lg:col-span-2 space-y-6">
                        <div class="flex items-center justify-between">
                            <h2 class="text-xl font-bold">Katalog Barang Terpopuler</h2>
                            <button class="text-blue-600 text-sm font-bold">Lihat Semua</button>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex items-center space-x-4">
                                <div class="w-20 h-20 bg-slate-100 rounded-xl flex items-center justify-center text-3xl">📱</div>
                                <div class="flex-1">
    <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold text-slate-800">Katalog Unit Tersedia</h2>
        <div class="flex gap-2">
            <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-xs font-bold shadow-sm">Pro Series</span>
            <span class="px-3 py-1 bg-slate-100 text-slate-600 rounded-full text-xs font-bold shadow-sm">Standard</span>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <div class="bg-white p-5 rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 group">
            <div class="relative overflow-hidden rounded-2xl bg-slate-50 mb-4 h-40 flex items-center justify-center">
                <i class="fas fa-mobile-alt text-5xl text-slate-300 group-hover:scale-110 transition-transform"></i>
                <div class="absolute top-2 right-2 bg-green-500 text-white text-[10px] font-bold px-2 py-1 rounded-lg">READY</div>
            </div>
            <h4 class="font-bold text-lg">iPhone 15 Pro Max</h4>
            <p class="text-xs text-slate-400 mb-4">256GB • Titanium Natural • 5 Unit</p>
            <div class="flex items-center justify-between border-t border-slate-50 pt-4">
                <div>
                    <p class="text-[10px] text-slate-400 uppercase font-bold tracking-wider">Harga Sewa</p>
                    <p class="font-extrabold text-blue-600">Rp 550.000<span class="text-[10px] font-normal text-slate-400">/hari</span></p>
                </div>
                <button class="bg-slate-900 text-white p-2 rounded-xl hover:bg-blue-600 transition"><i class="fas fa-plus"></i></button>
            </div>
        </div>

        <div class="bg-white p-5 rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 group">
            <div class="relative overflow-hidden rounded-2xl bg-slate-50 mb-4 h-40 flex items-center justify-center">
                <i class="fas fa-mobile-alt text-5xl text-slate-300 group-hover:scale-110 transition-transform"></i>
                <div class="absolute top-2 right-2 bg-green-500 text-white text-[10px] font-bold px-2 py-1 rounded-lg">READY</div>
            </div>
            <h4 class="font-bold text-lg">iPhone 15 Pro</h4>
            <p class="text-xs text-slate-400 mb-4">128GB • Blue Titanium • 8 Unit</p>
            <div class="flex items-center justify-between border-t border-slate-50 pt-4">
                <div>
                    <p class="text-[10px] text-slate-400 uppercase font-bold tracking-wider">Harga Sewa</p>
                    <p class="font-extrabold text-blue-600">Rp 450.000<span class="text-[10px] font-normal text-slate-400">/hari</span></p>
                </div>
                <button class="bg-slate-900 text-white p-2 rounded-xl hover:bg-blue-600 transition"><i class="fas fa-plus"></i></button>
            </div>
        </div>

        <div class="bg-white p-5 rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 group">
            <div class="relative overflow-hidden rounded-2xl bg-slate-50 mb-4 h-40 flex items-center justify-center">
                <i class="fas fa-mobile-alt text-5xl text-slate-300 group-hover:scale-110 transition-transform"></i>
                <div class="absolute top-2 right-2 bg-blue-500 text-white text-[10px] font-bold px-2 py-1 rounded-lg">BOOKED</div>
            </div>
            <h4 class="font-bold text-lg text-slate-600">iPhone 14 Pro</h4>
            <p class="text-xs text-slate-400 mb-4">128GB • Deep Purple • 0 Unit</p>
            <div class="flex items-center justify-between border-t border-slate-50 pt-4 opacity-50">
                <div>
                    <p class="text-[10px] text-slate-400 uppercase font-bold tracking-wider">Harga Sewa</p>
                    <p class="font-extrabold text-slate-600">Rp 350.000<span class="text-[10px] font-normal text-slate-400">/hari</span></p>
                </div>
                <button disabled class="bg-slate-200 text-slate-400 p-2 rounded-xl"><i class="fas fa-lock"></i></button>
            </div>
        </div>

        <div class="bg-white p-5 rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 group">
            <div class="relative overflow-hidden rounded-2xl bg-slate-50 mb-4 h-40 flex items-center justify-center">
                <i class="fas fa-mobile-alt text-5xl text-slate-300 group-hover:scale-110 transition-transform"></i>
                <div class="absolute top-2 right-2 bg-green-500 text-white text-[10px] font-bold px-2 py-1 rounded-lg">READY</div>
            </div>
            <h4 class="font-bold text-lg">iPhone 13</h4>
            <p class="text-xs text-slate-400 mb-4">128GB • Starlight • 12 Unit</p>
            <div class="flex items-center justify-between border-t border-slate-50 pt-4">
                <div>
                    <p class="text-[10px] text-slate-400 uppercase font-bold tracking-wider">Harga Sewa</p>
                    <p class="font-extrabold text-blue-600">Rp 200.000<span class="text-[10px] font-normal text-slate-400">/hari</span></p>
                </div>
                <button class="bg-slate-900 text-white p-2 rounded-xl hover:bg-blue-600 transition"><i class="fas fa-plus"></i></button>
            </div>
        </div>

        <div class="bg-white p-5 rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 group">
            <div class="relative overflow-hidden rounded-2xl bg-slate-50 mb-4 h-40 flex items-center justify-center">
                <i class="fas fa-mobile-alt text-5xl text-slate-300 group-hover:scale-110 transition-transform"></i>
                <div class="absolute top-2 right-2 bg-green-500 text-white text-[10px] font-bold px-2 py-1 rounded-lg">READY</div>
            </div>
            <h4 class="font-bold text-lg">iPhone 11</h4>
            <p class="text-xs text-slate-400 mb-4">64GB • Black • 20 Unit</p>
            <div class="flex items-center justify-between border-t border-slate-50 pt-4">
                <div>
                    <p class="text-[10px] text-slate-400 uppercase font-bold tracking-wider">Harga Sewa</p>
                    <p class="font-extrabold text-blue-600">Rp 100.000<span class="text-[10px] font-normal text-slate-400">/hari</span></p>
                </div>
                <button class="bg-slate-900 text-white p-2 rounded-xl hover:bg-blue-600 transition"><i class="fas fa-plus"></i></button>
            </div>
        </div>

    </div>
</div>
         </div>
                                </div>
                            </div>
                        </div>

                        <div id="rent-data" class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                            <div class="p-6 border-b border-slate-50">
                                <h2 class="text-lg font-bold">Detail Data Penyewa Aktif</h2>
                            </div>
                            <table class="w-full text-left text-sm">
                                <thead class="bg-slate-50 text-slate-500 uppercase text-[10px] font-bold">
                                    <tr>
                                        <th class="px-6 py-4">Penyewa</th>
                                        <th class="px-6 py-4">Unit</th>
                                        <th class="px-6 py-4">Durasi</th>
                                        <th class="px-6 py-4">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100">
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="px-6 py-4">
                                            <p class="font-bold">Ahmad Fauzi</p>
                                            <p class="text-[10px] text-slate-400">ID: #INV-9901</p>
                                        </td>
                                        <td class="px-6 py-4">iPhone 15 Pro</td>
                                        <td class="px-6 py-4">3 Hari</td>
                                        <td class="px-6 py-4">
                                            <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-lg text-[10px] font-bold">BERJALAN</span>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="px-6 py-4">
                                            <p class="font-bold">Siti Sarah</p>
                                            <p class="text-[10px] text-slate-400">ID: #INV-9902</p>
                                        </td>
                                        <td class="px-6 py-4">iPhone 14</td>
                                        <td class="px-6 py-4">7 Hari</td>
                                        <td class="px-6 py-4">
                                            <span class="px-2 py-1 bg-red-100 text-red-700 rounded-lg text-[10px] font-bold">TELAT</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                   
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                            <h3 class="font-bold mb-4">Aktivitas Terakhir</h3>
                            <div class="space-y-4">
                                <div class="flex items-start space-x-3">
                                    <div class="w-2 h-2 mt-1.5 rounded-full bg-green-500"></div>
                                    <div class="text-xs">
                                        <p class="font-bold">Unit #042 Kembali</p>
                                        <p class="text-slate-400">Oleh Budi Santoso • 10m yang lalu</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <div class="w-2 h-2 mt-1.5 rounded-full bg-blue-500"></div>
                                    <div class="text-xs">
                                        <p class="font-bold">Sewa Baru Dibuat</p>
                                        <p class="text-slate-400">iPhone 15 Pro • 1 jam yang lalu</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>

</body>
</html>