<?php
require view("partials/header.php");
require view("partials/nav.php");
?>

<body class="bg-gray-200 text-gray-800 min-h-screen">
    <div class="container mx-auto px-4 py-8 ">
        <a href="/control_panel" class="text-blue-600 hover:underline">&larr; Back</a>
        <div class="max-w-3lg mx-auto bg-white rounded-xl shadow-md overflow-hidden p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Customer Ratings</h2>

            <?php
            foreach ($ratings as $key => $value) {
                if (!isset($ratings[$key]))
                    continue;

                $value = (float) $ratings[$key];
                $fullStars = floor($value);
                $hasHalfStar = ($value - $fullStars) >= 0.5;
                ?>


                <div class="flex items-center mb-4 ">
                    <div class="w-32 font-medium text-gray-700"><?= $key ?> </div>

                    
                    <div class="flex items-center mx-2">
                        <?php

                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $fullStars) {
                                ?>
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <?php
                            } elseif ($i == $fullStars + 1 && $hasHalfStar) {
                                ?>
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <defs>
                                        <linearGradient id="half-star" x1="0" x2="100%" y1="0" y2="0">
                                            <stop offset="50%" stop-color="currentColor" />
                                            <stop offset="50%" stop-color="#d1d5db" />
                                        </linearGradient>
                                    </defs>
                                    <path fill="url(#half-star)"
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <?php
                            } else {
                                ?>
                                <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <?php
                            }
                        }
                        ?>

                    </div>
                    <div class="w-12 text-center font-semibold"> <?= number_format($value, 1) ?> </div>

                    </div>

                <?php
            }
            
            ?>
        </div>
    </div>
</body>

<?php
require view("partials/footer.php");
?>