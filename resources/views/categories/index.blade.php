<h1>Categories list</h1>

<ul>
    @foreach($categories as $category)
        <li>
            <a href="{{ route('categories.show', ['category' => $category->slug ?? 'none']) }}">
                {{ $category->title }} ({{ $category->id }})
            </a>
        </li>
        @include('categories.subcategory', ['subcategories' => $category->children])
    @endforeach
</ul>
