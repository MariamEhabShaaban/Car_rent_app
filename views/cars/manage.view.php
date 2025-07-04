<?php
require view("partials/header.php");
require view('partials/nav.php');
?>

  <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-xl font-semibold text-gray-800">Your Cars</h2>
          <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">Add New Car</button>
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
               <?php foreach($cars as $car):?>
            <tr class="border-t">
              <td class="px-4 py-2"><?php echo $car['model_name']?></td>
              <td class="px-4 py-2 text-green-600"><?php echo $car['status']?></td>
              <td class="px-4 py-2">$ <?php echo $car['price']?></td>
              <td class="px-4 py-2">
                <form class="inline" action="/info" method="POST">
                    <input type="hidden" value="<?php echo $car['id']?>" name="car">
                     <button class="text-blue-600 hover:underline">Details</button>
                </form>
                |
                 <form class="inline" action="/delete" method="POST">
                    <input type="hidden" value="<?php echo $car['id']?>" name="car">
                     <button class="text-red-600 hover:underline">Delete</button>
                </form>
              </td>
            </tr>
             <?php endforeach;?>
           
          </tbody>
        </table>
      </div>

      <?php require view('partials/footer.php');?>