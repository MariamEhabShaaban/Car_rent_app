<?php

require view("partials/header.php");
require view('partials/nav.php');
?>

<body class="bg-gray-300 text-gray-800">

  <div class="max-w-6xl mx-auto px-4 py-10">
    <!-- Back Button -->
       <a href="javascript:history.back()" class="text-blue-600 hover:underline mb-4 inline-block">&larr; Back</a>
    <!-- Car Detail Card -->
    <div class="bg-white shadow rounded-lg overflow-hidden md:flex">
       

      
      <!-- Car Image -->
      <div class="md:w-1/2">
        
        <img class="object-cover w-full h-full" src="<?= '/uploads/cars/'.$car['image']  ?>" alt="Car Image" />

      </div>

      <!-- Car Info -->
      <div class="md:w-1/2 p-6 space-y-4">
        <h2 class="text-3xl font-bold"><?= $car['model_name']?></h2>
        <p class="text-xl font-semibold text-green-600">$ <?= $car['price']?>/ day</p>
        
        <div class="text-sm text-gray-700">
          <p ><strong>Availability: </strong><span class="text-green-600"><?= $car['status']?></span> </p>
   
        </div>

        <div class="pt-4">
            <?php if ($_SESSION['role']!='owner'):?>
          <a href="/upload_id?token=<?= $car['token']?>" class="bg-gray-600 text-white px-6 py-2 rounded hover:bg-gray-700">
            Rent This Car
          </a>
          <?php else:?>

           <a href="/edit?token=<?= $car['token']?>" class="bg-gray-600 text-white px-6 py-2 rounded hover:bg-gray-700">
           Edit
          </a>
          <?php endif;?>
        </div>
      </div>
    </div>

    <!-- Optional: Additional Images, Reviews, etc. -->
    
  </div>

<?php require view('partials/footer.php')?>