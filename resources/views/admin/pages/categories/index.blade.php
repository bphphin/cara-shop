@extends('admin.layouts.app')
@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="py10">
                <label for="underline_select" class="sr-only">Underline select</label>
                <select id="underline_select"
                        class="select block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                    <option selected value="default">Choose a category</option>
                    <option value="thoitrang" id="thoitrang">Thời trang</option>
                    <option value="giaydep" id="giaydep">Giày Dép</option>
                </select>
            </div>
            <div class="py-[100px]">
                {{-- Box default --}}
                <div class="block box-default">
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('admin.category.create')  }}"
                           class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mx-2 rounded-full">+
                            New
                            Category</a>
                        <a href="{{ route('admin.cate.subcate.store')  }}"
                           class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mx-2 rounded-full">+
                            New
                            Sub Category</a>
                        <a
                            class="bg-[#f687b3] hover:bg-[#f687b3] text-white font-bold py-2 px-4 rounded-full"
                            href="{{ route('admin.category.trash')  }}">
                            Trash
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </div>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 w-[200px]">
                                    Slug
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Description
                                </th>
                                <th scope="col" class="px-6 py-3 w-[300px]">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cates as $cate)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td scope="row" class="px-6 py-4">
                                        {{ $cate->name  }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $cate->slug  }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $cate->description  }}
                                    </td>
                                    <td class="px-6 py-4 flex gap-x-4">
                                        <a href="{{ route('admin.category.edit',$cate->id)  }}"
                                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                            Edit
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <form action="{{ route('admin.category.softDelete',$cate->id)  }}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                                                Remove
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- end box default --}}

                {{-- box thời trang --}}
                    @include('admin.pages.categories.sub-cate.fashions.index')
                {{-- end box thời trang --}}

                {{-- box phụ kiện, trang sức --}}
                    @include('admin.pages.categories.sub-cate.accessory.index')
                {{-- end box phụ kiện, trang sức --}}

                {{-- box sắc đẹp --}}
                    @include('admin.pages.categories.sub-cate.beauty.index')
                {{-- end box sắc đẹp --}}
            </div>
            {{ $cates->links('admin.layouts.pagination')  }}
        </div>
    </div>
    @push('script')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script>
            $(".select").on("change", function () {
                const _select = $('.select').val();
                if (_select === 'thoitrang') {
                    $('.box-style').show();
                    $('.box-assets').hide();
                    $('.box-beautiful').hide();
                    $('.box-default').hide();
                } else if (_select === 'giaydep') {
                    $('.box-style').hide();
                    $('.box-assets').show();
                    $('.box-beautiful').hide();
                    $('.box-default').hide();
                }else {
                    $('.box-style').hide();
                    $('.box-assets').hide();
                    $('.box-beautiful').hide();
                    $('.box-default').show();
                }
            });
        </script>
    @endpush
@endsection
