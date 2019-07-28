@if (count($breadcrumbs))
    <ol class="breadcrumb d-none d-sm-flex bg-primary p-0 my-3">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$loop->last)
                <li class="breadcrumb-item"><a class="text-white" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
            @else
                <li class="breadcrumb-item active text-light"><strong>{{ $breadcrumb->title }}</strong></li>
            @endif
        @endforeach
    </ol>
@endif
