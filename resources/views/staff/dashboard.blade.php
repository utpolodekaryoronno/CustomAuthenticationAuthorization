@extends('layouts.app')

@section('title', ' Accountant Dashboard')

@section('content')

    <style>
        body {
            overflow-x: hidden;
        }
        .sidebar {
            min-height: 100vh;
            background: #198754;
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
        #pieChart{
            height: 248px !important;
            width: 248px !important;
        }
    </style>

    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-0">
                <div class="p-3 border-bottom">
                    <h5>{{ Auth::guard('staff')->user()->role }} Dashboard</h5>
                </div>
                <nav class="nav flex-column">
                    @if(in_array(Auth::guard('staff')->user()->role, ['manager', 'librarian']))
                        <a class="nav-link text-white" href="#">🏠 Dashboard</a>
                        <a class="nav-link text-white" href="#">📚 Books</a>
                        <a class="nav-link text-white" href="#">📤 Issue Books</a>
                        <a class="nav-link text-white" href="#">📥 Return Books</a>
                        <a class="nav-link text-white" href="#">🎓 Students</a>
                    @endif
                    @if (Auth::guard('staff')->user()->role === 'manager')
                        <a class="nav-link text-white" href="#">💰 Finance</a>
                        <a class="nav-link text-white" href="#">📑 Reports</a>
                        <a class="nav-link text-white" href="#">⚙️ Settings</a>
                    @endif
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
                            <div class="p-3 bg-success text-white rounded">Net Profit<br><strong>৳380,000</strong></div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-3 bg-warning text-dark rounded">Total Expenses<br><strong>৳820,000</strong></div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-3 bg-success text-white rounded">Pending Payments<br><strong>৳60,000</strong></div>
                        </div>
                         <div class="col-md-3">
                            <div class="p-3 bg-warning text-dark rounded">Total Income<br><strong>৳1,200,000</strong></div>
                        </div>
                    </div>

                    <div class="content">
                    <!-- Cards Row -->

                    @if (Auth::guard('staff')->user() && Auth::guard('staff')->user()->role === 'manager')
                        <div class="row mt-4">
                            <div class="col-md-3">
                                <div class="card p-3 text-center shadow">
                                    <h5>Total Courses</h5>
                                    <h3>06</h3>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card p-3 text-center shadow">
                                    <h5>Completed</h5>
                                    <h3>03</h3>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card p-3 text-center shadow">
                                    <h5>Assignments</h5>
                                    <h3>12</h3>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card p-3 text-center shadow">
                                    <h5>Attendance</h5>
                                    <h3>92%</h3>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Charts -->
                    <div class="row mt-4">
                        <div class="col-md-8">
                            <div class="card p-3 shadow">
                                <h5>Grades Progress</h5>
                                <canvas id="lineChart"></canvas>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-3 shadow">
                                <h5>Course Completion</h5>
                                <canvas id="pieChart"></canvas>
                                <p>Pie Chart</p>
                            </div>
                        </div>
                    </div>
                </div>

                    <!-- Recent Table -->
                    @if (Auth::guard('staff')->user() && Auth::guard('staff')->user()->role === 'manager')
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
                    @endif
                </div>

            </div>
        </div>
    </div>

     <script>
        // Line Chart
        const ctx1 = document.getElementById('lineChart');
        new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Grade %',
                    data: [70, 75, 80, 85, 88, 92],
                    borderWidth: 2
                }]
            },
        });

        // Pie Chart
        const ctx2 = document.getElementById('pieChart');
        new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ['Completed', 'Remaining'],
                datasets: [{
                    data: [3, 3],
                    borderWidth: 1
                }]
            },
        });
    </script>


@endsection
