@php
    $menuList = config('menus.menuList');
    $iconsList = config('menus.iconsList');
@endphp

<header>
    <div class="container d-flex justify-content-between h-100 align-items-center">
        <nav>
            <ul class="d-flex gap-3">
                @foreach ($menuList as $item)
                    <li>
                        <a href="{{ $item['link'] }}">{{ $item['text'] }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <div class="h-50">
            <a href="/">
                <img class="h-100" src="../img/boolean-logo.png" alt="logo">
            </a>
        </div>

        <nav>
            <ul class=" d-flex gap-3">
                @foreach ($iconsList as $icon)
                    <li>
                        <a href="{{ $icon['link'] }}">
                            <i class="{{ $icon['icon'] }}"></i>
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</header>
