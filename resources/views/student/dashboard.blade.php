@extends('layouts.app')
@section('title', 'Student Dashboard')

@section('content')

<div class="d-flex min-vh-100 bg-gray-50">

    <!-- Modern Sidebar -->
    <aside class="bg-white border-end shadow-sm" style="width: 280px;">
        <div class="p-3 text-center border-bottom">
            <div class="d-flex flex-column align-items-center justify-content-center gap-3">
                <div class="bg-primary text-white rounded-3 p-3">
                    <i class="fas fa-graduation-cap fa-xl"></i>
                </div>
                <div class="text-start">
                    <h5 class="mb-0 fw-bold">Student Portal</h5>
                    <small class="text-muted">Academic Dashboard</small>
                </div>
            </div>
        </div>

        <nav class="p-4">
            <ul class="nav nav-pills flex-column gap-2">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link active d-flex align-items-center gap-3 px-4 py-2 rounded-3">
                        <i class="fas fa-home"></i>
                        <span class="fw-semibold">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark d-flex align-items-center gap-3 px-4 py-2 rounded-3 hover-bg">
                        <i class="fas fa-book-open"></i>
                        <span class="fw-semibold">My Courses</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark d-flex align-items-center gap-3 px-4 py-2 rounded-3 hover-bg">
                        <i class="fas fa-chart-bar"></i>
                        <span class="fw-semibold">Grades & Results</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark d-flex align-items-center gap-3 px-4 py-2 rounded-3 hover-bg">
                        <i class="fas fa-clipboard-list"></i>
                        <span class="fw-semibold">Assignments</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark d-flex align-items-center gap-3 px-4 py-2 rounded-3 hover-bg">
                        <i class="fas fa-calendar-alt"></i>
                        <span class="fw-semibold">Attendance</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark d-flex align-items-center gap-3 px-4 py-2 rounded-3 hover-bg">
                        <i class="fas fa-comments"></i>
                        <span class="fw-semibold">Messages</span>
                    </a>
                </li>
            </ul>

            <hr class="my-3 border-muted">

            <div>
                <a href="{{ route('profile') }}" class="d-flex align-items-center gap-3 p-3 rounded-3 hover-bg">
                    <img src="{{ $student->photo ? asset('media/student/'.$student->photo) : asset('assets/image/default-profile.png') }}"
                         class="rounded-circle" width="44" height="44" style="object-fit: cover;">
                    <div>
                        <div class="fw-bold">{{ $student->name }}</div>
                        <small class="text-muted">View Profile</small>
                    </div>
                </a>
            </div>
        </nav>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-grow-1 overflow-auto">
        <!-- Top Bar -->
        <header class="bg-white border-bottom shadow-sm">
            <div class="d-flex justify-content-between align-items-center p-4 px-5">
                <div>
                    <h2 class="fw-bold mb-1">Welcome back, {{ $student->name }}</h2>
                    <p class="text-muted mb-0">Track your academic progress and stay updated</p>
                </div>

                <div class="d-flex align-items-center gap-4">
                    <button class="btn btn-outline-secondary position-relative">
                        <i class="fas fa-bell"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.65rem;">
                            3
                        </span>
                    </button>

                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="{{ $student->photo ? asset('media/student/'.$student->photo) : asset('assets/image/default-profile.png') }}"
                                 class="rounded-circle border border-white shadow" width="48" height="48">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 p-2">
                            <li><a class="dropdown-item rounded-2 py-2" href="{{ route('profile') }}"><i class="fas fa-user me-3"></i>Profile</a></li>
                            <li><a class="dropdown-item rounded-2 py-2" href="{{ route('profile.edit') }}"><i class="fas fa-cog me-3"></i>Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item text-danger rounded-2 py-2">
                                        <i class="fas fa-sign-out-alt me-3"></i>Logout
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

            <!-- Stats Cards -->
            <div class="row g-4 mb-5">
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted fw-medium mb-1">Total Courses</p>
                                    <h3 class="fw-bold mb-0">8</h3>
                                    <small class="text-success">+2 this semester</small>
                                </div>
                                <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3">
                                    <i class="fas fa-book-open fa-xl"></i>
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
                                    <p class="text-muted fw-medium mb-1">Completed</p>
                                    <h3 class="fw-bold mb-0">5</h3>
                                    <small class="text-success">Great progress!</small>
                                </div>
                                <div class="bg-success bg-opacity-10 text-success rounded-3 p-3">
                                    <i class="fas fa-check-circle fa-xl"></i>
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
                                    <p class="text-muted fw-medium mb-1">Pending Assign</p>
                                    <h3 class="fw-bold mb-0">3</h3>
                                    <small class="text-warning">Due this week</small>
                                </div>
                                <div class="bg-warning bg-opacity-10 text-warning rounded-3 p-3">
                                    <i class="fas fa-exclamation-triangle fa-xl"></i>
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
                                    <p class="text-muted fw-medium mb-1">Attendance Rate</p>
                                    <h3 class="fw-bold mb-0">96%</h3>
                                    <small class="text-success">Excellent!</small>
                                </div>
                                <div class="bg-info bg-opacity-10 text-info rounded-3 p-3">
                                    <i class="fas fa-calendar-check fa-xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-header bg-white border-0 py-4">
                            <h5 class="fw-bold mb-0"><i class="fas fa-chart-line text-primary me-2"></i> Academic Performance</h5>
                        </div>
                        <div class="card-body p-4">
                            <canvas id="performanceChart" height="120"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-header bg-white border-0 py-4">
                            <h5 class="fw-bold mb-0"><i class="fas fa-chart-pie text-primary me-2"></i> Course Status</h5>
                        </div>
                        <div class="card-body p-4 text-center">
                            <canvas id="courseChart" height="280"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>

<!-- Chart.js + Custom Charts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Performance Line Chart
    const ctx = document.getElementById('performanceChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
            datasets: [{
                label: 'GPA Trend',
                data: [3.1, 3.4, 3.6, 3.7, 3.9, 4.0, 4.1],
                borderColor: '#4361ee',
                backgroundColor: 'rgba(67, 97, 238, 0.1)',
                tension: 0.4,
                fill: true,
                pointBackgroundColor: '#4361ee',
                pointRadius: 5
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: false, max: 4.3 } }
        }
    });

    // Course Status Doughnut
    const ctx2 = document.getElementById('courseChart').getContext('2d');
    new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: ['Completed', 'In Progress', 'Upcoming'],
            datasets: [{
                data: [5, 3, 2],
                backgroundColor: ['#10b981', '#4361ee', '#e2e8f0'],
                borderWidth: 0,
                cutout: '75%'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' },
                tooltip: { callbacks: { label: ctx => ctx.label + ': ' + ctx.parsed + ' courses' } }
            }
        },
        plugins: [{
            beforeDraw: chart => {
                const { width, height, ctx } = chart;
                ctx.restore();
                const fontSize = (height / 150).toFixed(2);
                ctx.font = fontSize + "em sans-serif";
                ctx.textBaseline = "middle";
                ctx.fillStyle = "#64748b";
                const text = "10 Total";
                const textX = Math.round((width - ctx.measureText(text).width) / 2);
                const textY = height / 2;
                ctx.fillText(text, textX, textY);
                ctx.save();
            }
        }]
    });
</script>

<style>
    .hover-bg:hover {
        background-color: #f8fafc !important;
        transition: all 0.2s ease;
    }
    .bg-gray-50 { background-color: #f8fafc; }
    .rounded-4 { border-radius: 1rem !important; }
    .shadow-sm { box-shadow: 0 4px 20px rgba(0,0,0,0.06) !important; }
</style>
@endsection
