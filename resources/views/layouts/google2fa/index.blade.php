<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Enable 2 FA') }}
        </h2>
    </x-slot>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
                    <h4 class="card-heading mt-3 text-center">
                        Nhập code để tiếp tục đăng nhập
                    </h4>
                    <form action="{{route('2fa.authenticate')}}" method="POST">
                        @csrf
                        <label>
                            <input name="one_time_password" type="text">
                        </label>
                        <button type="submit">Authenticate</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>