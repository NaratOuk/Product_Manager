@extends('layout')

@section('title', 'Edit Product')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="page-title">
                <i class="bi bi-pencil-square"></i> Edit Product
            </h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <h5><i class="bi bi-exclamation-triangle"></i> Validation Error</h5>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card-product">
                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name" class="form-label">
                            <i class="bi bi-box"></i> Product Name <span style="color: var(--danger-color);">*</span>
                        </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" placeholder="Enter product name" 
                               value="{{ old('name', $product->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">
                            <i class="bi bi-file-text"></i> Description
                        </label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="4" 
                                  placeholder="Enter product description">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price" class="form-label">
                                    <i class="bi bi-currency-dollar"></i> Price <span style="color: var(--danger-color);">*</span>
                                </label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror" 
                                       id="price" name="price" step="0.01" min="0" 
                                       placeholder="0.00" value="{{ old('price', $product->price) }}" required>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantity" class="form-label">
                                    <i class="bi bi-stack"></i> Quantity <span style="color: var(--danger-color);">*</span>
                                </label>
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror" 
                                       id="quantity" name="quantity" min="0" 
                                       placeholder="0" value="{{ old('quantity', $product->quantity) }}" required>
                                @error('quantity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-3 mt-5">
                        <button type="submit" class="btn btn-primary-custom btn-custom">
                            <i class="bi bi-check-lg"></i> Update Product
                        </button>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-secondary btn-custom">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
