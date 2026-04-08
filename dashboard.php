<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iRent - Dashboard Sewa iPhone</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 4px; height: 4px; }
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
                <a href="#" class="flex items-center p-3 bg-blue-600 rounded-xl text-white shadow-lg">
                    <i class="fas fa-th-large w-6"></i> Dashboard
                </a>
                <a href="katalog.php" class="flex items-center p-3 hover:bg-slate-800 rounded-xl transition group text-slate-400 hover:text-white">
                    <i class="fas fa-boxes w-6"></i> Katalog
                </a>
                <a href="#rent-data" class="flex items-center p-3 hover:bg-slate-800 rounded-xl transition group text-slate-400 hover:text-white">
                    <i class="fas fa-users w-6"></i> Data Penyewa
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

        <main class="flex-1 flex flex-col min-w-0 overflow-hidden">
            
            <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-4 lg:px-8 flex-shrink-0">
                <div class="flex items-center flex-1">
                    <button class="lg:hidden mr-4 text-slate-600">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <div class="relative w-full max-w-md hidden sm:block">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" class="w-full pl-10 pr-4 py-2 bg-slate-100 border-none rounded-lg text-sm focus:ring-2 focus:ring-blue-500" placeholder="Cari unit...">
                    </div>
                </div>
                
                <div class="flex items-center space-x-2 lg:space-x-4">
                    <button class="p-2 text-slate-500 hover:bg-slate-100 rounded-full">
                        <i class="fas fa-bell"></i>
                    </button>
                    <button class="bg-blue-600 text-white px-3 py-2 lg:px-4 rounded-lg text-xs lg:text-sm font-bold hover:bg-blue-700 whitespace-nowrap">
                        <span class="hidden sm:inline">+ Sewa Baru</span>
                        <span class="sm:hidden">+</span>
                    </button>
                </div>
            </header>

            <div class="flex-1 overflow-y-auto p-4 lg:p-8 custom-scrollbar">
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-8">
                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100">
                        <div class="flex items-center justify-between mb-2">
                            <span class="p-2 bg-blue-50 text-blue-600 rounded-lg"><i class="fas fa-mobile"></i></span>
                            <span class="text-xs font-bold text-green-500">+5%</span>
                        </div>
                        <p class="text-slate-500 text-xs font-medium uppercase tracking-wider">Total iPhone</p>
                        <h3 class="text-2xl font-bold">142</h3>
                    </div>
                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100">
                        <div class="flex items-center justify-between mb-2">
                            <span class="p-2 bg-purple-50 text-purple-600 rounded-lg"><i class="fas fa-hand-holding-usd"></i></span>
                            <span class="text-xs font-bold text-blue-500">82%</span>
                        </div>
                        <p class="text-slate-500 text-xs font-medium uppercase tracking-wider">Disewa</p>
                        <h3 class="text-2xl font-bold">116</h3>
                    </div>
                   
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    
                    <div class="lg:col-span-2 space-y-8">
                        
                        <div id="inventory">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-lg font-bold">Katalog Unit</h2>
                                <button class="text-blue-600 text-xs font-bold uppercase">Lihat Semua</button>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-16 h-16 bg-slate-50 rounded-xl flex items-center justify-center text-2xl flex-shrink-0">📱</div>
                                        <div class="min-w-0 flex-1">
                                            <h4 class="font-bold text-sm truncate">iPhone 15 Pro Max</h4>
                                            <p class="text-[10px] text-slate-400 mb-2">256GB • Titanium</p>
                                            <p class="font-bold text-blue-600 text-sm">Rp 550k<span class="text-[10px] font-normal text-slate-400">/hr</span></p>
                                        </div>
                                        <button class="bg-slate-900 text-white p-2 rounded-lg hover:bg-blue-600"><i class="fas fa-plus text-xs"></i></button>
                                    </div>
                                </div>
                                <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-16 h-16 bg-slate-50 rounded-xl flex items-center justify-center text-2xl flex-shrink-0">📱</div>
                                        <div class="min-w-0 flex-1">
                                            <h4 class="font-bold text-sm truncate">iPhone 13</h4>
                                            <p class="text-[10px] text-slate-400 mb-2">128GB • Starlight</p>
                                            <p class="font-bold text-blue-600 text-sm">Rp 200k<span class="text-[10px] font-normal text-slate-400">/hr</span></p>
                                        </div>
                                        <button class="bg-slate-900 text-white p-2 rounded-lg hover:bg-blue-600"><i class="fas fa-plus text-xs"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="rent-data" class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                            <div class="p-5 border-b border-slate-50">
                                <h2 class="text-lg font-bold">Penyewa Aktif</h2>
                            </div>
                            <div class="overflow-x-auto custom-scrollbar">
                                <table class="w-full text-left text-sm min-w-[500px]">
                                    <thead class="bg-slate-50 text-slate-500 uppercase text-[10px] font-bold">
                                        <tr>
                                            <th class="px-6 py-4">Penyewa</th>
                                            <th class="px-6 py-4">Unit</th>
                                            <th class="px-6 py-4">Durasi</th>
                                            <th class="px-6 py-4">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-100">
                                        <tr>
                                            <td class="px-6 py-4 font-bold text-xs">Ahmad Fauzi</td>
                                            <td class="px-6 py-4 text-xs">15 Pro</td>
                                            <td class="px-6 py-4 text-xs">3 Hari</td>
                                            <td class="px-6 py-4">
                                                <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-md text-[10px] font-bold">AKTIF</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 font-bold text-xs">Siti Sarah</td>
                                            <td class="px-6 py-4 text-xs">iPhone 14</td>
                                            <td class="px-6 py-4 text-xs">7 Hari</td>
                                            <td class="px-6 py-4">
                                                <span class="px-2 py-1 bg-red-100 text-red-700 rounded-md text-[10px] font-bold">TELAT</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                            <h3 class="font-bold text-sm mb-4 uppercase tracking-widest text-slate-400">Aktivitas Terakhir</h3>
                            <div class="space-y-6">
                                <div class="flex items-start space-x-3">
                                    <div class="w-2 h-2 mt-1.5 rounded-full bg-green-500 shadow-[0_0_8px_rgba(34,197,94,0.5)]"></div>
                                    <div>
                                        <p class="text-xs font-bold">Unit #042 Kembali</p>
                                        <p class="text-[10px] text-slate-400">10 menit yang lalu</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <div class="w-2 h-2 mt-1.5 rounded-full bg-blue-500"></div>
                                    <div>
                                        <p class="text-xs font-bold">Sewa Baru: iPhone 15</p>
                                        <p class="text-[10px] text-slate-400">1 jam yang lalu</p>
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