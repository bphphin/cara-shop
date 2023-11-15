<div>
    <div class="flex items-center">
        <div>
            <i class="uil uil-search"></i>
        </div>
        <div>
            <input wire:model.live="name" type="text" placeholder="Search here...">
        </div>
    </div>

    <div class="mt-[60px]">
        <ul class="flex items-center flex-col gap-y-2">
            @if (strlen($name) >= 2)
                @if ($data->count() > 0)
                    @foreach ($data as $item)
                        <li class="whitespace-nowrap truncate w-[500px] flex gap-y-2 items-center gap-x-2 mr-[100px]">
                            <img src="{{ $item->image  }}" alt="{{ $item->name  }}" width="50px rounded-full">
                            <span>{{ $item->name  }}</span>
                        </li>
                    @endforeach
                @else
                    <div class="px-3 py-3">No results for "{{ $name }}"</div>
                @endif
            @endif
        </ul>
    </div>
</div>
