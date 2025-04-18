<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 h-screen flex flex-col">

    <div class="flex h-full">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-900 text-white flex flex-col justify-between h-full">
            <div>
                <div class="p-5 font-bold text-lg">Admin Panel</div>
                <ul>
                    {{-- <li class="p-3 hover:bg-gray-800"><a href="{{ route('abouts.index') }}">About Us</a></li> --}}
                    <li class="p-3 hover:bg-gray-800"><a href="{{ route('products.index') }}">Products</a></li>
                    <li class="p-3 hover:bg-gray-800"><a href="{{ route('services.index') }}">Services</a></li>
                    <li class="p-3 hover:bg-gray-800"><a href="{{ route('reviews.index') }}">Reviews</a></li>
                    {{-- <li class="p-3 hover:bg-gray-800"><a href="#">Operating Hours</a></li> --}}
                    <li class="p-3 hover:bg-gray-800"><a href="{{ route('bookings.index') }}">Booking</a></li>
                </ul>
            </div>

            <!-- Admin Logout Button -->
            <div class="p-3 mt-auto">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-red-600 text-white p-3 rounded-md text-center hover:bg-red-700">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-5 overflow-y-auto">
            <h1 class="text-lg font-bold mb-4">@yield('title')</h1>
            @yield('content')
        </div>
    </div>

</body>
</html>
