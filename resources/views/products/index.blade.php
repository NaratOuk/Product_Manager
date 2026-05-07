@extends('layout')

@section('title', 'Products')

@section('content')
    <div class="row mb-4">
        <div class="col-md-8">
            <h1 class="page-title">
                <i class="bi bi-collection"></i> Product Collection
            </h1>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('products.create') }}" class="btn btn-primary-custom btn-custom">
                <i class="bi bi-plus-lg"></i> Add New Product
            </a>
        </div>
    </div>

    @if (count($products) > 0)
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th><i class="bi bi-tag"></i> ID</th>
                        <th><i class="bi bi-box"></i> Product Name</th>
                        <th><i class="bi bi-file-text"></i> Description</th>
                        <th><i class="bi bi-currency-dollar"></i> Price</th>
                        <th><i class="bi bi-stack"></i> Quantity</th>
                        <th><i class="bi bi-tools"></i> Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>
                                <span class="badge" style="background: var(--primary-color);">{{ $product->id }}</span>
                            </td>
                            <td>
                                <strong>{{ $product->name }}</strong>
                            </td>
                            <td>
                                <small class="text-muted">
                                    {{ Str::limit($product->description ?? 'N/A', 50) }}
                                </small>
                            </td>
                            <td>
                                <span class="price-badge">${{ number_format($product->price, 2) }}</span>
                            </td>
                            <td>
                                @if ($product->quantity > 0)
                                    <span class="badge" style="background: var(--success-color);">
                                        <i class="bi bi-check-lg"></i> {{ $product->quantity }}
                                    </span>
                                @else
                                    <span class="badge" style="background: var(--danger-color);">
                                        <i class="bi bi-x-lg"></i> Out of Stock
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-primary-custom btn-custom" title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning-custom btn-custom" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger-custom btn-custom" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="no-products">
            <i class="bi bi-inbox"></i>
            <h3>No Products Found</h3>
            <p class="text-muted">Start by adding your first product to get started!</p>
            <a href="{{ route('products.create') }}" class="btn btn-primary-custom btn-custom mt-3">
                <i class="bi bi-plus-lg"></i> Create First Product
            </a>
        </div>
    @endif
@endsection
