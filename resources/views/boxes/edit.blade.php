<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Cajas') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12 flex justify-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Editar Caja</h1>
                    <br>
                    <hr><br>
                    <form action="{{ route('boxes.update',$box->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="label">Etiqueta</label>
                        <input type="text" class="form-control" name="label" id="name" value="{{ $box->label }}" required>
                        <label for="location">Ubicación</label>
                        <input type="text" class="form-control" name="location" id="location" value="{{ $box->location }}" required required>
                        <br><br>
                        <hr><br>
                        <button type="submit" class="bg-blue-200 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Update</button>
                    </form>
                    <br>
                    <a href="{{ route('boxes.index') }}" class="bg-blue-100 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Volver a la página principal.</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>