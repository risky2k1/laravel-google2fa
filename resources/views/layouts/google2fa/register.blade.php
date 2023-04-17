<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Enable 2 FA') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
                    <h4 class="card-heading mt-3 text-center">
                        Thiết lập xác thực 2 lớp
                    </h4>
                    <form action="{{route('2fa.register')}}" method="post">
                        @csrf
                        <div class="flex-auto p-6 text-center">
                            <label>
                                Sử dụng code:
                                <input type="hidden" name="secret" value="{{$secret}}">
                                <input type="text" name="secret" value="{{$secret}}" disabled>
                            </label>
                            <br>
                            <span>hoặc dùng mã QR sau:</span>

                            <div class="flex justify-center items-center">
                                <br>
                                {!! $qr_image !!}
                            </div>
                        </div>
                        <div class="flex justify-center items-center">
                            <button type="submit"
                                    class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-green-500 text-white hover:green-600">
                                Hoàn
                                thành việc thiết lập
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>