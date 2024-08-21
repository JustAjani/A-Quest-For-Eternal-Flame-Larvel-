@if($items)
    <p>{{ $items->count() }} items found.</p>
@else
    <p>No data found.</p>
@endif
