@extends('/layout/main')
@section('title', 'ubah Gambar')

@section('content')
<div class="container">
    <h1 class="text-center mt-4">ubah Gambar</h1>
    <form action="{{route('post.update', $image) }}" method="post" class="col-8 mt-4 m-auto">
        @method('patch')
        @csrf
        <input class="form-control mt-2 @error('name') is-invalid @enderror" type="text" placeholder="Masukan Nama Gambar" aria-label="default input example" name="name" value="{{ $image->name }}">
        @error('name')<div class="invalid-feedback"> {{ $message }} </div>@enderror
        <div class="mb-3">
        <input class="form-control mt-2 @error('image') is-invalid @enderror" type="file" id="formFile" name="image" value="{{ $image->gambar }}">
        </div>
        @error('image')<div class="invalid-feedback"> {{ $message }} </div>@enderror
        <div class="">
            <button type="submit" class="btn btn-primary ">Ubah</button>
        </div>
    </form>
</div>
@endsection