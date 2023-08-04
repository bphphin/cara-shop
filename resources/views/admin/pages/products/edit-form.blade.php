@extends('admin.layouts.app')
@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="py-20">
                <h3 class="text-gray-400 mb-4">Chỉnh sửa sản phẩm</h3>
                <form method="POST" action="{{ route('admin.product.update',$product->id)  }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-2 gap-x-6">
                        <div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="name" id=""
                                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                       placeholder=" " value="{{ $product->name  }}"/>
                                <label for=""
                                       class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                    Tên sản phẩm</label>
                                @error('name')
                                <p class="my-2 text-red-400">{{ $message  }}</p>
                                @enderror
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                       for="file_input">Upload image</label>
                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    id="img" type="file" name="image">
                                <div class="my-4 flex justify-center">
                                    <img src="{{ asset('upload').'/'.$product->image  }}" alt="" class="w-[200px]">
                                </div>
                                @error('image')
                                <p class="my-2 text-red-400">{{ $message  }}</p>
                                @enderror
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="price" id=""
                                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                       placeholder=" " name="price" value="{{ $product->price  }}"/>
                                <label for=""
                                       class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Price</label>
                                @error('price')
                                <p class="my-2 text-red-400">{{ $message  }}</p>
                                @enderror
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="quantity" id=""
                                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                       placeholder=" " name="quantity" value="{{ $product->quantity  }}"/>
                                <label for=""
                                       class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Quantity</label>
                                @error('quantity')
                                <p class="my-2 text-red-400">{{ $message  }}</p>
                                @enderror
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="" class="block mb-2 text-sm font-medium text-gray-700 dark:text-white">Select an status</label>
                                <select  name="status_id" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($sttProduct as $stt)
                                        <option value="{{ $stt->id }}" {{ $stt->id === $product->status_id ? 'Selected' : '' }}>{{ $stt->status }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="" class="block mb-2 text-sm font-medium text-gray-700 dark:text-white">Select
                                    an category</label>
                                <select name="cate_id" id=""
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($cates as $cate)
                                        <option
                                            value="{{ $cate->id }}" {{ $cate->id === $product->cate_id ? 'Selected' : ''  }}>{{ $cate->name }}</option>
                                    @endforeach
                                </select>
                                @error('cate_id')
                                <p class="my-2 text-red-400">{{ $message  }}</p>
                                @enderror
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                                    an brand</label>
                                <select name="brand_id" id=""
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($brands as $brand)
                                        <option
                                            value="{{ $brand->id }}" {{ $brand->id === $product->brand_id ? 'Selected' : ''  }}>{{ $brand->name }}</option>
                                    @endforeach
                                        @error('brand_id')
                                        <p class="my-2 text-red-400">{{ $message  }}</p>
                                        @enderror
                                </select>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                                    an size</label>
                                <select name="size_id" id=""
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($sizes as $size)
                                        <option
                                            value="{{ $size->id }}" {{ $size->id === $product->size_id ? 'Selected' : ''  }}>{{ $size->name }}</option>
                                    @endforeach
                                        @error('size_id')
                                        <p class="my-2 text-red-400">{{ $message  }}</p>
                                        @enderror
                                </select>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <div class="flex gap-x-2 mt-4">
                                    @foreach ($colors as $color)
                                        @if($color->id === $product->color_id)
                                            <div class="w-[35px] h-[35px] bg-[{{ $color->code }}] cursor-pointer"
                                                 onclick="chooseColor(`{{ $color->id }}`)"></div>
                                        @endif
                                    @endforeach
                                </div>
                                <label for="" class="block my-4 text-sm font-medium text-gray-900 dark:text-white">Select
                                    an new color</label>
                                <div class="flex gap-x-2 mt-4">
                                    @foreach ($colors as $color)
                                        <div class="w-[35px] h-[35px] bg-[{{ $color->code }}] cursor-pointer"
                                             onclick="chooseColor(`{{ $color->id }}`)"></div>
                                    @endforeach
                                </div>
                                <input type="hidden" name="color_id" id="color">
                                @error('color_id')
                                <p class="my-2 text-red-400">{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                            description</label>
                        <textarea id="desc" rows="4"
                                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                  placeholder="Write your thoughts here..." name="description">{{ $product->description  }}</textarea>
                    </div>
                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Submit
                    </button>
                    <a href="{{ route('admin.product.index')  }}"
                       class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>

        // get input value color
        function chooseColor(color) {
            console.log(document.querySelector(`input[name="color_id"]`).value = color);
        }

        // ck editor
        ClassicEditor
            .create(document.querySelector('#desc'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
