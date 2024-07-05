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
                            <form action="{{route('coupon.store')}}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="part_id" class="block text-sm font-medium text-gray-700">Select Program with Part</label>
                                    <select id="part_id" name="part_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                                        <option disabled selected>Select Program with part</option>
                                        @foreach ($parts as $part)
                                            <option value="{{ $part->id }}">{{ $part->name }} of {{ $part->program->title }} </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('part_id')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="percentage_discount" class="block text-sm font-medium text-gray-700">Enter Discounted Percentage</label>
                                    <input type="number" placeholder="E.g 50 don't add % just add numeric" min="1" id="percentage_discount" name="percentage_discount" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" :value="__('percentage_discount')">
                                    <x-input-error :messages="$errors->get('percentage_discount')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="start_date" class="block text-sm font-medium text-gray-700">Enter Start Date</label>
                                    <input type="date" id="start_date" name="start_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" :value="__('start_date')">
                                    <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="end_date" class="block text-sm font-medium text-gray-700">Enter End Date</label>
                                    <input type="date" id="end_date" name="end_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" :value="__('end_date')">
                                    <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="code" class="block text-sm font-medium text-gray-700">Enter Code</label>
                                    <input type="text" id="code" name="code" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" :value="__('code')">
                                    <x-input-error :messages="$errors->get('code')" class="mt-2" />
                                </div>

                                <div>
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Submit
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
    
</x-app-layout>
