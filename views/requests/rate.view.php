<?php
require view("partials/header.php");
require view("partials/nav.php");
?>
<body class="bg-gray-300 text-gray-800">
    <div class="flex items-center justify-center min-h-screen px-10">
   
        <form action="/store_rate" method="POST" class="w-full max-w-md mx-auto bg-white p-6 rounded shadow space-y-6">
            <input type="hidden" value="<?=$_GET['token']?>" name="token">
   

    <h2 class="text-xl font-bold text-gray-700">Rate The Website</h2>

    <!-- Availability -->
    <div>
        <label class="block mb-1 text-gray-600">Availability:</label>
        <div class="flex flex-row-reverse justify-end">
            <?php for ($i = 5; $i >= 1; $i--): ?>
                <input type="radio" id="availability<?= $i ?>" name="availability" value="<?= $i ?>" class="hidden"/>
                <label for="availability<?= $i ?>" class="cursor-pointer text-2xl text-gray-400 hover:text-yellow-500">&#9733;</label>
            <?php endfor; ?>
        </div>
    </div>

    <!-- Credibility -->
    <div>
        <label class="block mb-1 text-gray-600">Credibility:</label>
        <div class="flex flex-row-reverse justify-end">
            <?php for ($i = 5; $i >= 1; $i--): ?>
                <input type="radio" id="credibility<?= $i ?>" name="credibility" value="<?= $i ?>" class="hidden"/>
                <label for="credibility<?= $i ?>" class="cursor-pointer text-2xl text-gray-400 hover:text-yellow-500">&#9733;</label>
            <?php endfor; ?>
        </div>
    </div>

    <!-- Attitude -->
    <div>
        <label class="block mb-1 text-gray-600">Attitude:</label>
        <div class="flex flex-row-reverse justify-end">
            <?php for ($i = 5; $i >= 1; $i--): ?>
                <input type="radio" id="attitude<?= $i ?>" name="attitude" value="<?= $i ?>" class="hidden"/>
                <label for="attitude<?= $i ?>" class="cursor-pointer text-2xl text-gray-400 hover:text-yellow-500">&#9733;</label>
            <?php endfor; ?>
        </div>
         <?php if (isset($errors['rating'])): ?>
                            <p class="text-red-500 text-xs">
                                <?= $errors['rating'] ?>
                            </p>
                        <?php endif ?>

    </div>

    <button type="submit" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Submit</button>
</form>

    </div>
    

</body>

<style>
    
    input[type="radio"]:checked + label {
        color: #facc15; /* yellow-400 */
    }
</style>




<?php
require view("partials/footer.php");
?>