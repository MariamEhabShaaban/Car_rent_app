<?php require view('partials/header.php'); ?>

<body class="bg-gray-200 text-gray-800 min-h-screen flex items-center justify-center">
  <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center">Create an Account</h2>

    <form action="/register" method="POST" class="space-y-4">

      <div>
        <label for="email" class="block font-semibold mb-1">Email Address</label>
        <input type="email" name="email" id="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500">
      </div>

      <div>
        <label for="password" class="block font-semibold mb-1">Password</label>
        <input type="password" name="password" id="password" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500">
      </div>

      <div>
        <label for="confirm_password" class="block font-semibold mb-1">Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500">
      </div>

      <button type="submit" class="w-full bg-gray-700 hover:bg-gray-800 text-white py-2 rounded-lg font-semibold">
        Sign Up
      </button>
    </form>

    <p class="text-center text-sm text-gray-600 mt-4">
      Already have an account?
      <a href="/login" class="text-gray-700 font-semibold hover:underline">Login</a>
    </p>
  </div>
</body>

<?php require view('partials/footer.php'); ?>
