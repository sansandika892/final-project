@extends('admin.master')

@section('content')

<div class="container mt-4">

    <!-- Judul -->
    <div class="mb-4">
        <h2 class="fw-bold text-light">Review Management</h2>
        <hr class="text-secondary">
    </div>

    @if (session('success'))
    <div class="alert alert-success shadow-sm">
        {{ session('success') }}
    </div>
    @endif

    <div class="card bg-dark text-light shadow-lg border-0">
        <div class="card-body p-0">

            <table class="table table-dark table-hover align-middle mb-0">
                <thead class="text-center border-bottom border-secondary">
                    <tr>
                        <th>ID</th>
                        <th>Zone</th>
                        <th>Reviewer</th>
                        <th>Comments</th>
                        <th>Rating</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($reviews as $review)
                    <tr>
                        <td class="text-center">{{ $review->id }}</td>

                        <td class="fw-semibold">
                            {{ $review->zone->name ?? '-' }}
                        </td>

                        <td>{{ $review->reviewer }}</td>

                        <!-- Comments -->
                        <td class="text-muted">
                            {{ $review->comment ?? '-' }}
                        </td>

                        <!-- Rating -->
                        <td class="text-warning">
                            @for ($i = 1; $i <= 5; $i++)
                                {!! $i <= $review->rating ? '⭐' : '☆' !!}
                            @endfor
                        </td>

                        <td class="text-muted">
                            {{ $review->description }}
                        </td>

                        <td class="text-center">
                            <img src="{{ asset('/storage/images/' . $review->zone->image) }}" 
                                 class="rounded shadow-sm"
                                 width="70">
                        </td>

                        <td class="text-center">
                            <a href="{{ route('admin.reviews.edit', $review->id) }}" 
                               class="btn btn-sm btn-warning me-1">
                                Edit
                            </a>

                            <form action="{{ route('admin.reviews.destroy', $review->id) }}" 
                                  method="POST" 
                                  style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin mau hapus review ini?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-secondary py-5">
                            No reviews available
                        </td>
                    </tr>
                    @endforelse

                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection