@extends('admin.master')

@section('content')

use Illuminate\Http\Request;
use App\Models\Zone;

public function index()
{
    $zones = Zone::all();
    return view('admin.pages.zones.index', compact('zones'));
}

public function create()
{
    return view('admin.pages.zones.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
    ]);

    Zone::create([
        'name' => $request->name,
        'description' => $request->description,
    ]);

    return redirect()->route('zones.index')->with('success', 'Data berhasil ditambahkan');
}

public function show($id)
{
    $zone = Zone::findOrFail($id);
    return view('admin.pages.zones.show', compact('zone'));
}

public function edit($id)
{
    $zone = Zone::findOrFail($id);
    return view('admin.pages.zones.edit', compact('zone'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
    ]);

    $zone = Zone::findOrFail($id);

    $zone->update([
        'name' => $request->name,
        'description' => $request->description,
    ]);

    return redirect()->route('zones.index')->with('success', 'Data berhasil diupdate');
}

public function destroy($id)
{
    $zone = Zone::findOrFail($id);
    $zone->delete();

    return redirect()->route('zones.index')->with('success', 'Data berhasil dihapus');
}


@endsection