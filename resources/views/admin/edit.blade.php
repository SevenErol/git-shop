@extends ('layouts.admin')

@section ('content')

<div class="container p-3">


    <h1 class="text-center">Update form Data</h1>

    @include('partials.error')

    <form action="{{ route ('admin.products.update', $product->id)}}" method="post" enctype="multipart/form-data">

        @csrf

        @method ('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Data title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $product->title }}">
            @error('title')
            <small id="titleHlper" class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description">Data description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Leave a description" id="description" name="description" style="height: 150px">{{ $product->description }}</textarea>
            @error('description')
            <small id="descriptionHlper" class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ $product->date }}">
            @error('thumb')
            <small id="dateHlper" class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


@endsection