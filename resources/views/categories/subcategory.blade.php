@if($subcategories)
    <ul>
        @foreach($subcategories as $category)
            <li>{{ $category->title }} ({{ $category->id }})</li>
            @include('categories.subcategory', ['subcategories' => $category->children])
        @endforeach
    </ul>
@endif
