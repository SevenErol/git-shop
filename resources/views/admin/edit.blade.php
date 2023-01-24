@extends ('layouts.admin')

@section('content')
    <div class="container p-3">


        <h1 class="text-center">Update form Data</h1>

        @include('partials.error')

        <form action="{{ route('admin.products.update', $product->id) }}" method="post" enctype="multipart/form-data">

            @csrf

            @method ('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Data title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ $product->title }}">
                @error('title')
                    <small id="titleHlper" class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <img width="140" src="{{ asset('storage/' . $product->cover_image) }}" alt="">
                <label for="cover_image" class="form-label">Replace Cover Image</label>
                <input type="file" class="form-control" name="cover_image" id="cover_image"
                    aria-describedby="coverImageHelper" placeholder="">
                <small id="coverImageHelper" class="form-text text-muted">Replace the product cover image</small>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Change the product's category</label>
                <select class="form-select @error('category_id') 'is-invalid' @enderror" name="category_id"
                    id="category_id">
                    <option selected>Select one</option>

                    @forelse ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $category->id == old('category_id', $product->category ? $product->category->id : '') ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @empty
                        <option value="">Sorry, no categories in the system.</option>
                    @endforelse
                </select>
            </div>

            <div class="mb-3">
                <label for="description">Data description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Leave a description"
                    id="description" name="description" style="height: 150px">{{ $product->description }}</textarea>
                @error('description')
                    <small id="descriptionHlper" class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date"
                    value="{{ $product->date }}">
                @error('thumb')
                    <small id="dateHlper" class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
