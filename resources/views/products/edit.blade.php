@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">
            <i class="fas fa-edit text-blue-600 mr-2"></i>Editar Producto
        </h2>

        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Categoría *</label>
                <select name="category_id" 
                        class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
<div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Producto *</label>
            <input type="text" name="producto" value="{{ old('producto', $product->producto) }}" 
                   class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Marca *</label>
            <input type="text" name="marca" value="{{ old('marca', $product->marca) }}" 
                   class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Precio (S/) *</label>
                <input type="number" name="precio" value="{{ old('precio', $product->precio) }}" 
                       step="0.01" min="0"
                       class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Stock *</label>
                <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" 
                       min="0"
                       class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required>
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Imagen Actual</label>
            @if($product->imagen)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $product->imagen) }}" 
                         alt="{{ $product->producto }}"
                         class="h-32 w-32 object-cover rounded border-2 border-gray-300">
                </div>
            @else
                <p class="text-gray-500 text-sm mb-2">Sin imagen</p>
            @endif
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">Nueva Imagen (opcional)</label>
            <input type="file" name="imagen" accept="image/*"
                   class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <p class="text-gray-500 text-xs mt-1">Formatos: JPG, PNG, GIF (máx. 2MB)</p>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" 
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition">
                <i class="fas fa-save mr-2"></i>Actualizar
            </button>
            <a href="{{ route('products.index') }}" 
               class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded-lg transition">
                <i class="fas fa-times mr-2"></i>Cancelar
            </a>
        </div>
    </form>
</div>