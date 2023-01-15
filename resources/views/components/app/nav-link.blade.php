<div>
    <li>
        <a href="{{ $url }}" class="flex items-center p-3 rounded-3xl
        {{ $active ? 'bg-white text-slate-900' : 'hover:bg-white
            hover:drop-shadow-xl
            hover:backdrop-filter
            hover:backdrop-blur-md
        hover:bg-opacity-10' }}
">
            <i class="{{ $icon }}"></i>
            <span class="flex-1 ml-3 text-sm whitespace-nowrap">{{ $text }}</span>
        </a>
    </li>
</div>
