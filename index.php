<?php
  ob_start();
  require_once('includes/load.php');
  if ($session->isUserLoggedIn(true)) { redirect('home.php', false); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Inventory System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<div class="min-h-screen bg-gradient-to-br from-purple-600 to-blue-500 flex items-center justify-center p-4">
    <div class="w-full max-w-md bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl p-8">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-2">Login Panel</h1>
            <h4 class="text-gray-600 text-sm">Inventory Management System</h4>
        </div>
        
        <?php echo display_msg($msg); ?>
        
        <form method="post" action="auth.php" class="space-y-6">
            <div class="space-y-2">
                <label for="username" class="block text-sm font-medium text-gray-700">
                    Username
                </label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    placeholder="Enter your username"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-600 focus:border-transparent bg-gray-50 transition duration-200 ease-in-out"
                >
            </div>
            
            <div class="space-y-2">
                <label for="password" class="block text-sm font-medium text-gray-700">
                    Password
                </label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="Enter your password"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-600 focus:border-transparent bg-gray-50 transition duration-200 ease-in-out"
                >
            </div>

            <button 
                type="submit" 
                class="w-full py-3 px-4 bg-gradient-to-r from-purple-600 to-blue-500 hover:from-blue-500 hover:to-purple-600 text-white font-semibold rounded-lg transition duration-200 ease-in-out transform hover:scale-[1.02]"
            >
                Login
            </button>
        </form>

       
    </div>
</div>

</body>
</html>
<?php include_once('layouts/footer.php'); ?>