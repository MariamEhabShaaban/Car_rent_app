<?php
require view("partials/header.php");
require view('partials/nav.php');


?>

<div class="bg-white rounded-lg shadow p-6 space-y-8">

  <!-- Header -->
  <div class="flex justify-between items-center">
    <a href="/control_panel" class="text-blue-600 hover:underline">&larr; Back</a>

    <a href="/add" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">Add New Car</a>
  </div>

  <!-- Alert Messages -->
  <?php if (isset($_SESSION['delete'])): ?>
    <div class="px-4 py-3 rounded border 
      <?= $_SESSION['delete'] === 'Deleted Successfully'
          ? 'bg-green-100 text-green-800 border-green-300'
          : 'bg-red-100 text-red-800 border-red-300'; ?>">
      <?= $_SESSION['delete'] ?>
    </div>
  <?php endif; ?>

  <?php if (isset($_SESSION['add'])): ?>
    <div class="px-4 py-3 rounded border 
      <?= $_SESSION['add'] === 'Added Successfully'
          ? 'bg-green-100 text-green-800 border-green-300'
          : 'bg-red-100 text-red-800 border-red-300'; ?>">
      <?= $_SESSION['add'] ?>
    </div>
  <?php endif; ?>

  <?php if (isset($_SESSION['update'])): ?>
    <div class="px-4 py-3 rounded border 
      <?= $_SESSION['update'] === 'Updated Successfully'
          ? 'bg-green-100 text-green-800 border-green-300'
          : 'bg-red-100 text-red-800 border-red-300'; ?>">
      <?= $_SESSION['update'] ?>
    </div>
  <?php endif; ?>
  <?php unset($_SESSION['add'], $_SESSION['delete'], $_SESSION['update']); ?>

  <!-- Available Cars -->
  
  <div>
     <?php if($availableCars):?>
    <h3 class="text-lg text-center mb-5 font-semibold text-green-700 mb-2">Available Cars</h3>
    <table class="w-full table-auto mb-8">
      <thead>
        <tr class="bg-gray-200 text-left">
          <th class="px-4 py-2">Car</th>
          <th class="px-4 py-2">Status</th>
          <th class="px-4 py-2">Price/Day</th>
          <th class="px-4 py-2">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($availableCars as $car): ?>
          <tr class="border-t">
            <td class="px-4 py-2"><?= $car['model_name'] ?></td>
            <td class="px-4 py-2 text-green-600"><?= $car['status'] ?></td>
            <td class="px-4 py-2">$ <?= $car['price'] ?></td>
            <td class="px-4 py-2 space-x-2">
              <form class="inline" action="/info" method="POST">
                <input type="hidden" name="token" value="<?= $car['token'] ?>">
                <button class="text-blue-600 hover:underline">Details</button>
              </form>
              |
              <form class="inline" action="/delete" method="POST">
                <input type="hidden" name="token" value="<?= $car['token'] ?>">
                <input type="hidden" name="_method" value="DELETE">
                <button class="text-red-600 hover:underline">Delete</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
      <?php endif?>
  </div>

 

  <!-- Not Available Cars -->
  <div>
     <?php if($unavailableCars):?>
    <h3 class="text-lg text-center mb-5 font-semibold text-red-700 mb-2">Not Available Cars</h3>
    <table class="w-full table-auto">
      <thead>
        <tr class="bg-gray-200 text-left">
          <th class="px-4 py-2">Car</th>
          <th class="px-4 py-2">Status</th>
          <th class="px-4 py-2">Price/Day</th>
          <th class="px-4 py-2">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($unavailableCars as $car): ?>
          <tr class="border-t">
            <td class="px-4 py-2"><?= $car['model_name'] ?></td>
            <td class="px-4 py-2 text-red-600"><?= $car['status'] ?></td>
            <td class="px-4 py-2">$ <?= $car['price'] ?></td>
            <td class="px-4 py-2">
              <form class="inline" action="/info" method="POST">
                <input type="hidden" name="token" value="<?= $car['token'] ?>">
                <button class="text-blue-600 hover:underline">Details</button>
              </form>
              |
              <form class="inline" action="/return" method="POST">
                <input type="hidden" name="token" value="<?= $car['token'] ?>">
                <button class="text-gray-600 hover:underline">Returned</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <?php endif?>

</div>


<?php require view('partials/footer.php'); ?>
