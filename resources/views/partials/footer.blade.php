@php
    $infosList = config('menus.infosList');
    $socialsList = config('menus.socialsList');
@endphp


<footer>
    <div class="container d-flex justify-content-between text-light py-4">

        <nav>
            <p class="title mb-2">{{ $infosList['title'] }}</p>
            <ul class="d-flex gap-2 ">
                @foreach ($infosList['links'] as $item)
                    <li>
                        <a href="{{ $item['link'] }}">{{ $item['text'] }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <nav class="d-flex flex-column">
            <p class="title mb-2">{{ $socialsList['title'] }}</p>
            <ul class="d-flex gap-3 fs-5">
                @foreach ($socialsList['links'] as $social)
                    <li>
                        <a href="{{ $social['link'] }}">
                            <i class="{{ $social['icon'] }}"></i>
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>

    </div>
</footer>
