@extends('welcome')
<div class="breadcrumb-bar py-5">
</div>
  @section('content')

<!-- Page Content -->
<div class="page-content">
    <div class="container">
        <div class="row">

            <!-- sidebar -->
            @include('includes.layout-frontend.side-bar')
            <!-- /Sidebar -->
            <!-- Student Dashboard -->
            <div class="col-xl-9 col-lg-9">

                <div class="settings-widget card-details">
                    <div class="settings-menu p-0">
                        <div class="profile-heading">
                            <h3>Support Tickets</h3>
                        </div>
                        <div class="checkout-form">

                            <!-- Support Information -->
                            <div class="row">
                                <div class="col-md-4 col-sm-6">
                                    <div class="card support-box">
                                        <div class="card-body">
                                            <h3>50</h3>
                                            <p>Total Tickets</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="card support-box">
                                        <div class="card-body">
                                            <h3>30</h3>
                                            <p>Opened Tickets</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="card support-box">
                                        <div class="card-body">
                                            <h3>20</h3>
                                            <p>Closed Tickets</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Support Information -->

                            <div class="filter-grp ticket-grp d-flex align-items-center justify-content-between">
                                <div>
                                    <h3>Support Tickets</h3>
                                    <p>You can find all of your order Invoices.</p>
                                </div>
                                <div class="ticket-btn-grp">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#add-tickets">Add New Ticket</a>
                                </div>
                            </div>

                            <div class="wishlist-tab">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="active" data-bs-toggle="tab" data-bs-target="#all">All(30)</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" data-bs-toggle="tab" data-bs-target="#open">Open(10)</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" data-bs-toggle="tab" data-bs-target="#inprogress">Inprogress(10)</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" data-bs-toggle="tab" data-bs-target="#closed">Closed(10)</a>
                                    </li>
                                </ul>
                            </div>

                            <!-- Tab Contant -->
                            <div class="tab-content">

                                <!-- All -->
                                <div class="tab-pane show active" id="all">
                                    <div class="table-responsive custom-table">

                                        <!-- Referred Users-->
                                        <table class="table table-nowrap mb-0">
                                            <thead>
                                              <tr>
                                                <th>Ticket ID</th>
                                                <th>Date</th>
                                                <th>Subject</th>
                                                <th>Priority</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Ticket#001</td>
                                                    <td>March 12, 2024</td>
                                                    <td>Need a freelancer software</td>
                                                    <td><span class="resut-badge badge-light-success">Low</span></td>
                                                    <td>Mailing Issues</td>
                                                    <td><span class="status-badge badge-soft-success">Opened</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Ticket#002</td>
                                                    <td>March 18, 2024</td>
                                                    <td>I have a problem</td>
                                                    <td><span class="resut-badge badge-light-danger">High</span></td>
                                                    <td>Language Issues</td>
                                                    <td><span class="status-badge badge-soft-warning">Inprogress</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Ticket#003</td>
                                                    <td>March 27, 2024</td>
                                                    <td>Account Activation mail not received</td>
                                                    <td><span class="resut-badge badge-light-danger">High</span></td>
                                                    <td>Mailing Issues</td>
                                                    <td><span class="status-badge badge-soft-danger">Closed</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Ticket#004</td>
                                                    <td>April 04, 2024</td>
                                                    <td>Enabling SSH service</td>
                                                    <td><span class="resut-badge badge-light-warning">Medium</span></td>
                                                    <td>Installation Error</td>
                                                    <td><span class="status-badge badge-soft-success">Opened</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Ticket#005</td>
                                                    <td>April 24, 2024</td>
                                                    <td>Payment Processed but not showed</td>
                                                    <td><span class="resut-badge badge-light-success">Low</span></td>
                                                    <td>Payment Issues</td>
                                                    <td><span class="status-badge badge-soft-danger">Closed</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Ticket#006</td>
                                                    <td>April 28, 2024</td>
                                                    <td>When will start the order</td>
                                                    <td><span class="resut-badge badge-light-danger">High</span></td>
                                                    <td>Demo Problem</td>
                                                    <td><span class="status-badge badge-soft-warning">Inprogress</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Ticket#007</td>
                                                    <td>June 03, 2024</td>
                                                    <td>Slow speed while Course Download</td>
                                                    <td><span class="resut-badge badge-light-danger">High</span></td>
                                                    <td>Server Issues</td>
                                                    <td><span class="status-badge badge-soft-success">Opened</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Ticket#008</td>
                                                    <td>June 13, 2024</td>
                                                    <td>Unable to access the course </td>
                                                    <td><span class="resut-badge badge-light-warning">Medium</span></td>
                                                    <td>Demo Problem</td>
                                                    <td><span class="status-badge badge-soft-success">Opened</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Ticket#009</td>
                                                    <td>July 15, 2024</td>
                                                    <td>Assignment Upload Error files</td>
                                                    <td><span class="resut-badge badge-light-success">Low</span></td>
                                                    <td>File Error</td>
                                                    <td><span class="status-badge badge-soft-success">Opened</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Ticket#0010</td>
                                                    <td>July 23, 2024</td>
                                                    <td>Account Recovery Assistance Need</td>
                                                    <td><span class="resut-badge badge-light-danger">High</span></td>
                                                    <td>Recovery Issues</td>
                                                    <td><span class="status-badge badge-soft-success">Opened</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /All -->

                                <!-- Open -->
                                <div class="tab-pane fade" id="open">
                                    <div class="table-responsive custom-table">

                                        <!-- Referred Users-->
                                        <table class="table table-nowrap mb-0">
                                            <thead>
                                              <tr>
                                                <th>Ticket ID</th>
                                                <th>Date</th>
                                                <th>Subject</th>
                                                <th>Priority</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Ticket#001</td>
                                                    <td>March 12, 2024</td>
                                                    <td>Need a freelancer software</td>
                                                    <td><span class="resut-badge badge-light-success">Low</span></td>
                                                    <td>Mailing Issues</td>
                                                    <td><span class="status-badge badge-soft-success">Opened</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Ticket#003</td>
                                                    <td>March 27, 2024</td>
                                                    <td>Account Activation mail not received</td>
                                                    <td><span class="resut-badge badge-light-danger">High</span></td>
                                                    <td>Mailing Issues</td>
                                                    <td><span class="status-badge badge-soft-danger">Closed</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Ticket#004</td>
                                                    <td>April 04, 2024</td>
                                                    <td>Enabling SSH service</td>
                                                    <td><span class="resut-badge badge-light-warning">Medium</span></td>
                                                    <td>Installation Error</td>
                                                    <td><span class="status-badge badge-soft-success">Opened</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Ticket#007</td>
                                                    <td>June 03, 2024</td>
                                                    <td>Slow speed while Course Download</td>
                                                    <td><span class="resut-badge badge-light-danger">High</span></td>
                                                    <td>Server Issues</td>
                                                    <td><span class="status-badge badge-soft-success">Opened</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Ticket#008</td>
                                                    <td>June 13, 2024</td>
                                                    <td>Unable to access the course </td>
                                                    <td><span class="resut-badge badge-light-warning">Medium</span></td>
                                                    <td>Demo Problem</td>
                                                    <td><span class="status-badge badge-soft-success">Opened</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Ticket#009</td>
                                                    <td>July 15, 2024</td>
                                                    <td>Assignment Upload Error files</td>
                                                    <td><span class="resut-badge badge-light-success">Low</span></td>
                                                    <td>File Error</td>
                                                    <td><span class="status-badge badge-soft-success">Opened</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Ticket#0010</td>
                                                    <td>July 23, 2024</td>
                                                    <td>Account Recovery Assistance Need</td>
                                                    <td><span class="resut-badge badge-light-danger">High</span></td>
                                                    <td>Recovery Issues</td>
                                                    <td><span class="status-badge badge-soft-success">Opened</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /Open -->

                                <!-- Inprogress -->
                                <div class="tab-pane fade" id="inprogress">
                                    <div class="table-responsive custom-table">

                                        <table class="table table-nowrap mb-0">
                                            <thead>
                                              <tr>
                                                <th>Ticket ID</th>
                                                <th>Date</th>
                                                <th>Subject</th>
                                                <th>Priority</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Ticket#002</td>
                                                    <td>March 18, 2024</td>
                                                    <td>I have a problem</td>
                                                    <td><span class="resut-badge badge-light-danger">High</span></td>
                                                    <td>Language Issues</td>
                                                    <td><span class="status-badge badge-soft-warning">Inprogress</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Ticket#006</td>
                                                    <td>April 28, 2024</td>
                                                    <td>When will start the order</td>
                                                    <td><span class="resut-badge badge-light-danger">High</span></td>
                                                    <td>Demo Problem</td>
                                                    <td><span class="status-badge badge-soft-warning">Inprogress</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /Inprogress -->

                                <!-- Close -->
                                <div class="tab-pane fade" id="closed">
                                    <div class="table-responsive custom-table">

                                        <table class="table table-nowrap mb-0">
                                            <thead>
                                              <tr>
                                                <th>Ticket ID</th>
                                                <th>Date</th>
                                                <th>Subject</th>
                                                <th>Priority</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Ticket#003</td>
                                                    <td>March 27, 2024</td>
                                                    <td>Account Activation mail not received</td>
                                                    <td><span class="resut-badge badge-light-danger">High</span></td>
                                                    <td>Mailing Issues</td>
                                                    <td><span class="status-badge badge-soft-danger">Closed</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Ticket#005</td>
                                                    <td>April 24, 2024</td>
                                                    <td>Payment Processed but not showed</td>
                                                    <td><span class="resut-badge badge-light-success">Low</span></td>
                                                    <td>Payment Issues</td>
                                                    <td><span class="status-badge badge-soft-danger">Closed</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /Close -->

                            </div>
                            <!-- Tab Contant -->

                        </div>
                    </div>
                </div>

                <div class="dash-pagination">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <p>Page 1 of 2</p>
                        </div>
                        <div class="col-6">
                            <ul class="pagination">
                                <li class="active">
                                    <a href="#">1</a>
                                </li>
                                <li>
                                    <a href="#">2</a>
                                </li>
                                <li>
                                    <a href="#"><i class="bx bx-chevron-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>	
            <!-- Student Dashboard -->
        </div>
    </div>
</div>
@endsection
<!-- /Page Content -->
