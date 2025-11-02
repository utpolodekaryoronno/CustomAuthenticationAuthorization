@extends('layouts.app')

@section('title', ' Accountant Dashboard')

@section('content')

    <style>
        body {
            overflow-x: hidden;
            background-color: #EEF2F7;
        }
        .sidebar {
            min-height: 100vh;
            background: #0d6efd;
            color: #fff;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 12px 20px;
            display: block;
        }
        .sidebar a:hover {
            background: rgba(255,255,255,0.25);
        }
    </style>

    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-0">
                <div class="p-3 border-bottom">
                    <h5>🏦 Accountant</h5>
                </div>
                <nav class="nav flex-column">
                    <a class="nav-link text-white" href="#">🏠 Dashboard</a>
                    <a class="nav-link text-white" href="#">📥 Income</a>
                    <a class="nav-link text-white" href="#">💸 Expenses</a>
                    <a class="nav-link text-white" href="#">👥 Clients</a>
                    <a class="nav-link text-white" href="#">🤝 Vendors</a>
                    <a class="nav-link text-white" href="#">💼 Payroll</a>
                    <a class="nav-link text-white" href="#">🏦 Bank</a>
                    <a class="nav-link text-white" href="#">📊 Reports</a>
                    <a class="nav-link text-white" href="#">⚙️ Settings</a>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 p-0">
                <!-- Top Navbar -->
                <nav class="navbar navbar-light bg-light shadow-sm px-3">
                    <div class="ms-auto dropdown">
                        <a class="dropdown-toggle text-decoration-none" href="#" data-bs-toggle="dropdown">
                            @if (Auth::guard('staff')->user()->photo)
                               <img src="{{ asset('media/staff/' . Auth::guard('staff')->user()->photo) }}" alt="" class="rounded-circle" height="30" width="30">
                            @else
                               <img src="{{ asset('assets/image/default-profile.png') }}" alt="" class="rounded-circle" height="30" width="30">
                           @endif
                           {{ Auth::guard('staff')->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('profile.staff') }}">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li class="mb-2 mx-3">
                                <form action="{{ route('logout.staff') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>

                <!-- Stats Cards -->
                <div class="container mt-4">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <div class="p-3 bg-primary text-white rounded">Total Income<br><strong>৳1,200,000</strong></div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-3 bg-danger text-white rounded">Total Expenses<br><strong>৳820,000</strong></div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-3 bg-success text-white rounded">Net Profit<br><strong>৳380,000</strong></div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-3 bg-warning text-dark rounded">Pending Payments<br><strong>৳60,000</strong></div>
                        </div>
                    </div>

                    <!-- Recent Table -->
                    <div class="mt-4">
                        <div class="card">
                            <div class="card-header fw-bold">Recent Transactions</div>
                            <div class="card-body p-0">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Category</th>
                                            <th>Type</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>2025-10-31</td>
                                            <td>Office Rent</td>
                                            <td>Expense</td>
                                            <td>৳15,000</td>
                                            <td><span class="badge bg-success">Paid</span></td>
                                        </tr>
                                        <tr>
                                            <td>2025-10-30</td>
                                            <td>Client Payment</td>
                                            <td>Income</td>
                                            <td>৳40,000</td>
                                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                                        </tr>
                                        <tr>
                                            <td>2025-10-31</td>
                                            <td>Office Rent</td>
                                            <td>Expense</td>
                                            <td>৳15,000</td>
                                            <td><span class="badge bg-success">Paid</span></td>
                                        </tr>
                                        <tr>
                                            <td>2025-10-30</td>
                                            <td>Client Payment</td>
                                            <td>Income</td>
                                            <td>৳40,000</td>
                                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
