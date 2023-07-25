@extends('admin.layouts.app')
@section('app')
    <div class="dash-content">
        <div class="activity">
            <label for="underline_select" class="sr-only">Underline select</label>
            <select id="underline_select"
                    class="select block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                <option selected value="default">Choose a attribute</option>
                <option value="color" id="color">Color</option>
                <option value="size" id="size">Size</option>
            </select>
            <div class="my-20">
                <div class="">
                    <div class="flex box-default justify-center align-center">
                        <img src="{{ url('https://cdn.dribbble.com/users/77598/screenshots/16399264/media/d86ceb1ad552398787fb76f343080aa6.gif')  }}" alt="" class="h-[300px]">
                    </div>
                    <div class="w-[100%] hidden box-color">
                        <div class="flex justify-start my-2">
                            <a href="{{ route('admin.category.create')  }}"
                               class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mx-2 rounded-full">+ Color
                            </a>
                        </div>
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Product name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Color
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Category
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Price
                                    </th>
                                    <th scope="col" class="px-6 py-3 w-[300px]">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Apple MacBook Pro 17"
                                    </th>
                                    <td class="px-6 py-4">
                                        Silver
                                    </td>
                                    <td class="px-6 py-4">
                                        Laptop
                                    </td>
                                    <td class="px-6 py-4">
                                        $2999
                                    </td>
                                    <td class="px-6 py-4">
                                        <button type="button"
                                                class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                            Red
                                        </button>
                                        <button type="button"
                                                class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                            Red
                                        </button>
                                        <button type="button"
                                                class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                            Red
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="w-[100%] hidden box-size">
                        <div class="flex justify-start my-2">
                            <a href="{{ route('admin.att.size.store')  }}"
                               class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mx-2 rounded-full">+ Size
                            </a>
                        </div>
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Size
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sizes as $size)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="w-[250px] px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $size->name  }}
                                        </th>
                                        <td class="px-6 py-4 w-[200px]">
                                            <div class="flex gap-x-4">
                                                <a href="" class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                                    Detail
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                                    Edit
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>
{{--                                                <a href="{{ route('admin.att.size.destroy',$size->id)  }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" date-confirm-delete="true">--}}
{{--                                                    Remove--}}
{{--                                                    <i class="fa-solid fa-pen"></i>--}}
{{--                                                </a>--}}
                                                <form action="{{ route('admin.att.size.destroy',$size->id)  }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full" onclick="return confirm('Bạn có muốn xóa không??')">
                                                        Remove
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script>
            $( ".select" ).on( "change", function() {
                const _select = $('.select').val();
                if(_select === 'color'){
                    $('.box-color').show();
                    $('.box-size').hide();
                    $('.box-default').hide();
                }
                else if(_select === 'size'){
                    $('.box-color').hide();
                    $('.box-size').show();
                    $('.box-default').hide();
                }else {
                    $('.box-color').hide();
                    $('.box-size').hide();
                    $('.box-default').show();
                }
            } );
        </script>
    @endpush
@endsection
