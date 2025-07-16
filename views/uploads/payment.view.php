<?php
require view("partials/header.php");
require view('partials/nav.php');

?>

<body class="bg-gray-300 text-gray-800">

    <div class="max-w-md mx-auto bg-white shadow-lg rounded-2xl p-6 mt-10">
  <h2 class="text-2xl font-bold mb-4 text-gray-800">Choose Payment Method</h2>

  <form action="/store_pay" method="POST" class="space-y-4">
     <input type="hidden" name="token" value="<?php echo $token?>">
    <div class="flex items-center space-x-3">
      <input 
        type="radio" 
        id="one-time" 
        name="payment_method" 
        value="one_time" 
        class="w-5 h-5 text-gray-600 focus:ring-gray-500 border-gray-300"
       
      >
      <label for="one-time" class="text-lg text-gray-700">One-Time Payment</label>
    </div>

    <div class="flex items-center space-x-3">
      <input 
        type="radio" 
        id="subscription" 
        name="payment_method" 
        value="subscription" 
        class="w-5 h-5 text-gray-600 focus:ring-gray-500 border-gray-300"
      >
      <label for="subscription" class="text-lg text-gray-700">Subscription</label>
    </div>

     <?php if (isset($errors['pay'])): ?>
                            <p class="text-red-500 text-xs">
                                <?= $errors['pay'] ?>
                            </p>
                        <?php endif ?>


    <button 
      type="submit" 
      class="mt-6 w-full bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-xl transition duration-200"
    >
      Submit
    </button>

    <?php if (isset($errors['send_email'])): ?>
                            <p class="text-red-500 text-xs">
                                <?= $errors['send_email'] ?>
                            </p>
                        <?php endif ?>

  </form>
</div>


</body>

<?php require view('partials/footer.php') ?>
