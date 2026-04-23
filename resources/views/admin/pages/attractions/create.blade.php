@extends('admin.master')

@section('content')

<h1>Create Attraction</h1>
<hr>

<form action="{{ route('admin.attractions.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
    </div>

    <div class="mb-3">
        <label for="ticket_price" class="form-label">Ticket Price</label>
        <input type="number" class="form-control" id="ticket_price" name="ticket_price" step="0.01" required>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" id="image" name="image" required>
    </div>

    <button type="submit" class="btn btn-primary">Create Zone</button>
</form>

@endsection