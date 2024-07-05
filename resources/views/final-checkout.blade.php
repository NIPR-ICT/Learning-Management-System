<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Dashboard') }}
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
                @include('includes.studentsidebar')

                <!-- Main Content Area -->
                @if (session()->has('totalAmount2') && session()->has('part'))
                <div class="col-span-1 sm:col-span-2">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h2 class="text-xl font-semibold mb-4">Checkout Payable Amount</h2>
                            <div class="mb-4">
                                <label class="block text-gray-700">Course Title:</label>
                                <?php $part = session('part'); ?>
                                <p class="text-lg font-medium">{{ $part->name }} of {{ $part->program->title }}</p>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700">Amount:</label>
                                <p class="text-lg font-medium">₦{{session('totalAmount2') }}</p>
                            </div>
                            <form action="{{ route('apply.coupon') }}" method="POST">
                                @csrf
                            <div class="mb-4">
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded w-full sm:w-auto">Pay</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <script type="text/javascript">
                    window.location = "{{ url()->previous() }}";
                </script>
                @endif
            </div>
        </div>
    </div>

    @include('includes.script')

</x-app-layout>
