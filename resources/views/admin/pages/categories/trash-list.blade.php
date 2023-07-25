@extends('admin.layouts.app')
@section('app')
    <div class="dash-content">
        <div class="activity py-20">
            <div class="flex justify-end my-2">
                <a
                    class="bg-[#4fd1c5] text-white font-bold py-2 px-4 rounded-full"
                    href="{{ route('admin.category.index')  }}">
                    Back
                    <i class="fa-solid fa-arrow-rotate-left"></i>
                </a>
            </div>
            <div class="relative overflow-x-auto">
                @if(count($cates) > 0)
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead
                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 w-[200px]">
                                Brand
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
                                    {{ $cate->name ?? '' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $cate->description ?? '' }}
                                </td>
                                <td class="px-6 py-4 flex gap-x-4">
                                    <a href="{{ route('admin.category.restore',$cate->id)  }}"
                                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                        Restore
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
{{--                                    <a href="{{ route('admin.category.destroy',$cate->id)  }}"--}}
{{--                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full"--}}
{{--                                        data-confirm-delete="true">--}}
{{--                                        Remove--}}
{{--                                        <i class="fa-solid fa-xmark"></i>--}}
{{--                                    </a>--}}
                                    <form action="{{ route('admin.category.destroy',$cate->id)  }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full"
                                            data-confirm-delete="true" onclick="return afterRemove()">
                                            Remove
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div role="alert">
                        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                            <i class="fa-solid fa-exclamation"></i>
                        </div>
                        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                            <p>Danh sách trống</p>
                        </div>
                    </div>
                @endif
            </div>
            {{ $cates->links('admin.layouts.pagination')  }}
        </div>
    </div>
    @push('script')
        <script>
            function afterRemove() {
                // swal({
                //     title: 'Bạn có muốn xóa không',
                //     icon: 'danger',
                //     buttons: true,
                //     dangerMode: true
                // });
                return confirm('Bạn có muốn xóa không??');
            }
        </script>
    @endpush
@endsection
