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
                            <path d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </div>

                <!-- Sidebar -->
                @include('includes.adminsidebar')
                @include('components.sweetalert')
                
                <!-- Main Content Area -->
                <div class="col-span-1 sm:col-span-3">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <form action="{{ route('center.store.update', $center->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-4">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Center Name</label>
                                    <input type="text" id="title" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{ old('name', $center->name) }}">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                                    <select id="state" name="state" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                                        <option value="">{{ __('Select a state') }}</option>
                                        @foreach (include(resource_path('states.php')) as $state)
                                            <option value="{{ $state }}" {{ $center->state == $state ? 'selected' : '' }}>{{ $state }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('state')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="code" class="block text-sm font-medium text-gray-700">Center Code</label>
                                    <input type="text" id="code" name="code" placeholder="E.g ABJ" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{ old('code', $center->code) }}">
                                    <x-input-error :messages="$errors->get('code')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="address" class="block text-sm font-medium text-gray-700">Center Address</label>
                                    <textarea id="address" name="address" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" style="resize: none">{{ old('address', $center->address) }}</textarea>
                                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                </div>

                                <div>
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    @include('includes.script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectedState = "{{ $center->state }}";
            const stateSelect = document.getElementById('state');

            // Set the selected state in the dropdown
            for (let i = 0; i < stateSelect.options.length; i++) {
                if (stateSelect.options[i].value === selectedState) {
                    stateSelect.options[i].setAttribute('selected', 'selected');
                }
            }
        });
    </script>
</x-app-layout> --}}



@extends('admin.index')
  @section('slot')
  @include('components.sweetalert')
  <div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Centres</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item " aria-current="page">Centre</li>
                        <li class="breadcrumb-item active" aria-current="page">Update</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">List of Centres</button>

                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Create Centre</h6>
        <hr/>
        <div class="card">
            <div class="card-body">



                    <h6 class="mb-0 text-uppercase">Centre</h6>
                    <hr/>
                    <form action="{{ route('center.store.update', $center->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                            <label for="name" class="form-label">Center Name</label>
                            <input class="form-control w-100 form-control-lg mb-3"  type="text" id="title" name="name" value="{{ old('name', $center->name) }}" aria-label=".form-control-lg example">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                
                                <label for="state" class="form-label">State</label>
                                <select class="form-control w-100 form-control-lg mb-3" id="state" name="state" aria-label=".form-control-lg example">
                                    <option value="">{{ __('Select a state') }}</option>
                                    @foreach (include(resource_path('states.php')) as $state)
                                        <option value="{{ $state }}" {{ $center->state == $state ? 'selected' : '' }}>{{ $state }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('state')" class="mt-2" />

                                
                            <label for="code" class="form-label">Center Code</label>
                            <input class="form-control  w-100 form-control-lg mb-3" type="text" id="code" name="code" placeholder="E.g ABJ" aria-label=".form-control-lg example" value="{{ old('code', $center->code) }}">
                            <x-input-error :messages="$errors->get('code')" class="mt-2" />

                                <label for="address" class="form-label">Center Address</label>
                                <textarea class="form-control w-100 form-control-lg mb-3" id="address" name="address" rows="4"  style="resize: none" aria-label=".form-control-lg example">{{ old('address', $center->address) }}</textarea>
                                <x-input-error :messages="$errors->get('address')" class="mt-2" />


                        <button class="btn btn-primary px-4" >
                            Update
                            <i class="bx bx-right-arrow-alt ms-2"></i>
                        </button>
                        </form>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectedState = "{{ $center->state }}";
        const stateSelect = document.getElementById('state');

        // Set the selected state in the dropdown
        for (let i = 0; i < stateSelect.options.length; i++) {
            if (stateSelect.options[i].value === selectedState) {
                stateSelect.options[i].setAttribute('selected', 'selected');
            }
        }
    });
</script>
  @endsection


