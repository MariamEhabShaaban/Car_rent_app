<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car rent</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
</head>

<body class="bg-gray-300">
    <div class="py-16 ">
        <div class="flex bg-white rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl">
            <div class="hidden lg:block lg:w-1/2 bg-cover bg-center"
                style="background-image: url('https://bluesky.cdn.imgeng.in/cogstock-images/volvo-487536c0d02d18ddb96e37966fb42db90e498ec6.jpg?width=1110.jpg');">
            </div>
            <div class="w-full p-8 lg:w-1/2">
                <h2 class="text-2xl font-semibold text-gray-700 text-center">Car Rent Website</h2>
                  <?php if (isset($_SESSION['register'])): ?>
      <div class="mb-5 px-4 py-3 rounded border 
              <?php echo $_SESSION['register'] === 'Registed Successfully'
                ? 'bg-green-100 text-green-800 border-green-300'
                : 'bg-red-100 text-red-800 border-red-300'; ?>">
        <?= $_SESSION['register'] ?>
        </div>
         <?php endif;
         unset($_SESSION['register']) ?>
               
                <div class="mt-4 flex items-center justify-between">
                    <span class="border-b w-1/5 lg:w-1/4"></span>
                     <p class="text-xl text-gray-600 text-center">Welcome</p>
                 
                    <span class="border-b w-1/5 lg:w-1/4"></span>
                </div>
                <form action="/login" method="POST">
                    <div class="mt-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Email Address</label>
                        <input
                            class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                            type="text" name="email" />
                        <?php if (isset($errors['email'])): ?>
                            <p class="text-red-500 text-xs">
                                <?= $errors['email'] ?>
                            </p>
                        <?php endif ?>
                    </div>
                    <div class="mt-4">
                        <div class="flex justify-between">

                            <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>


                        </div>
                        <input
                            class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                            type="password" name="password" />
                        <?php if (isset($errors['password'])): ?>
                            <p class="text-red-500 text-xs">
                                <?= $errors['password'] ?>
                            </p>
                        <?php endif ?>
                    </div>
                    <div class="mt-8">
                        <button type="submit"
                            class="bg-gray-700 text-white font-bold py-2 px-4 w-full rounded hover:bg-gray-600">Login</button>
                    </div>

                </form>

                <div class="mt-4 flex items-center justify-between">
                    <span class="border-b w-1/5 md:w-1/4"></span>
                    <a href="/signup" class="text-xs text-gray-500 uppercase">or sign up</a>
                    <span class="border-b w-1/5 md:w-1/4"></span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>