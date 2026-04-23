@extends('admin.master')

@section('content')

<div class="container-fluid px-4">

    

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h2 text-white fw-bold mb-1">Zones List</h1>
            <p class="text-light mb-0">Manage all zones data</p>
        </div>

        <a href="{{ route('admin.zones.create') }}" class="btn btn-success rounded-3 px-4">
            + Create New Zone
        </a>
    </div>

    <!-- Card Table -->
    <div class="card border-0 shadow-lg rounded-4 bg-dark">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-dark table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price Range</th>
                            <th>Image</th>
                            <th width="18%">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($zones as $zone)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $zone->name }}</td>
                            <td>{{ $zone->description }}</td>
                            <td>{{ $zone->price_range }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $zone->image) }}"
                                     width="70"
                                     class="rounded shadow-sm">
                            </td>
                            <td>
                                <a href="{{ route('admin.zones.show', $zone->id) }}"
                                   class="btn btn-info btn-sm">
                                   View
                                </a>

                                <a href="{{ route('admin.zones.edit', $zone->id) }}"
                                   class="btn btn-warning btn-sm">
                                   Edit
                                </a>

                                <form action="{{ route('admin.zones.destroy', $zone->id) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button onclick="return confirm('Delete this zone?')"
                                            class="btn btn-danger btn-sm">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                No zone data available
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

@endsection