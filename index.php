<?php
session_start();
include "koneksi.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($query);

    if ($cek > 0) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iRent Pro - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: radial-gradient(circle at top right, #1e293b, #0f172a);
            height: 100vh;
            overflow: hidden;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .input-glow:focus {
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.5);
            border-color: #3b82f6;
        }
    </style>
</head>
<body class="flex items-center justify-center p-4">

    <div class="absolute top-0 -left-4 w-72 h-72 bg-blue-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
    <div class="absolute bottom-0 -right-4 w-72 h-72 bg-purple-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>

    <div class="glass-card w-full max-w-[400px] p-10 rounded-[32px] shadow-2xl relative z-10">
        
        <div class="text-center mb-10">
            <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg shadow-blue-500/30">
                <i class="fas fa-mobile-alt text-white text-3xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-white tracking-tight">iRent<span class="text-blue-500">Pro</span></h2>
            <p class="text-slate-400 text-sm mt-1">Management System Login</p>
        </div>

        <?php if(isset($error)): ?>
            <div class="bg-red-500/10 border border-red-500/20 text-red-400 text-xs py-3 px-4 rounded-xl mb-6 text-center flex items-center justify-center gap-2">
                <i class="fas fa-circle-exclamation"></i>
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="space-y-6">
            <div class="space-y-2">
                <label class="text-xs font-semibold text-slate-300 ml-1 uppercase tracking-widest">Username</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-500">
                        <i class="fas fa-user"></i>
                    </span>
                    <input type="text" name="username" placeholder="Masukkan username" required
                        class="w-full pl-11 pr-4 py-3.5 bg-slate-800/50 border border-slate-700 rounded-2xl text-white text-sm outline-none transition-all input-glow placeholder:text-slate-600">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-semibold text-slate-300 ml-1 uppercase tracking-widest">Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-500">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input type="password" name="password" placeholder="••••••••" required
                        class="w-full pl-11 pr-4 py-3.5 bg-slate-800/50 border border-slate-700 rounded-2xl text-white text-sm outline-none transition-all input-glow placeholder:text-slate-600">
                </div>
            </div>

            <button type="submit" name="login"
                class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-4 rounded-2xl transition-all shadow-lg shadow-blue-600/20 active:scale-[0.98] mt-4">
                Sign In
            </button>
        </form>

        <div class="mt-8 text-center">
            <p class="text-slate-500 text-[10px] uppercase tracking-[0.2em]">Secure Admin Access Only</p>
        </div>
    </div>

</body>
</html>