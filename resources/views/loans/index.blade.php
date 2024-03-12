<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-300 leading-tight">
            {{ __('Loans') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4">
        <div class="py-6">
            <a href="{{ route('loans.create') }}"
                class="bg-blue-500 dark:bg-gray-700 hover:bg-blue-700 dark:hover:bg-gray-800 text-white font-bold py-2 px-4 rounded">Create
                new loan</a>
        </div>
        <div class="flex flex-col">
            <h1 class="text-xl font-semibold mb-4 dark:text-gray-300">Dynamic Search</h1>
            <input type="text" id="search"
                class="w-full border-2 border-gray-300 bg-white dark:bg-gray-800 h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none mb-4"
                placeholder="Search">
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden dark:bg-gray-800">
                    <table class="min-w-full leading-normal w-full">
                        <thead>
                            <tr>
                                {{-- usuario --}}
                                <th
                                    class="py-3 px-6 text-left bg-gray-200 dark:bg-gray-700 border-b border-gray-300 dark:border-gray-600 text-sm font-semibold text-gray-800 dark:text-gray-300 uppercase tracking-wider">
                                    User</th>
                                <th
                                    class="py-3 px-6 text-left bg-gray-200 dark:bg-gray-700 border-b border-gray-300 dark:border-gray-600 text-sm font-semibold text-gray-800 dark:text-gray-300 uppercase tracking-wider">
                                    Item</th>
                                {{-- fecha de prestamo --}}
                                <th
                                    class="py-3 px-6 text-left bg-gray-200 dark:bg-gray-700 border-b border-gray-300 dark:border-gray-600 text-sm font-semibold text-gray-800 dark:text-gray-300 uppercase tracking-wider">
                                    Fecha de Préstamo</th>
                                {{-- fecha de devolucion --}}
                                <th
                                    class="py-3 px-6 text-left bg-gray-200 dark:bg-gray-700 border-b border-gray-300 dark:border-gray-600 text-sm font-semibold text-gray-800 dark:text-gray-300 uppercase tracking-wider">
                                    Fecha de Devolución</th>
                                {{-- fecha de retorno --}}
                                <th
                                    class="py-3 px-6 text-left bg-gray-200 dark:bg-gray-700 border-b border-gray-300 dark:border-gray-600 text-sm font-semibold text-gray-800 dark:text-gray-300 uppercase tracking-wider">
                                    Fecha de retorno</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loans as $loan)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-900 w-full">
                                    {{-- usuario --}}
                                    <td
                                        class="py-4 px-6 border-b border-gray-300 dark:border-gray-600 text-sm dark:text-gray-300">
                                        {{ $loan->user->name }}</td>
                                    {{-- item --}}
                                    <td id="nameSearch"
                                        class="py-4 px-6 border-b border-gray-300 dark:border-gray-600 text-sm dark:text-gray-300">
                                        {{ $loan->item->name }}</td>
                                    {{-- fecha de prestamo --}}
                                    <td
                                        class="py-4 px-6 border-b border-gray-300 dark:border-gray-600 text-sm dark:text-gray-300">
                                        {{ $loan->checkout_date }}</td>
                                    {{-- fecha de devolucion --}}
                                    <td
                                        class="py-4 px-6 border-b border-gray-300 dark:border-gray-600 text-sm dark:text-gray-300">
                                        {{ $loan->due_date }}</td>
                                    {{-- fecha de retorno--}}
                                    <td
                                        class="py-4 px-6 border-b border-gray-300 dark:border-gray-600 text-sm dark:text-gray-300">
                                        @if ($loan->returned_date == null)
                                            <form action="{{ route('loans.update', $loan->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="returned_date" value="{{ now() }}">
                                                <button type="submit"
                                                    class="bg-blue-500 dark:bg-gray-700 hover:bg-blue-700 dark:hover:bg-gray-800 text-white font-bold py-2 px-4 rounded">Return</button>
                                            </form>
                                        @else
                                            {{ $loan->returned_date }}
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/dynamicSearch.js') }}"></script>

</x-app-layout>
