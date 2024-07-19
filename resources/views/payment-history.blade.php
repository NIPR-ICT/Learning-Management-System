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
                @include('includes.studentsidebar')

                <!-- Main Content Area -->
                <div class="col-span-1 sm:col-span-3 p-4 sm:p-6"> <!-- Added p-4 and sm:p-6 for padding -->
                    <div class="container mx-auto">
                        <div class="flex justify-between items-center mb-4">
                            <h1 class="text-2xl font-bold">Payment History</h1>
                            <input id="searchInput" type="text" placeholder="Search..."
                                class="px-4 py-2 border rounded shadow">
                        </div>
                        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                            @if($loginUserTransactions->isEmpty())
                                <div class="p-4">
                                    <p class="text-gray-600">No transaction history.</p>
                                </div>
                            @else
                                <table class="min-w-full bg-white text-left">
                                    <thead class="bg-red-800 text-white">
                                        <tr>
                                            <th class="w-1/5 py-3 px-4 uppercase font-semibold text-sm">Transaction ID</th>
                                            <th class="w-2/5 py-3 px-4 uppercase font-semibold text-sm">Amount</th>
                                            <th class="w-2/5 py-3 px-4 uppercase font-semibold text-sm">Discounted Amount</th>
                                            <th class="w-2/5 py-3 px-4 uppercase font-semibold text-sm">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-700" id="tableBody">
                                        @foreach ($loginUserTransactions as $transaction)
                                            <tr class="hover:bg-gray-200">
                                            <td class="py-3 px-4">{{ $transaction->ref  }}</td>
                                            <td class="py-3 px-4">{{ $transaction->amount }}</td>
                                            <td class="py-3 px-4">{{ $transaction->discountAmount}}</td>
                                            <td class="py-3 px-4">{{ $transaction->created_at}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        <!-- Pagination Links (if applicable) -->
                        <!-- <div class="mt-4">
                            {{ $loginUserTransactions->links() }}
                        </div> -->
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

@extends('welcome')
<div class="breadcrumb-bar py-5">
</div>
  @section('content')

<!-- Page Content -->
<div class="page-content">
    <div class="container">
        <div class="row">

			<div class="col-xl-3 col-lg-3">
                @include('includes.layout-frontend.side-bar')
            </div>

						<!-- Student Order History -->
						<div class="col-xl-9 col-lg-9">
                                    @if($loginUserTransactions->isEmpty())
                                    <div class="settings-widget card-details">
                                        <div class="settings-menu p-0">
                                            <div class="profile-heading">
                                                <h3>Order History</h3>
                                            </div>
                                            <div class="checkout-form">
                                            <h6 >No transaction history.</h6>
                                        </div>
                                        </div>
                                        </div>
                                    @else 
							<div class="settings-widget card-details">
								<div class="settings-menu p-0">
									<div class="profile-heading">
										<h3>Order History</h3>
									</div>
									<div class="checkout-form">
										<!-- /Order Tabs -->

										<!-- Tab Content -->
										<div class="tab-content">

											<!-- Today -->
											<div class="tab-pane show active" id="today">
												<div class="table-responsive custom-table">


                                                    <table class="table table-nowrap mb-0">
														<thead>
														  <tr>
															<th>Transaction ID</th>
															{{-- <th>Course Name</th> --}}
															<th>Amount</th>
															<th>Discount Amount</th>
															<th>Date</th>
															<th></th>

														  </tr>
														</thead>
														<tbody>

                                                            @foreach ($loginUserTransactions as $transaction)
                                                            <tr class="hover:bg-gray-200">
                                                            <td >{{ $transaction->ref  }}</td>
                                                            {{-- <td class="title-course">{{$transaction->id}}</td> --}}
                                                            <td >{{ $transaction->amount }}</td>
                                                            <td >{{ $transaction->discountAmount}}</td>
                                                            <td >{{ $transaction->created_at}}</td>
                                                            <td>
                                                                <a href="javascript:void(0);" class="action-icon"><i class="bx bxs-download"></i></a>
                                                            </td>
                                                            </tr>
                                                            @endforeach

														</tbody>
													</table>

												</div>
											</div>
											<!-- /Today -->

											
										</div>
										<!-- /Tab Content -->
									</div>
								</div>
							</div>

							<div class="dash-pagination">
								<div class="row align-items-center">
									<div class="col-6">
										<p>Page {{ $loginUserTransactions->currentPage() }} of {{ $loginUserTransactions->lastPage() }}</p>
									</div>
									<div class="col-6">
										<ul class="pagination justify-content-end">
											<!-- Display pagination links -->
											{{ $loginUserTransactions->links() }}
										</ul>
									</div>
								</div>
							</div>
							
                            @endif
						</div>
						<!-- /Student Order History -->

                    </div>
                </div>
            </div>
            @endsection
            <!-- /Page Content -->
