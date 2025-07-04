<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Owner Dashboard</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
</head>
<body class="bg-gray-100 min-h-screen">

  <!-- Sidebar -->
  <div class="flex">
    <aside class="w-64 bg-gray-500 text-white h-screen sticky top-0">
      <div class="p-4 text-2xl font-bold border-b border-gray-700">
        Admin Panel
      </div>
      <nav class="mt-4 space-y-2">
        <a href="/profile" class="block px-4 py-2 hover:bg-gray-700">Dashboard</a>
        <a href="/#" class="block px-4 py-2 hover:bg-gray-700">Manage Cars</a>
        <a href="/#" class="block px-4 py-2 hover:bg-gray-700">Booking Requests</a>
        <a href="/#" class="block px-4 py-2 hover:bg-gray-700">Documents Uploads</a>
        <a href="/#" class="block px-4 py-2 hover:bg-gray-700">Profit Reports</a>
        <a href="/#" class="block px-4 py-2 hover:bg-gray-700">Customer Ratings</a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
      <h1 class="text-3xl font-bold mb-6">Dashboard Overview</h1>

      <!-- Stats -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-4 rounded-lg shadow">
          <h2 class="text-gray-700 font-semibold">Total Cars</h2>
          <p class="text-2xl font-bold">18</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow">
          <h2 class="text-gray-700 font-semibold">Pending Bookings</h2>
          <p class="text-2xl font-bold">5</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow">
          <h2 class="text-gray-700 font-semibold">Monthly Profit</h2>
          <p class="text-2xl font-bold">$4,250</p>
        </div>
      </div>

      <!-- Cars Management Table -->
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
            <tr class="border-t">
              <td class="px-4 py-2">Toyota Camry</td>
              <td class="px-4 py-2 text-green-600">Available</td>
              <td class="px-4 py-2">$60</td>
              <td class="px-4 py-2">
                <button class="text-blue-600 hover:underline">Details</button> |
                <button class="text-red-600 hover:underline">Delete</button>
              </td>
            </tr>
           
          </tbody>
        </table>
      </div>

      <!-- To Do: Reports, Upload Review, Rating System -->
    </main>
  </div>

</body>
</html>
