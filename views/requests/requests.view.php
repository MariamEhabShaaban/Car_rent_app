<?php
require view("partials/header.php");
require view("partials/nav.php");
?>
<div class="flex">
   
    <main class="container mx-auto px-4 py-8">
         <a href="/home" class="text-blue-600 hover:underline mb-4 inline-block">&larr; Back</a>
          <?php if (isset($_SESSION['rating'])): ?>
                           <div class="px-4 py-3 rounded border bg-green-100 text-green-800 border-green-300">
                                <?= $_SESSION['rating'] ?>
                           </div>
                        <?php endif ?>
        <h1 class="text-3xl font-bold mb-6 text-gray-800">All Requests</h1>
        

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
                                    <?php if ($car['book_status'] === 'pending'): ?>
                                        <div class="flex items-center space-x-4">
                                            <span class="text-gray-600 font-medium">Pending...</span>
                                        <?php elseif ($car['book_status'] === 'rejected'): ?>
                                            <div class="flex items-center space-x-4">
                                                <span class="text-red-600 font-medium">Rejected</span>
                                            <?php elseif ($car['book_status'] === 'accepted'): ?>
                                                <div class="flex items-center space-x-4">
                                                    <span class="text-green-600 font-medium">Accepted</span>
                                                   
                                             <?php elseif ($car['book_status'] === 'No_answer'): ?>
                                                <div class="flex items-center space-x-4">
                                                    <span class="text-red-600 font-medium">No Response</span>
                                                    <?php elseif ($car['book_status'] === 'returned'): ?>
                                                <div class="flex items-center space-x-4">
                                                    <span class="text-green-600 font-medium">Returned</span>
                                                     <a href="/rate?token=<?= $car['book_token']?>" class="bg-gray-600 text-white px-6 py-2 rounded hover:bg-gray-700">
           Rate
          </a>
                                                <?php endif; ?>




                                            </div>


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