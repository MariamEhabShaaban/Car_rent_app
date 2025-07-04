<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Page not found - 404 error">
    <title>Page Not Found | 404 Error</title>
    <!-- Material Design Icons -->
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/6.5.95/css/materialdesignicons.min.css">
    <!-- Tailwind CSS via CDN (optional) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
        .transition-smooth {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>
</head>
<body class="bg-gray-50 antialiased">
    <!-- Main Container -->
    <main class="flex items-center justify-center min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-3xl mx-auto">
            <!-- Error Content -->
            <div class="text-center mb-16">
                <span class="inline-block bg-indigo-50 rounded-full p-4 mb-6">
                    <i class="mdi mdi-alert-circle-outline text-indigo-600 text-4xl"></i>
                </span>
                <h1 class="text-indigo-600 font-bold text-7xl sm:text-8xl mb-4">403</h1>
                <h2 class="font-bold text-3xl sm:text-4xl md:text-5xl text-gray-800 mb-4">
                Forbidden
                </h2>
                <p class="text-gray-500 text-lg max-w-lg mx-auto">
                    Oops! The page you're looking for doesn't exist or has been moved.
                </p>
            </div>

           
            <!-- Footer -->
            <div class="mt-12 text-center text-sm text-gray-500">
                <p>© 2025 Your Company. All rights reserved.</p>
                <p class="mt-1">
                    <a href="/privacy" class="hover:text-indigo-600 transition-smooth">Privacy Policy</a> · 
                    <a href="/terms" class="hover:text-indigo-600 transition-smooth">Terms of Service</a>
                </p>
            </div>
        </div>
    </main>

    <!-- Back to Top Button (visible on scroll) -->
    <button id="back-to-top" class="fixed bottom-8 right-8 p-3 bg-indigo-600 text-white rounded-full shadow-lg opacity-0 invisible transition-smooth hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
        <i class="mdi mdi-arrow-up text-xl"></i>
    </button>

    <script>
        // Back to top button functionality
        const backToTopButton = document.getElementById('back-to-top');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.remove('opacity-0', 'invisible');
                backToTopButton.classList.add('opacity-100', 'visible');
            } else {
                backToTopButton.classList.remove('opacity-100', 'visible');
                backToTopButton.classList.add('opacity-0', 'invisible');
            }
        });

        backToTopButton.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
</body>
</html>