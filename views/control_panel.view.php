<?php
require view('partials/header.php');
require view('partials/nav.php') ?>

<body class="bg-gray-100 min-h-screen">

    <!-- Sidebar -->
    <div class="flex">
        <aside class="w-64 bg-gray-500 text-white h-screen sticky top-0">
            <div class="p-4 text-2xl font-bold border-b border-gray-400">
                Admin Panel
            </div>
            <nav class="mt-4 space-y-2">
                <a href="/control_panel" class="block px-4 py-2 hover:bg-gray-700">Dashboard</a>
                <a href="/manage" class="block px-4 py-2 hover:bg-gray-700">Manage Cars</a>
                <a href="https://mailtrap.io/inboxes/3887333/messages"  rel="noopener noreferrer" class="block px-4 py-2 hover:bg-gray-700 text-white">
                    Booking Requests
                </a>
                <a href="/reports" class="block px-4 py-2 hover:bg-gray-700">Profit Reports</a>
                <a href="/ratings" class="block px-4 py-2 hover:bg-gray-700">Customer Ratings</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <h1 class="text-3xl font-bold mb-6">Dashboard Overview</h1>

            <!-- Stats -->
            <div class="flex flex-col gap-6">
                <div class="bg-white p-4 rounded-lg shadow text-center max-w-5xl w-full">
                    <h2 class="text-gray-700 font-semibold">Total Cars</h2>
                    <p class="text-2xl font-bold"><?php echo sizeof($cars) ?></p>
                </div>

                <div class="bg-white p-4 rounded-lg shadow text-center max-w-5xl w-full">
                    <h2 class="text-gray-700 font-semibold">Pending Bookings</h2>
                    <p class="text-2xl font-bold">5</p>
                </div>

                <div class="bg-white p-4 rounded-lg shadow text-center max-w-5xl w-full">
                    <h2 class="text-gray-700 font-semibold">Monthly Profit</h2>
                    <p class="text-2xl font-bold">$4,250</p>
                </div>
            </div>





            <!-- To Do: Reports, Upload Review, Rating System -->
        </main>
    </div>

    <?php
    require view('partials/footer.php');
    ?>