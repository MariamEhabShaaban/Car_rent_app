<?php
require view("partials/header.php");
require view('partials/nav.php');
?>


<div class="bg-white rounded-lg shadow p-6">
  <div class="flex justify-between items-center mb-4">
    <a href="/control_panel" class="text-blue-600 hover:underline mb-4 inline-block">&larr; Back</a>
    <!-- ERRORS  -->
    <?php if (isset($_SESSION['delete'])): ?>
      <div class="mb-5 px-4 py-3 rounded border 
              <?php echo $_SESSION['delete'] === 'Deleted Successfully'
                ? 'bg-green-100 text-green-800 border-green-300'
                : 'bg-red-100 text-red-800 border-red-300'; ?>">
        <?= $_SESSION['delete'] ?>
        </div>
         <?php endif; ?>
        
         <?php if (isset($_SESSION['add'])): ?>
      <div class="text-center mb-5 px-4 py-3 rounded border 
              <?php echo $_SESSION['add'] === 'Added Successfully'
                ? 'bg-green-100 text-green-800 border-green-300'
                : 'bg-red-100 text-red-800 border-red-300'; ?>">
        <?= $_SESSION['add'] ?>
      
      </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['update'])): ?>
      <div class="text-center mb-5 px-4 py-3 rounded border 
              <?php echo $_SESSION['update'] === 'Updated Successfully'
                ? 'bg-green-100 text-green-800 border-green-300'
                : 'bg-red-100 text-red-800 border-red-300'; ?>">
        <?= $_SESSION['update'] ?>
        </div>
         <?php endif; 
         ?> 
      <?php unset($_SESSION['add'], $_SESSION['delete'],$_SESSION['update']); ?>
    
    <h2 class="text-xl font-semibold text-gray-800">Your Cars</h2>

    <a href="/add" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">Add New Car</a>
    </form>

  </div>
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
      <?php foreach ($cars as $car): ?>
        <tr class="border-t">
          <td class="px-4 py-2"><?php echo $car['model_name'] ?></td>
          <td class="px-4 py-2 text-green-600"><?php echo $car['status'] ?></td>
          <td class="px-4 py-2">$ <?php echo $car['price'] ?></td>
          <td class="px-4 py-2">
            <form class="inline" action="/info" method="POST">
              <input type="hidden" value="<?php echo $car['id'] ?>" name="car">
              <button class="text-blue-600 hover:underline">Details</button>
            </form>
            |
            <form class="inline" action="/delete" method="POST">
              <input type="hidden" value="<?php echo $car['id'] ?>" name="car">
              <input type="hidden" value="DELETE" name="_method">

              <button class="text-red-600 hover:underline">Delete</button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>

    </tbody>
  </table>
</div>

<?php require view('partials/footer.php'); ?>