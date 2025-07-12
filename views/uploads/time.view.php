<?php
require view("partials/header.php");
require view('partials/nav.php');

?>

<body class="bg-gray-300 text-gray-800">

    <div class="max-w-md mx-auto mt-10">
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Choose the needed Date</h2>
            <form action="/store_time" method="POST">
               
           
                <label for="date" class="block text-lg font-medium text-gray-700 mb-2">
                    Date
                </label>

                <input type="date" id="date" name="date"
                    class="w-full px-5 py-3 text-lg border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-700" />

                    <?php if (isset($errors['date'])): ?>
                            <p class="text-red-500 text-xs">
                                <?= $errors['date'] ?>
                            </p>
                        <?php endif ?>


                     <button type="submit"
                class="mt-5 w-full bg-gray-600 text-white py-2 px-4 rounded-lg hover:bg-gray-700 transition font-semibold">
                Next
            </button>
        </div>
        </form>
    </div>



</body>

<?php require view('partials/footer.php') ?>