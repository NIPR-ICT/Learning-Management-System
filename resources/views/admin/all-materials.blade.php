<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                <!-- Sidebar Toggle Button (Visible on small screens) -->
                <div class="sm:hidden mb-4">
                    <button id="sidebarToggle" class="focus:outline-none">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </div>

                <!-- Sidebar -->
                @include('includes.adminsidebar')

                <!-- Main Content Area -->
                <div class="col-span-1 sm:col-span-3 p-4 sm:p-6"> <!-- Added p-4 and sm:p-6 for padding -->
                    <div class="container mx-auto">
                        <div class="flex justify-between items-center mb-4">
                            <h1 class="text-2xl font-bold">All Materials</h1>
                            <input id="searchInput" type="text" placeholder="Search..."
                                class="px-4 py-2 border rounded shadow">
                        </div>
                        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                            <table class="min-w-full bg-white">
                                <thead class="bg-red-800 text-white text-left">
                                    <tr>
                                        <th class="w-1/5 py-3 px-4 uppercase font-semibold text-sm">Title</th>
                                        <th class="w-2/5 py-3 px-4 uppercase font-semibold text-sm">Type</th>
                                        <th class="w-2/5 py-3 px-4 uppercase font-semibold text-sm">Course</th>
                                        <th class="w-2/5 py-3 px-4 uppercase font-semibold text-sm">Lesson</th>
                                        <th class="w-2/5 py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700" id="tableBody">
                                    @foreach ($materials as $material)
                                        <tr class="hover:bg-gray-200">
                                            <td class="py-3 px-4">{{ $material->title }}</td>
                                            <td class="py-3 px-4">{{ $material->type }}</td>
                                            <td class="py-3 px-4">{{ $material->course->title }}</td>
                                            <td class="py-3 px-4">{{ $material->lesson->title }}</td>
                                            <td class="py-3 px-4 flex space-x-2">
                                                <a href="{{ route('materials.download', $material->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-light py-2 px-4 rounded">Download</a>
                                                <form action="{{ route('material.delete', $material->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Material?');" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination Links -->
                        <div class="mt-4">
                            {{ $materials->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>







    <!-- JavaScript Section -->
    <script>
        
        document.getElementById('searchInput').addEventListener('keyup', function() {
            var input = this.value.toLowerCase();
            var rows = document.querySelectorAll('#tableBody tr');
            
            rows.forEach(function(row) {
                var text = row.textContent.toLowerCase();
                row.style.display = text.includes(input) ? '' : 'none';
            });
        });
    </script>

    @include('includes.script')

</x-app-layout>