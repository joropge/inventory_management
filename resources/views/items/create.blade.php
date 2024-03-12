    <div class="container">
        <h1>Create Item</h1>
        <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control" ></textarea>
            </div>
            <div class="form-group">
                <label for="box_id">Box:</label>
                <select name="box_id" id="box_id" class="form-control" >
                    @foreach($boxes as $box)
                        <option value="{{ $box->id }}">{{ $box->label }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="picture">Image:</label>
                <input type="file" name="picture" id="picture" class="form-control" >
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" name="price" id="price" class="form-control" >
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
