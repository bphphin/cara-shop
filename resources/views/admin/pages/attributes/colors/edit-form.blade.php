@extends('admin.layouts.app')
@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="py-20">
                <h3 class="text-gray-400 mb-4">Chỉnh sửa màu sắc</h3>
                <form method="POST" action="{{ route('admin.att.color.update',$color->id)  }}">
                    @csrf
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="name" id="floating_email"
                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                               placeholder=" " value="{{ $color->name ?? '' }}"/>
                        <label for="floating_email"
                               class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Color</label>
                        @error('name')
                        <p class="text-red-600 mt-3">{{ $message  }}</p>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <label for=""
                               class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Mã màu
                        </label>
                        <div class="flex items-center gap-x-2">
                            <input type="color" name="code" id="changeColorInput"
                                   class="my-5"
                                   placeholder=" " value="{{ $color->code ?? ''  }}"/>
                            @error('code')
                            <p class="text-red-600 mt-3">{{ $message  }}</p>
                            @enderror
                            <div class="bg-[{{ $color->code  }}] w-[50px] h-[50px] rounded-full" id="changColor"></div>
                        </div>
                    </div>
                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Submit
                    </button>
                    <a href="{{ route('admin.att.index')  }}"
                       class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Cancel
                    </a>
                </form>
            </div>
        </div>
    </div>
    @push('script')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script>
            // đổi màu
            $('#changeColorInput').on('change', function () {
                $('#changColor').css('background-color', $('#changeColorInput').val());
            });
        </script>
    @endpush
@endsection
