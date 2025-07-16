<?php
require view("partials/header.php");
require view("partials/nav.php");
?>
<div class="flex">
        <aside class="w-64 bg-gray-500 text-white h-screen sticky top-0">
            <div class="p-4 text-2xl font-bold border-b border-gray-400">
                Admin Panel
            </div>
            <nav class="mt-4 space-y-2">
                <a href="/home" class="block px-4 py-2 hover:bg-gray-700">Dashboard</a>
                <a href="/rent_request" class="block px-4 py-2 hover:bg-gray-700">Rent Requests</a>
               
            </nav>
        </aside>
<main class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">All Cars</h1>

    <?php if (!empty($cars)): ?>
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full table-auto border-collapse">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Car Name</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Price/Day</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Status</th>
                       
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php foreach ($cars as $car): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-gray-800"><?= $car['model_name'] ?></td>
                            <td class="px-6 py-4 text-gray-800"><?= $car['price'] ?> $ </td>
                            <td class="px-6 py-4">
                                <?php if ($car['car_status'] === 'Available'): ?>
                                    <div class="flex items-center space-x-4">
                                        <span class="text-green-600 font-medium">Available</span>

                                        <form action="/info" method="POST">
                                            <input type="hidden" value="<?= $car['token'] ?>" name="token">
                                            <button class="text-blue-600 hover:underline text-sm">Details</button>
                                        </form>

                                        
                                    </div>
                                
                                <?php endif; ?>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="text-gray-600">No cars found.</p>
    <?php endif; ?>
</main>
</div>
<?php
require view("partials/footer.php");
?>