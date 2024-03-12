<div class="container">
    <h1>Create Loan</h1>
    <form action="{{ route('loans.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Item:</label>
            <select name="item_id" id="item_id" class="form-control" required>
                @foreach($items as $item)
                    <option value="{{ $item->id }}" {{ old('item_id', isset($selectedItem) ? $selectedItem : '') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
            </select>
            {{-- fecha de devolucion --}}
            <label for="due_date">Return Date:</label>
            <input type="date" name="due_date" id="due_date" class="form-control" required>

        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
