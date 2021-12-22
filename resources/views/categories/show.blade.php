@extends('layouts.app')
@section('content')

    <div class="product-list">
        @foreach($products as $product)
            <div class="product-list__card">
                <h1><a href="{{ route('products.show', $product) }}">{{ $product->title }}</a></h1>

                <p>Характеристики:</p>
                <ul>
                    @foreach($product->attributes as $attribute)
                        <li>{{ $attribute->attribute->title }}: {{ $attribute->value }}</li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>

@endsection
