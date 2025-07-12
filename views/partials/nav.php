<nav class="bg-gray-200 shadow w-full">
  <div class="w-full px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-16">
      <!-- Logo -->
      <a href="/" class="text-2xl font-bold text-gray-800">CarRent</a>

      <!-- Desktop Navigation -->
      <div class="hidden md:flex space-x-6">
        <form action="/logout" method="POST">
          <span class="text-gray-600 mr-5 font-bold"><?php echo $_SESSION['user']['email']??''?></span>

          <button type="submit" class="text-gray-600 hover:text-red-600">Logout</button>
        </form>
      </div>

      <!-- Mobile Menu Button -->
      <div class="md:hidden">
        <button id="menuToggle" class="text-gray-600 focus:outline-none">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile Navigation Menu -->
  <div id="mobileMenu" class="md:hidden hidden px-4 pb-4">
    <a href="/" class="block py-2 text-gray-600 hover:text-blue-600">Home</a>
    <form action="/logout" method="POST">
      <button type="submit" class="block w-full text-left py-2 text-gray-600 hover:text-red-600">Logout</button>
    </form>
  </div>

  <script>
    // Toggle mobile menu visibility
    document.getElementById('menuToggle').addEventListener('click', function () {
      document.getElementById('mobileMenu').classList.toggle('hidden');
    });
  </script>
</nav>
