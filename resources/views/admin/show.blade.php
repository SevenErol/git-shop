@extends ('layouts.admin')

@section ('content')

<div class="container p-3">
    <h1 class="text-center mb-4">Single data view</h1>

    <table class="table p-5">
        <thead>
            <tr class="bg-light">
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <th scope="row">{{ $product['id']}}</th>
                <td>{{ $product['title'] }}</td>
                <td>{{ $product['description'] }}</td>
                <td>{{ $product['date']}}</td>
                <td>
                    <div class="d-flex flex-column">
                        <div>
                            <a href="{{ route ('admin.products.edit', $product->id) }}" type="button" class="btn btn-primary col-12 mb-3">Edit</a>
                        </div>
                        <div>

                            <button data-bs-toggle="modal" data-bs-target="#delete-{{ $product->id }}" class="btn btn-danger col-12 mb-3">Delete</button>

                            @include('partials.product-modal')

                        </div>
                    </div>
                </td>
            </tr>



        </tbody>
    </table>
</div>

@endsection