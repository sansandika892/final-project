@extends('admin.master')

@section('content')


<a href="{{ route('admin.zones.create') }}" class="btn btn-secondary mb-3">create new zone</a>

@if (@session('success'))
<div class="alert alert-success">
    {{ session('success') }}    
</div>


@endif
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Description</th>
    <th>Image</th>
    <th>Actions</th>
</tr>

</thead>
<tbody>
@foreach ($zones as $zone)

<tr>
    <td>{{ $zone->id }}</td>
    <td>{{ $zone->name }}</td>
    <td>{{ $zone->description }}</td>
    <td><img src="{{ Storage::url($zone->image) }}" alt="{{ $zone->name }}" width="100"></td>
    <td>
        <a href="{{ route('admin.zones.edit', $zone->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('admin.zones.destroy', $zone->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this zone?')">Delete</button>
        </form>
    </td>
</tr>

    

    



@endforeach


@endsection


