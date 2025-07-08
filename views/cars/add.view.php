<?php
require view("partials/header.php");
require view('partials/nav.php');
?>

<body class="bg-gray-300 text-gray-800">

    <div class="max-w-3xl mx-auto px-4 py-10">
        <!-- Back Button -->
       <a href="javascript:history.back()" class="text-blue-600 hover:underline mb-4 inline-block">&larr; Back</a>


        <!-- Card Form -->
        <div class="bg-white shadow-md rounded-lg p-8">
            <h2 class="text-2xl font-bold mb-6">Add New Car</h2>

            <form action="/store" method="POST" enctype="multipart/form-data" class="space-y-6">
                 <input type="hidden"  name="_method" value="PUT">
                <!-- Car Name -->
                <div>
                    <label for="car_name" class="block font-semibold mb-1">Car Name</label>
                    <input type="text" name="car" id="car_name"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-gray-400"
                        >
                </div>

                <!-- Price -->
                <div>
                    <label for="price" class="block font-semibold mb-1">Price/Day ($)</label>
                    <input type="number" name="price" id="price" min="1"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-gray-400"
                        >
                </div>

                <!-- Car Image -->
                <div>
                    <label for="photo" class="block font-semibold mb-1">Car Image</label>
                    <input type="file" name="image" id="photo" accept="image/*"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring focus:ring-gray-400">
                </div>


                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="bg-gray-700 hover:bg-gray-800 text-white px-6 py-2 rounded-md transition">
                        Add Car
                    </button>
                </div>
            </form>
        </div>
    </div>

    <?php require view('partials/footer.php') ?>