<?php
require view("partials/header.php");
require view('partials/nav.php');

?>

<body class="bg-gray-300 text-gray-800">

    <!-- Wrapper to center the form -->
    <div class="flex items-center justify-center min-h-screen px-10">
        <form action="/store_license" method="POST" enctype="multipart/form-data"
            class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md space-y-6 border border-gray-200">
                 
            <input type="hidden" name="id" value="<?php echo $id?>">
           
            
            <h2 class="text-2xl font-bold text-center text-gray-700">Upload Driven License</h2>

           
            <div>
                <label for="license" class="block text-sm font-medium text-gray-700 mb-1">Image of License</label>
                <input type="file" name="license" id="license" 
                    class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-blue-500">
            </div>

            <?php if (isset($errors['id_uploads'])): ?>
                            <p class="text-red-500 text-xs">
                                <?= $errors['id_uploads'] ?>
                            </p>
                        <?php endif ?>


           
            <button type="submit"
                class="w-full bg-gray-600 text-white py-2 px-4 rounded-lg hover:bg-gray-700 transition font-semibold">
                Next
            </button>
        </form>
    </div>

</body>

<?php require view('partials/footer.php') ?>
