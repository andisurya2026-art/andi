<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard iRent | Sistem Manajemen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
        
        /* Animasi sederhana untuk notifikasi */
        #toast {
            transition: all 0.5s ease;
            transform: translateY(100px);
            opacity: 0;
        }
        #toast.show {
            transform: translateY(0);
            opacity: 1;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-900">

    <div id="toast" class="fixed bottom-10 left-1/2 -translate-x-1/2 z-50 bg-slate-900 text-white px-6 py-3 rounded-2xl shadow-2xl flex items-center space-x-3">
        <i class="fas fa-check-circle text-green-400"></i>
        <span id="toast-message" class="text-sm font-bold">Unit berhasil ditambahkan</span>
    </div>

    <div class="flex h-screen overflow-hidden">
        
        <aside class="w-64 bg-white border-r border-slate-200 hidden lg:flex flex-col">
            <div class="p-8">
                <div class="flex items-center space-x-3 text-blue-600">
                    <i class="fas fa-apple-alt text-2xl"></i>
                    <span class="text-xl font-bold tracking-tight text-slate-800">iRent<span class="text-blue-600">Pro</span></span>
                </div>
            </div>
            
            <nav class="flex-1 px-4 space-y-2">
                <a href="#" class="flex items-center p-3 bg-blue-50 text-blue-600 rounded-2xl font-semibold">
                    <i class="fas fa-th-large mr-3 text-lg"></i> Dashboard
                </a>
                <a href="transaksi.php" class="flex items-center p-3 text-slate-500 hover:bg-slate-50 hover:text-slate-800 rounded-2xl transition">
                    <i class="fas fa-file-invoice-dollar mr-3 text-lg"></i> Transaksi
                </a>
            </nav>

            <div class="p-4 mt-auto border-t border-slate-100">
                <a href="logout.php" class="flex items-center p-3 text-red-500 hover:bg-red-50 rounded-2xl transition">
                    <i class="fas fa-sign-out-alt mr-3"></i> Keluar Sistem
                </a>
            </div>
        </aside>

        <main class="flex-1 flex flex-col overflow-hidden">
            
            <header class="h-20 bg-white/80 backdrop-blur-md border-b border-slate-200 flex items-center justify-between px-8 z-10">
                <h2 class="text-lg font-bold text-slate-800">Ringkasan Sistem</h2>
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        <i class="fas fa-bell text-slate-400 text-xl"></i>
                        <span class="absolute -top-1 -right-1 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                    </div>
                    <div class="flex items-center space-x-3 pl-6 border-l border-slate-200">
                        <div class="text-right">
                            <p class="text-xs font-bold text-slate-800">Admin Utama</p>
                            <p class="text-[10px] text-green-500 font-medium">Online</p>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center border border-slate-200">
                            <i class="fas fa-user-tie text-slate-400"></i>
                        </div>
                    </div>
                </div>
            </header>

            <div class="flex-1 overflow-y-auto p-8 custom-scrollbar">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                    <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 flex items-center space-x-4">
                        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center text-xl">
                            <i class="fas fa-boxes"></i>
                        </div>
                        <div>
                            <p class="text-slate-400 text-xs font-bold uppercase tracking-wider">Total Unit</p>
                            <h3 class="text-2xl font-black">142</h3>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 flex items-center space-x-4">
                        <div class="w-12 h-12 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center text-xl">
                            <i class="fas fa-exchange-alt"></i>
                        </div>
                        <div>
                            <p class="text-slate-400 text-xs font-bold uppercase tracking-wider">Sedang Sewa</p>
                            <h3 class="text-2xl font-black">86</h3>
                        </div>
                    </div>
                </div>

                <div class="mb-8">
                    <h3 class="text-xl font-bold text-slate-800 mb-6">Pilih Unit iPhone</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        
                        <div class="bg-white p-5 rounded-[2.5rem] shadow-sm border border-slate-100 group hover:shadow-xl transition-all duration-300">
                            <div class="bg-slate-100 h-40 rounded-[2rem] mb-4 flex items-center justify-center relative overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1695048133142-1a20484d2569?q=80&w=500&auto=format&fit=crop" alt="iPhone 15 Pro Max" class="h-[90%] w-full object-contain group-hover:scale-110 transition-all duration-500 drop-shadow-md">
                                <span class="absolute top-4 right-4 bg-green-500 text-white text-[10px] font-bold px-3 py-1 rounded-full z-10">READY</span>
                            </div>
                            <h4 class="text-lg font-bold">iPhone 15 Pro Max</h4>
                            <p class="text-xs text-slate-400 mb-4 font-medium italic">Titanium • 256GB</p>
                            <div class="flex items-center justify-between pt-4 border-t border-slate-50">
                                <p class="text-lg font-black text-blue-600">Rp 550k<span class="text-[10px] text-slate-400 font-normal">/hari</span></p>
                                <button onclick="tambahUnit('iPhone 15 Pro Max')" class="w-10 h-10 rounded-xl bg-slate-900 text-white hover:bg-blue-600 active:scale-90 transition shadow-lg flex items-center justify-center">
                                    <i class="fas fa-plus text-xs"></i>
                                </button>
                            </div>
                        </div>

                        <div class="bg-white p-5 rounded-[2.5rem] shadow-sm border border-slate-100 group hover:shadow-xl transition-all duration-300">
                            <div class="bg-slate-100 h-40 rounded-[2rem] mb-4 flex items-center justify-center relative overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1678652197831-2d180705cd2c?q=80&w=500&auto=format&fit=crop" alt="iPhone 14 Pro" class="h-[90%] w-full object-contain group-hover:scale-110 transition-all duration-500 drop-shadow-md">
                                <span class="absolute top-4 right-4 bg-green-500 text-white text-[10px] font-bold px-3 py-1 rounded-full z-10">READY</span>
                            </div>
                            <h4 class="text-lg font-bold">iPhone 14 Pro</h4>
                            <p class="text-xs text-slate-400 mb-4 font-medium italic">Deep Purple • 128GB</p>
                            <div class="flex items-center justify-between pt-4 border-t border-slate-50">
                                <p class="text-lg font-black text-blue-600">Rp 400k<span class="text-[10px] text-slate-400 font-normal">/hari</span></p>
                                <button onclick="tambahUnit('iPhone 14 Pro')" class="w-10 h-10 rounded-xl bg-slate-900 text-white hover:bg-blue-600 active:scale-90 transition shadow-lg flex items-center justify-center">
                                    <i class="fas fa-plus text-xs"></i>
                                </button>
                            </div>
                        </div>

                        <div class="bg-white p-5 rounded-[2.5rem] shadow-sm border border-slate-100 group">
                            <div class="bg-slate-100 h-40 rounded-[2rem] mb-4 flex items-center justify-center relative overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1632661674596-df8be070a5c5?q=80&w=500&auto=format&fit=crop" alt="iPhone 13" class="h-[90%] w-full object-contain opacity-50 drop-shadow-sm">
                                <span class="absolute top-4 right-4 bg-slate-400 text-white text-[10px] font-bold px-3 py-1 rounded-full z-10">BOOKED</span>
                            </div>
                            <h4 class="text-lg font-bold text-slate-400">iPhone 13</h4>
                            <p class="text-xs text-slate-300 mb-4 font-medium italic">Starlight • 128GB</p>
                            <div class="flex items-center justify-between pt-4 border-t border-slate-50">
                                <p class="text-lg font-black text-slate-300">Rp 250k</p>
                                <button class="w-10 h-10 rounded-xl bg-slate-100 text-slate-400 cursor-not-allowed flex items-center justify-center">
                                    <i class="fas fa-lock text-xs"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        function tambahUnit(namaIphone) {
            const toast = document.getElementById('toast');
            const message = document.getElementById('toast-message');
            
            // Set pesan sesuai nama iPhone
            message.innerText = namaIphone + " ditambahkan ke antrean!";
            
            // Tampilkan toast
            toast.classList.add('show');
            
            // Sembunyikan setelah 3 detik
            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);

            // Logika tambahan bisa ditaruh di sini (misal: kirim data ke database)
            console.log("Unit dipilih: " + namaIphone);
        }
    </script>

</body>
</html>