@extends ('layouts.admin')

@section('content')
    <div class="container p-3">


        <h1 class="text-center">Complete the form to add a new Data</h1>

        @include('partials.error')

        <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">

            @csrf


            <div class="mb-3">
                <label for="title" class="form-label">Data title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title') }}">
                @error('title')
                    <small id="titleHlper" class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="cover_image" class="form-label">Cover Image</label>
                <input type="file" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image"
                    id="cover_image" aria-describedby="coverImageHelper" placeholder="">
                <small id="coverImageHelper" class="form-text text-muted">Add a cover image</small>
            </div>
            @error('cover_image')
                <small id="cover_imageHlper" class="text-danger">{{ $message }}</small>
            @enderror
            {{-- cambiare i nomi delle categorie --}}
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select form-select" name="category_id" id="category_id">
                    <option selected>Select one</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') ? 'selected' : '' }}>{{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="description">Data description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Leave a description"
                    id="description" name="description" style="height: 150px">{{ old('description') }}</textarea>
                @error('description')
                    <small id="descriptionHlper" class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date"
                    value="{{ old('date') }}">
                @error('thumb')
                    <small id="dateHlper" class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
