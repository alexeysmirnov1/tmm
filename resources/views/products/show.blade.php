@extends('layouts.app')
@section('content')

<div class="product-card">
    <h1>{{ $product->title }}</h1>

    <p>Характеристики:</p>
    <ul>
        @foreach($product->attributes as $attribute)
            <li>{{ $attribute->attribute->title }}: {{ $attribute->value }}</li>
        @endforeach
    </ul>
</div>

@endsection
