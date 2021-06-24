@extends('/layout/main')
@section('title', 'Tambah Gambar')

@section('content')
<div class="container">
    <h1 class="text-center mt-4">Tambah Gambar</h1>
    <form action="{{ route('post.store') }}" method="post" class="col-8 mt-4 m-auto">
        @csrf
        <input class="form-control mt-2 @error('name') is-invalid @enderror" type="text" placeholder="Masukan Nama Gambar" aria-label="default input example" name="name">
        @error('name')<div class="invalid-feedback"> {{ $message }} </div>@enderror
        <div class="mb-3">
        <input class="form-control mt-2 @error('image') is-invalid @enderror" type="file" id="formFile" name="image">
        </div>
        @error('image')<div class="invalid-feedback"> {{ $message }} </div>@enderror
        <div class="">
            <button type="submit" class="btn btn-primary ">Simpan</button>
        </div>
    </form>
</div>
@endsection