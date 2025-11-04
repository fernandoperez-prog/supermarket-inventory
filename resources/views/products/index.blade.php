@extends('layouts.app')

@section('title', 'Productos')

@section('content')
<div class="px-4 sm:px-0">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">
            <i class="fas fa-box text-blue-600 mr-2"></i>Inventario de Productos
        </h1>
        <a href="{{ route('products.create') }}" 
           class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg transition shadow-lg">
            <i class="fas fa-plus mr-2"></i>Nuevo Producto
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($products as $product)
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
            <div class="h-48 bg-gray-200 flex items-center justify-center">
                @if($product->imagen)
                    <img src="{{ asset('storage/' . $product->imagen) }}" 
                         alt="{{ $product->producto }}"
                         class="h-full w-full object-cover">
                @else
                    <i class="fas fa-image text-gray-400 text-6xl"></i>
                @endif
            </div>
            
            <div class="p-4">
                <div class="mb-2">
                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                        {{ $product->category->nombre }}
                    </span>
                </div>
                
                <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $product->producto }}</h3>
                <p class="text-sm text-gray-600 mb-2">{{ $product->marca }}</p>
                
                <div class="flex justify-between items-center mb-3">
                    <span class="text-2xl font-bold text-green-600">S/ {{ number_format($product->precio, 2) }}</span>
                    <span class="text-sm {{ $product->stock > 10 ? 'text-green-600' : 'text-red-600' }} font-semibold">
                        Stock: {{ $product->stock }}
                    </span>
                </div>
                
                <div class="flex space-x-2">
                    <a href="{{ route('products.edit', $product) }}" 
                       class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-2 rounded transition">
                        <i class="fas fa-edit mr-1"></i>Editar
                    </a>
                    <form action="{{ route('products.destroy', $product) }}" 
                          method="POST" class="flex-1"
                          onsubmit="return confirm('¿Eliminar este producto?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded transition">
                            <i class="fas fa-trash mr-1"></i>Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-3 text-center py-12">
            <i class="fas fa-box-open text-gray-300 text-6xl mb-4"></i>
            <p class="text-gray-500 text-lg">No hay productos registrados</p>
        </div>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $products->links() }}
    </div>
</div>
@endsection