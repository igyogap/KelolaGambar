@extends('/layout/main')
@section('title', 'Kelola Gambar')

@section('content')
<div class="container">
    <h1 class="text-center mt-4">Data Gambar</h1>
    <a href="{{ route('post.create') }}" class="btn btn-primary">Tambah Gambar</a>
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
    <table class="table col-8 mt-4">
        <thead class="table-dark scope="row">
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Gambar</th>
            <th scope="col">Aksi</th>
        </thead>
        @foreach ($images as $image)
            
        
        <tbody>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $image->name }}</td>
            <td>{{ $image->image }}</td>
            {{-- <td><img height="100px" src="{{ asset('/storage/images/' .$image->image) }}" alt="" srcset=""></td> --}}
            <td>
                <a href="{{ route('post.edit',$image) }}"><span class="badge rounded-pill bg-warning text-dark">Edit</span></a>
                {{-- <form action="{{ route('post.edit', $images) }}" method="post">
                    @method('edit')
                    @csrf
                <button type="submit" class="badge rounded-pill bg-warning d-inline">Update</button>
                </form> --}}
                <form action="{{ route('post.destroy', $image) }}" method="post">
                    @method('delete')
                    @csrf
                <button type="submit" class="badge rounded-pill bg-danger d-inline">Delete</button>
                </form>
            </td>
        </tbody>
        @endforeach
    </table>
    </div>
@endsection