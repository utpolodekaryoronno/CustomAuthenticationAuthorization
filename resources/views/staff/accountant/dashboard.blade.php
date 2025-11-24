@extends('layouts.app')

@section('title', ' Accountant Dashboard')

{{-- @section('content')

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
                            <div class="p-3 bg-purple text-white rounded">Total Income<br><strong>৳1,200,000</strong></div>
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


@endsection --}}


@section('content')
<div class="d-flex min-vh-100 bg-gray-50">

    {{-- sidebar accountent --}}
    @include("staff.accountant.sidebarAccountant")

    <!-- Main Content Area -->
    <div class="flex-grow-1 overflow-auto">
        <!-- Top Header -->
        <header class="bg-white border-bottom shadow-sm">
            <div class="d-flex justify-content-between align-items-center p-4 px-5">
                <div>
                    <h2 class="fw-bold mb-1">Welcome back, {{ Auth::guard('staff')->user()->name }}!</h2>
                    <p class="text-muted mb-0">Here's your financial overview for {{ now()->format('F Y') }}</p>
                </div>
                <div class="d-flex align-items-center gap-4">
                    <button class="btn btn-outline-secondary position-relative">
                        <i class="fas fa-bell fa-lg"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.65rem;">7</span>
                    </button>
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="{{ Auth::guard('staff')->user()->photo
                                ? asset('media/staff/'.Auth::guard('staff')->user()->photo)
                                : asset('assets/image/default-profile.png') }}"
                                class="rounded-circle border shadow" width="50" height="50" style="object-fit: cover;">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 p-2">
                            <li><a class="dropdown-item rounded-2 py-2" href="{{ route('profile.staff') }}"><i class="fas fa-user me-3"></i> Profile</a></li>
                            <li><a class="dropdown-item rounded-2 py-2" href="#"><i class="fas fa-cog me-3"></i> Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout.staff') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item text-danger rounded-2 py-2">
                                        <i class="fas fa-sign-out-alt me-3"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <main class="p-3">

            <!-- Financial Summary Cards -->
            <div class="row g-3 mb-4">
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted fw-medium mb-1">Total Income</p>
                                    <h5 class="fw-bold mb-0 text-success">৳1,200,000</h5>
                                    <small class="text-success"><i class="fas fa-arrow-up"></i> +18% vs last month</small>
                                </div>
                                <div class="bg-success bg-opacity-10 text-success rounded-3 p-3">
                                    <i class="fas fa-wallet fa-xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted fw-medium mb-1">Total Expenses</p>
                                    <h5 class="fw-bold mb-0 text-danger">৳820,000</h5>
                                    <small class="text-warning"><i class="fas fa-arrow-down"></i> -3% vs last month</small>
                                </div>
                                <div class="bg-danger bg-opacity-10 text-danger rounded-3 p-3">
                                    <i class="fas fa-shopping-cart fa-xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted fw-medium mb-1">Net Profit</p>
                                    <h5 class="fw-bold mb-0 text-primary">৳380,000</h5>
                                    <small class="text-success">Healthy margin</small>
                                </div>
                                <div class="bg-purple bg-opacity-10 text-primary rounded-3 p-3">
                                    <i class="fas fa-chart-line fa-xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted fw-medium mb-1">Pending Payments</p>
                                    <h5 class="fw-bold mb-0 text-warning">৳60,000</h5>
                                    <small class="text-danger">7 invoices overdue</small>
                                </div>
                                <div class="bg-warning bg-opacity-10 text-warning rounded-3 p-3">
                                    <i class="fas fa-exclamation-triangle fa-xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts + Recent Transactions -->
            <div class="row g-4">
                <!-- Income vs Expense Chart -->
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-header bg-white border-0 py-4">
                            <h5 class="fw-bold mb-0"><i class="fas fa-chart-area text-primary me-2"></i> Income vs Expenses (2025)</h5>
                        </div>
                        <div class="card-body p-4">
                            <canvas id="incomeExpenseChart" height="120"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Recent Transactions -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-header bg-white border-0 py-4 d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold mb-0"><i class="fas fa-history text-primary me-2"></i> Recent Transactions</h5>
                            <a href="#" class="text-decoration-none small text-primary">View All</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush">
                                <a href="#" class="list-group-item list-group-item-action px-4 py-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1">Tuition Fee - Class 10</h6>
                                        <small class="text-success">+৳85,000</small>
                                    </div>
                                    <small class="text-muted">Nov 20, 2025 • Paid</small>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action px-4 py-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1">Teacher Salary (Nov)</h6>
                                        <small class="text-danger">-৳320,000</small>
                                    </div>
                                    <small class="text-muted">Nov 18, 2025 • Paid</small>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action px-4 py-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1">Library Fine Collection</h6>
                                        <small class="text-success">+৳8,500</small>
                                    </div>
                                    <small class="text-muted">Nov 15, 2025 • Paid</small>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- table  --}}
            <div class="mt-5">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-header bg-white border-0 py-4">
                        <h5 class="fw-bold mb-0"><i class="fas fa-history text-success me-2"></i> Recent Transactions</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0 align-middle">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2025-11-20</td>
                                        <td>Tuition Fee - Class 10</td>
                                        <td><span class="badge bg-success">Income</span></td>
                                        <td class="fw-bold">৳85,000</td>
                                        <td><span class="badge bg-success">Paid</span></td>
                                    </tr>
                                    <tr>
                                        <td>2025-11-18</td>
                                        <td>Teacher Salary - Nov</td>
                                        <td><span class="badge bg-danger">Expense</span></td>
                                        <td class="fw-bold">৳320,000</td>
                                        <td><span class="badge bg-success">Paid</span></td>
                                    </tr>
                                    <tr>
                                        <td>2025-11-15</td>
                                        <td>Library Fine Collection</td>
                                        <td><span class="badge bg-success">Income</span></td>
                                        <td class="fw-bold">৳8,500</td>
                                        <td><span class="badge bg-success">Paid</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>


<script>
    new Chart(document.getElementById('incomeExpenseChart'), {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov'],
            datasets: [
                {
                    label: 'Income',
                    data: [800000, 920000, 880000, 1050000, 1100000, 1150000, 1200000, 1220000, 1400000, 1260000],
                    borderColor: '#10b981',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    tension: 0.4,
                    fill: true
                },
                {
                    label: 'Expenses',
                    data: [700000, 750000, 780000, 820000, 810000, 830000, 820000, 520000, 420000, 400000],
                    borderColor: '#ef4444',
                    backgroundColor: 'rgba(239, 68, 68, 0.1)',
                    tension: 0.4,
                    fill: true
                }
            ]
        },
        options: {
            responsive: true,
            plugins: { legend: { position: 'top' } },
            scales: { y: { beginAtZero: true } }
        }
    });
</script>
@endsection
