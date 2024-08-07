{{-- <x-app-layout>
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
                            <h1 class="text-2xl font-bold">All Course Part</h1>
                            <input id="searchInput" type="text" placeholder="Search..."
                                class="px-4 py-2 border rounded shadow">
                        </div>
                        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                            <table class="min-w-full bg-white">
                                <thead class="bg-red-800 text-left text-white">
                                    <tr>
                                        <th class="w-1/5 py-3 px-4 uppercase font-semibold text-sm">Program Name</th>
                                        <th class="w-2/5 py-3 px-4 uppercase font-semibold text-sm">Part</th>
                                        <th class="w-2/5 py-3 px-4 uppercase font-semibold text-sm">Min</th>
                                        <th class="w-2/5 py-3 px-4 uppercase font-semibold text-sm">Max</th>
                                        <th class="w-2/5 py-3 px-4 uppercase font-semibold text-sm">Description</th>
                                        <th class="w-1/5 py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700" id="tableBody">
                                    @foreach ($parts as $part)
                                        <tr class="hover:bg-gray-200">
                                            <td class="py-3 px-4">{{ $part->program->title }}</td>
                                            <td class="py-3 px-4">
                                                {{ $part->name }}
                                            </td>
                                            <td class="py-3 px-4">
                                                {{ $part->min_credit }}
                                            </td>

                                            <td class="py-3 px-4">
                                                {{ $part->max_credit }}
                                            </td>
                                            <td class="py-3 px-4">
                                                @php
                                                $description = $part->description;
                                                $words = explode(' ', $description);
                                                $shortened = implode(' ', array_slice($words, 0, 4));
                                                if (count($words) > 4) {
                                                    $shortened .= '...';
                                                }
                                            @endphp
                                            {{ $shortened }}
                                            </td>
                                            <td class="py-3 px-4 space-x-2">

                                                 {{ route('program.destroy', $program->id) }}
                                                <form action="{{ route('part.delete', $part->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Part?');" style="display:inline;">
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
                            {{ $parts->links() }}
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

</x-app-layout> --}}


@extends('admin.index')
@include('components.sweetalert')
  @section('slot')
  <div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Programme Part</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">List</li>
                    </ol>
                </nav>
            </div>
            {{-- <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">Add Programme</button>

                </div>
            </div> --}}
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
            <h6 class="mb-0 text-uppercase">All Programme Part</h6>
            <hr/>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Program Name</th>
                                <th>Level</th>
                                <th>Accessing Order</th>
                                <th>Min</th>
                                <th>Max</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($parts as $part)
                                        <tr class="hover:bg-gray-200">
                                            <td >{{ $part->program->title }}</td>
                                            <td >
                                                {{ $part->name }}
                                            </td>
                                            <td >
                                                {{ $part->accessing_order }}
                                            </td>
                                            <td >
                                                {{ $part->min_credit }}
                                            </td>

                                            <td >
                                                {{ $part->max_credit }}
                                            </td>
                                            <td >
                                                {{Str::words($part->description, 15, '...') }}

                                            </td>
                                            <td class="py-3 px-4 space-x-2">

                                                <a href="{{ route('show.edit.form', $part->id) }}" class="btn btn-info">Edit</a>
                                                <form action="{{ route('part.delete', $part->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Part?');" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        Delete
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Program Name</th>
                                <th>Level</th>
                                <th>Min</th>
                                <th>Max</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        {{ $parts->links('pagination::bootstrap-4') }}
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
  @endsection
