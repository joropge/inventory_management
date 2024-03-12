<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-300 leading-tight">
            {{ __('Items') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4">
        <div class="py-6">
            <a href="{{ route('items.create') }}" class="bg-blue-500 dark:bg-gray-700 hover:bg-blue-700 dark:hover:bg-gray-800 text-white font-bold py-2 px-4 rounded">Create new item</a>
        </div>
        <div class="flex flex-col">
            <h1 class="text-xl font-semibold mb-4 dark:text-gray-300">Dynamic Search</h1>
            <input type="text" id="search" class="w-full border-2 border-gray-300 bg-white dark:bg-gray-800 h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none mb-4" placeholder="Search">
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden dark:bg-gray-800">
                    <table class="min-w-full leading-normal w-full">
                        <thead>
                            <tr>
                                <th class="py-3 px-6 text-left bg-gray-200 dark:bg-gray-700 border-b border-gray-300 dark:border-gray-600 text-sm font-semibold text-gray-800 dark:text-gray-300 uppercase tracking-wider">Name</th>
                                <th class="py-3 px-6 text-left bg-gray-200 dark:bg-gray-700 border-b border-gray-300 dark:border-gray-600 text-sm font-semibold text-gray-800 dark:text-gray-300 uppercase tracking-wider">Box</th>
                                <th class="py-3 px-6 text-left bg-gray-200 dark:bg-gray-700 border-b border-gray-300 dark:border-gray-600 text-sm font-semibold text-gray-800 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-900 w-full">
                                
                                <td id="nameSearch" class="py-4 px-6 border-b border-gray-300 dark:border-gray-600 text-sm dark:text-gray-300">{{ $item->name }}</td>
                                <td class="py-4 px-6 border-b border-gray-300 dark:border-gray-600 text-sm dark:text-gray-300">{{ $item->box->label }}</td>
                                <td class="py-4 px-6 border-b border-gray-300 dark:border-gray-600 text-sm">
                                    {{-- ver --}}
                                    <a href="{{ route('items.show', $item->id) }}" class="text-green-500 dark:text-green-400 hover:text-green-700 dark:hover:text-green-500">View</a>
                                    {{-- editar --}}
                                    <a href="{{ route('items.edit', $item->id) }}" class="text-blue-500 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-500">Edit</a>
                                    <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 dark:text-red-400 hover:text-red-700 dark:hover:text-red-500 ml-2">Delete</button>
                                    </form>
                                {{-- prestar  --}}
                                    <a href="{{ route('loans.create', ['item_id' => $item->id]) }}" class="text-blue-500 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-500">Prestar</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('js/dynamicSearch.js')}}"></script>

</x-app-layout>
