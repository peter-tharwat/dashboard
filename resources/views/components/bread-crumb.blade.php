<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-4 no-print">
        @foreach ($breads as $index=>$bread)
            @if ($bread['isactive'])
                <li class="breadcrumb-item">{{ $bread['title'] }}</li>
            @else 
                <li class="breadcrumb-item active"><a href="{{ $bread['url'] }}">{{ $bread['title'] }}</a></li>
            @endif
        @endforeach
    </ol>
</nav>