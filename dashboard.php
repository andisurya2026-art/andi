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
    </style>
</head>
<body class="bg-slate-50 text-slate-900">

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
                <a href="#" class="flex items-center p-3 text-slate-500 hover:bg-slate-50 hover:text-slate-800 rounded-2xl transition">
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

                </div>
        </main>
    </div>

</body>
</html>