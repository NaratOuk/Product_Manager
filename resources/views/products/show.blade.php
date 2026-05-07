@extends('layout')

@section('title', 'Product Details')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="page-title mb-0">
                    <i class="bi bi-info-circle"></i> Product Details
                </h1>
                <a href="{{ route('products.index') }}" class="btn btn-secondary btn-custom">
                    <i class="bi bi-arrow-left"></i> Back to List
                </a>
            </div>

            <div class="card-product p-5">
                <div class="row mb-5">
                    <div class="col-md-6">
                        <h2 style="color: var(--primary-color); font-weight: 700; margin-bottom: 20px;">
                            {{ $product->name }}
                        </h2>
                        <p class="text-muted" style="font-size: 1.1rem;">
                            {{ $product->description ?? 'No description provided' }}
                        </p>
                    </div>
                    <div class="col-md-6 text-end">
                        <div style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); 
                                    color: white; padding: 30px; border-radius: 12px; margin-bottom: 20px;">
                            <p style="font-size: 0.9rem; margin: 0; opacity: 0.9;">Product ID</p>
                            <h3 style="margin: 10px 0 0 0;">{{ $product->id }}</h3>
                        </div>
                    </div>
                </div>

                <div class="row g-4 mb-5">
                    <div class="col-md-6">
                        <div class="p-4" style="background: #f8fafc; border-radius: 10px; border-left: 4px solid var(--primary-color);">
                            <p style="color: #6b7280; font-size: 0.9rem; margin: 0 0 8px 0; font-weight: 600; text-transform: uppercase;">
                                <i class="bi bi-currency-dollar"></i> Unit Price
                            </p>
                            <h3 style="color: var(--primary-color); margin: 0; font-weight: 700;">
                                ${{ number_format($product->price, 2) }}
                            </h3>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-4" style="background: #f8fafc; border-radius: 10px; border-left: 4px solid var(--success-color);">
                            <p style="color: #6b7280; font-size: 0.9rem; margin: 0 0 8px 0; font-weight: 600; text-transform: uppercase;">
                                <i class="bi bi-stack"></i> Quantity in Stock
                            </p>
                            <h3 style="color: var(--success-color); margin: 0; font-weight: 700;">
                                {{ $product->quantity }} 
                                @if ($product->quantity === 0)
                                    <span style="font-size: 0.6em; color: var(--danger-color);">(Out of Stock)</span>
                                @endif
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="row g-4 mb-5">
                    <div class="col-md-6">
                        <div class="p-4" style="background: #f8fafc; border-radius: 10px; border-left: 4px solid #06b6d4;">
                            <p style="color: #6b7280; font-size: 0.9rem; margin: 0 0 8px 0; font-weight: 600; text-transform: uppercase;">
                                <i class="bi bi-calculator"></i> Total Value
                            </p>
                            <h3 style="color: #06b6d4; margin: 0; font-weight: 700;">
                                ${{ number_format($product->price * $product->quantity, 2) }}
                            </h3>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-4" style="background: #f8fafc; border-radius: 10px; border-left: 4px solid #8b5cf6;">
                            <p style="color: #6b7280; font-size: 0.9rem; margin: 0 0 8px 0; font-weight: 600; text-transform: uppercase;">
                                <i class="bi bi-calendar3"></i> Last Updated
                            </p>
                            <h3 style="color: #8b5cf6; margin: 0; font-weight: 700; font-size: 1rem;">
                                {{ $product->updated_at->format('M d, Y') }}
                            </h3>
                            <small style="color: #9ca3af;">{{ $product->updated_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>

                <div style="background: #fef3c7; border: 2px solid #fcd34d; border-radius: 10px; padding: 15px; margin-bottom: 30px;">
                    <p style="margin: 0; color: #92400e; font-weight: 600;">
                        <i class="bi bi-info-circle-fill"></i> 
                        Status: <span style="font-weight: 700; color: #b45309;">
                            @if ($product->quantity > 10)
                                In Stock - High Availability
                            @elseif ($product->quantity > 0)
                                In Stock - Low Inventory
                            @else
                                Out of Stock
                            @endif
                        </span>
                    </p>
                </div>

                <div class="d-flex gap-3">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning-custom btn-custom" style="flex: 1;">
                        <i class="bi bi-pencil"></i> Edit Product
                    </a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="flex: 1;" onsubmit="return confirm('Are you sure you want to delete this product? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger-custom btn-custom w-100">
                            <i class="bi bi-trash"></i> Delete Product
                        </button>
                    </form>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary btn-custom" style="flex: 1;">
                        <i class="bi bi-arrow-left"></i> Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
