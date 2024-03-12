
    <div class="container">
        <h1>Detalles del Item</h1>
        <p>Nombre: {{ $item->name }}</p>
        <p>Descripción: {{ $item->description }}</p>
        <p>Precio: {{ $item->price }}</p>
        <p>Box:{{$item->box->label}}</p>
        <img src="{{ asset(Storage::url($item->image)) }}" alt="Imagen del item" width="200">
        <a href="{{ route('items.edit', $item->id) }}">Editar</a>
        <form action="{{ route('items.destroy', $item->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar</button>
        </form>
        <br>
        <a href="{{ route('items.index') }}">Volver</a>
    </div>
