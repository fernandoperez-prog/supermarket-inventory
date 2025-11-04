<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario Supermercado - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <nav class="bg-gradient-to-r from-blue-600 to-blue-800 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <i class="fas fa-shopping-cart text-white text-2xl mr-3"></i>
                    <span class="text-white text-xl font-bold">Supermercado PEREZ MEDRANO</span>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('products.index') }}" 
                       class="text-white hover:bg-blue-700 px-4 py-2 rounded-lg transition {{ request()->routeIs('products.*') ? 'bg-blue-700' : '' }}">
                        <i class="fas fa-box mr-2"></i>Productos
                    </a>
                    <a href="{{ route('categories.index') }}" 
                       class="text-white hover:bg-blue-700 px-4 py-2 rounded-lg transition {{ request()->routeIs('categories.*') ? 'bg-blue-700' : '' }}">
                        <i class="fas fa-tags mr-2"></i>Categorías
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white mt-12 py-6">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2025 PEREZ MEDRANO, FERNANDO MANUEL - Sistema de Inventario</p>
        </div>
    </footer>
</body>
</html>