<form action="{{ route('items.update', $item->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div style="margin-bottom: 10px;">
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $item->name }}">
    </div>
    <div style="margin-bottom: 10px;">
        <label for="price">Price:</label>
        <input type="text" name="price" value="{{ $item->price }}">
    </div>
    {{-- box --}}
    <div style="margin-bottom: 10px;">
        <label for="box_id">Box:</label>
        <select name="box_id">
            @foreach($boxes as $box)
                <option value="{{ $box->id }}" {{ $box->id == $item->box_id ? 'selected' : '' }}>{{ $box->label }}</option>
            @endforeach
        </select>
    <div style="margin-bottom: 10px;">
        <label for="description">Description:</label>
        <textarea name="description" rows="5" cols="40">{{ $item->description }}</textarea>
    </div>
    <div style="margin-bottom: 10px;">
        <label for="picture">Image:</label>
        <input type="file" name="picture" value="{{ $item->picture }}">
    </div>
    
    <button type="submit" style="margin-bottom: 10px;">Update</button>
    
    <a href="{{ route('items.index') }}">Back</a>
</form>


