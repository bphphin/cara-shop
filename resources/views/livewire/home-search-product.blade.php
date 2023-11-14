<div>
    <div class="search border">
        <input wire:model.live="name" type="text" placeholder="Search product">
    </div>
    <div class="ml-[200px] my-2">
        <ul>
            @if (strlen($name) >= 2)
                @if ($data->count() > 0)
                    @foreach ($data as $item)
                        <li class="my-2 py-2">
                            <a href="{{route('home.site.product.show',['id' => $item->id,'slug' => $item->slug])."?cate=$item->cate_id"}}"
                               class="flex gap-x-2 items-center">
                                <img src="{{ $item->image  }}" alt="" class="w-[50px] rounded-full">
                                <p>{{ $item->name  }}</p>
                            </a>
                        </li>
                    @endforeach
                @else
                    <div class="px-3 py-3">No results for "{{ $name }}"</div>
                @endif
            @endif
        </ul>
    </div>
</div>
