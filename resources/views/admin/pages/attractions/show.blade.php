@extends('admin.master')

@section('content')

<div class="container-fluid px-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h2 text-white fw-bold mb-1">Attraction Detail</h1>
            <p class="text-light mb-0">Complete information about selected attraction</p>
        </div>

        <a href="{{ route('admin.attractions.index') }}" class="btn btn-secondary rounded-3 px-4">
            ← Back
        </a>
    </div>

    <!-- Detail Card -->
    <div class="card border-0 shadow-lg rounded-4 bg-dark text-white">
        <div class="card-body p-4">

            <div class="row g-4">

                <!-- Image -->
                <div class="col-md-5">
                    <img src="{{ asset('storage/' . $attraction->image) }}"
                         class="img-fluid rounded-4 shadow-sm w-100"
                         style="height: 320px; object-fit: cover;">
                </div>

                <!-- Info -->
                <div class="col-md-7">

                    <h2 class="fw-bold mb-3">{{ $attraction->name }}</h2>

                    <div class="mb-3">
                        <label class="text-muted small">Description</label>
                        <p class="mb-0">{{ $attraction->description }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="text-muted small">Ticket Price</label>
                        <p class="mb-0">{{ $attraction->ticket_price }}</p>
                    </div>

                   

                    <div class="mt-4 d-flex gap-2">
                        <a href="{{ route('admin.attractions.edit', $attraction->id) }}"
                           class="btn btn-warning px-4">
                            Edit
                        </a>

                        <form action="{{ route('admin.attractions.destroy', $attraction->id) }}"
                              method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Delete this attraction?')"
                                    class="btn btn-danger px-4">
                                Delete
                            </button>
                        </form>
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>

@endsection