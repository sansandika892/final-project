@extends('admin.master')

@section('content')

<div class="container-fluid px-4 py-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
            <h1 class="fw-bold text-white mb-1">Edit Attraction</h1>
            <p class="text-light opacity-75 mb-0">Update attraction information with a modern dashboard style</p>
        </div>

        <a href="{{ route('admin.attractions.index') }}"
           class="btn btn-secondary fw-semibold px-4 py-2 rounded-pill shadow-sm">
            ← Back
        </a>
    </div>

    <!-- Main Card -->
    <div class="card border-0 rounded-4 shadow-lg overflow-hidden"
         style="background: linear-gradient(135deg, #1e293b, #0f172a);">

        <!-- Top Bar -->
        <div class="px-4 py-3 border-bottom border-secondary"
             style="background: rgba(255,255,255,0.03);">
            <h5 class="text-white mb-0 fw-semibold">Attraction Details</h5>
        </div>

        <div class="card-body p-4">

            <form action="{{ route('admin.attractions.update', $attraction->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-4">

                    <!-- Left Side -->
                    <div class="col-lg-8">

                        <!-- Name -->
                        <div class="mb-3">
                            <label class="form-label text-light fw-semibold">Attraction Name</label>
                            <input type="text"
                                   name="name"
                                   value="{{ old('name', $attraction->name) }}"
                                   class="form-control text-white border-0 rounded-3 py-3"
                                   style="background:#334155;"
                                   placeholder="Enter attraction name"
                                   required>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label class="form-label text-light fw-semibold">Description</label>
                            <textarea name="description"
                                      rows="6"
                                      class="form-control text-white border-0 rounded-3"
                                      style="background:#334155;"
                                      placeholder="Write attraction description..."
                                      required>{{ old('description', $attraction->description) }}</textarea>
                        </div>

                        <!-- Ticket Price -->
                        <div class="mb-3">
                            <label class="form-label text-light fw-semibold">Ticket Price</label>
                            <input type="text"
                                   name="ticket_price"
                                   value="{{ old('ticket_price', $attraction->ticket_price) }}"
                                   class="form-control text-white border-0 rounded-3 py-3"
                                   style="background:#334155;"
                                   placeholder="Example: Rp 50.000">
                        </div>
                        
                    </div>

                    <!-- Right Side -->
                    <div class="col-lg-4">

                        <!-- Current Image -->
                        <div class="mb-4">
                            <label class="form-label text-light fw-semibold">Current Image</label>

                            <div class="rounded-4 p-3 text-center"
                                 style="background:#334155;">
                                <img src="{{ asset('storage/' . $attraction->image) }}"
                                     class="img-fluid rounded-3 shadow"
                                     style="max-height:220px; object-fit:cover;">
                            </div>
                        </div>

                        <!-- Upload -->
                        <div class="mb-3">
                            <label class="form-label text-light fw-semibold">Change Image</label>
                            <input type="file"
                                   name="image"
                                   class="form-control text-white border-0 rounded-3"
                                   style="background:#334155;">
                        </div>

                    </div>

                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top border-secondary">

                    <a href="{{ route('admin.attractions.index') }}"
                       class="btn btn-outline-light px-4 rounded-pill">
                        Cancel
                    </a>

                    <button type="submit"
                            class="btn px-4 rounded-pill fw-semibold text-dark"
                            style="background: linear-gradient(135deg,#facc15,#f59e0b);">
                        Update Attraction
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

@endsection