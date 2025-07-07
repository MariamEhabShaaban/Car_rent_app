<?php
require view("partials/header.php");
require view("partials/nav.php");
?>

<main class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">All Cars</h1>

    <?php if (!empty($cars)) : ?>
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
                    <?php foreach ($cars as $car) : ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-gray-800"><?= $car['name'] ?></td>
                            <td class="px-6 py-4 text-gray-800"><?= $car['price'] ?> $ </td>
                            <td class="px-6 py-4">
                                <?php if ($car['status'] === 'Available') : ?>
                                    <span class="text-green-600 font-medium">Available</span>
                                <?php else : ?>
                                    <span class="text-red-600 font-medium">Not Available</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <p class="text-gray-600">No cars found.</p>
    <?php endif; ?>
</main>

<?php
require view("partials/footer.php");
?>
