<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Include Tailwind JIT CDN compiler -->
                    <!-- More info: https://beyondco.de/blog/tailwind-jit-compiler-via-cdn -->
                    <script src="https://unpkg.com/tailwindcss-jit-cdn"></script>

                    <!-- Snippet -->
                    <section class="flex flex-col justify-center antialiased p-4">
                        <div class="h-full">
                            <!-- Table -->
                            <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                                <header class="px-5 py-4 border-b border-gray-100">
                                    <h2 class="font-semibold text-gray-800">Users</h2>
                                </header>
                                <div class="p-3">
                                    <div class="overflow-x-auto">
                                        <table class="table-auto w-full">
                                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                                <tr>
                                                    <th class="p-2 whitespace-nowrap">
                                                        <div class="font-semibold text-left">Name</div>
                                                    </th>
                                                    <th class="p-2 whitespace-nowrap">
                                                        <div class="font-semibold text-left">Email</div>
                                                    </th>
                                                    <th class="p-2 whitespace-nowrap">
                                                        <div class="font-semibold text-left">Cep</div>
                                                    </th>
                                                    <th class="p-2 whitespace-nowrap">
                                                        <div class="font-semibold text-left"></div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-sm divide-y divide-gray-100">
                                    @foreach($users as $user)
                                                <tr>
                                                    <td class="p-2 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            <div class="font-medium text-gray-800">{{$user->name}}</div>
                                                        </div>
                                                    </td>
                                                    <td class="p-2 whitespace-nowrap">
                                                        <div class="text-left">{{$user->email}}</div>
                                                    </td>
                                                    <td class="p-2 whitespace-nowrap">
                                                        <div class="text-left font-medium">{{$user->cep}}</div>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('profile.edit') }}">
                                                        <x-primary-button>{{ __('Edit') }}</x-primary-button>
                                                        </a>
                                                    </td>
                                                </tr>
                                    @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
