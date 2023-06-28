<nav class="flex mb-5" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
        <a href="{{route('home')}}"
            class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
            <x-icons.home />
            Home
        </a>
        @foreach ($items as $item)
        <x-layouts.breadcrumb-item>
            <a href="{{$item['url']}}"
                class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                <x-icons.chevron-right />
                {{ucwords($item['nama'])}}
            </a>
        </x-layouts.breadcrumb-item>
        @endforeach
    </ol>
</nav>