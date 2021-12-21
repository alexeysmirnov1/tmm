<h1>Categories list</h1>

<ul>
    @foreach($categories as $category)
        <li>{{ $category->title }} ({{ $category->id }})</li>
        @include('categories.subcategory', ['subcategories' => $category->children])
    @endforeach
</ul>
