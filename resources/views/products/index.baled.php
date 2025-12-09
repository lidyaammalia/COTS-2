@extends('layouts.app')

@section('content')
<form>
    <input name="search" placeholder="Cari produk">
</form>

<a href="{{ route('products.create') }}">Tambah</a>

<table border="1">
@foreach($products as $p)
<tr>
<td>{{ $p->name }}</td>
<td>{{ $p->price }}</td>
<td>{{ $p->stock }}</td>
<td>
<a href="{{ route('products.edit',$p) }}">Edit</a>
<form method="POST" action="{{ route('products.destroy',$p) }}">
@csrf @method('DELETE')
<button>Hapus</button>
</form>
</td>
</tr>
@endforeach
</table>
@endsection
