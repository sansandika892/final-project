@extends('admin.master')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Attraction Management</h3>
        <a href="{{ route('admin.attractions.create') }}" class="btn btn-success">
            + Create New Attraction
        </a>
    </div>

    @if (session('success'))
    <div class="alert alert-success shadow-sm">
        {{ session('success') }}
    </div>
    @endif

    <div class="card shadow-lg border-0">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Ticket Price</th>
                        <th>Image</th>
                        <th width="180">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($attractions as $attraction)
                    <tr>
                        <td class="text-center">{{ $attraction->id }}</td>

                        <td class="fw-semibold">
                            {{ $attraction->name }}
                        </td>

                        <td class="text-muted">
                            {{ $attraction->description }}
                        </td>

                        <td class="text-center text-success fw-bold">
                            Rp {{ number_format($attraction->ticket_price, 0, ',', '.') }}
                        </td>

                        <td class="text-center">
                            <img src="{{ asset('/storage/images/' . $attraction->image) }}" 
                                 alt="{{ $attraction->name }}" 
                                 class="rounded shadow-sm"
                                 width="80">
                        </td>

                        <td class="text-center">
                            <a href="{{ route('admin.attractions.edit', $attraction->id) }}" 
                               class="btn btn-sm btn-warning me-1">
                                Edit
                            </a>

                            <form action="{{ route('admin.attractions.destroy', $attraction->id) }}" 
                                  method="POST" 
                                  style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin mau hapus?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    @if($attractions->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center text-muted p-4">
                            No attractions available
                        </td>
                    </tr>
                    @endif

                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection