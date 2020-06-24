<div class="d-flex flex-column p-3" id="admin-sidebar" style="width: 120px; background-color: #30343A;">
    <div class="mb-auto px-2">
        <a href="{{ route('admin.dashboard') }}" class="d-block p-2" style="background-color: #1A1D21; border-radius: 15px;">
            <img src="/s1noko2.png" class="d-block w-100" alt="S1noko" />
        </a>
    </div>

    <div>
        @foreach($items as $item)
        <a href="{{ route($item['name']) }}" class="mb-4 {{ request()->routeIs($item['name']) ? 'active': '' }}">
            {!! $item['icon'] !!}
            <strong style="font-size: 10px;">{{ $item['title'] }}</strong>
        </a>
        @endforeach
    </div>

    <div class="mt-auto p-2">
        <a href="{{ route('logout') }}" class="d-flex flex-column align-items-center">
            <svg width="31" height="36" viewBox="0 0 31 36" xmlns="http://www.w3.org/2000/svg" class="mb-2">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.1121 31.5H25.4017V28.5L26.8129 27V33H14.1121V36L0 31.5V4.5L14.1121 0V3H26.8129V10.5L25.4017 9V4.5H14.1121V31.5ZM28.2989 18L23.6518 13.0605L24.6496 12L31 18.75L24.6496 25.5L23.6518 24.4395L28.2989 19.5H15.5233V18H28.2989Z"/>
            </svg>
            <strong style="font-size: 10px;">LOGOUT</strong>
        </a>
    </div>
</div>