@extends('layouts.app')
@section('title', ' Teacher Dashboard')
@section('content')
  <style>
    body { background-color: #eef2f7; }
    .sidebar {
        width: 100%;
        background: linear-gradient(180deg,#1e6ef0,#1356c8);
        color:#fff;
        height:100%;
    }
    .sidebar .logo {
        font-weight:700;
        padding:20px;
        font-size:18px;
        border-bottom:1px solid rgba(255,255,255,0.06);
    }
    .sidebar a {
        color:#fff;
        padding:12px 20px;
        display:block;
        text-decoration:none;
    }
    .sidebar a:hover {
        background:rgba(255,255,255,0.06);
        border-radius:8px;
    }
    .content {
        padding:24px;
        padding-left: 5px;
        padding-right: 0px;
    }
    .stat-card {
        border-radius:12px;
        box-shadow:0 6px 18px rgba(16,24,40,0.06);
        background:#fff;
        padding:18px;
    }
    .topbar {
        display:flex;
        justify-content:space-between;
        align-items:center;
        gap:12px;
        margin-bottom:18px;
    }
    .profile-avatar {
        width:40px;
        height:40px;
        border-radius:50%;
        object-fit:cover;
    }
    #attendancePie{
        height: 240px !important;
        width: 240px !important;
    }
    /* small screens adjustments */
    @media (max-width: 767px) {
      .sidebar {
        position:relative;
        width:100%;
        min-height:auto;
    }
    .content {
        margin-left:0;
        padding:12px;
    }
    }
  </style>

  <div class="container">
      <!-- Sidebar -->
      <div class="row">
        <div class="col-md-2 p-0">
            <aside class="sidebar">
                <div class="logo">Teacher Panel</div>
                <nav class="mt-3">
                <a href="#" class="active"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
                <a href="#"><i class="bi bi-book me-2"></i> Classes</a>
                <a href="#"><i class="bi bi-people me-2"></i> Students</a>
                <a href="#"><i class="bi bi-clipboard-data me-2"></i> Attendance</a>
                <a href="#"><i class="bi bi-calendar-event me-2"></i> Schedule</a>
                <a href="#"><i class="bi bi-gear me-2"></i> Settings</a>
                <a href="#" class="mt-4"><i class="bi bi-box-arrow-right me-2"></i> Logout</a>
                </nav>
            </aside>
        </div>
        <div class="col-md-10">
            <!-- Main content -->
            <div class="content">
                <div class="topbar">
                <div>
                    <h3 class="mb-0">Welcome, <span class="text-primary">{{ $teacher->name }}</span></h3>
                    <small class="text-muted">Here’s the class overview for today</small>
                </div>

                <!-- Profile dropdown (top-right) -->
                <div class="dropdown">
                    <a class="d-flex align-items-center text-decoration-none dropdown-toggle" href="#" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        @if($teacher->photo)
                            <img class="rounded-circle" height="45" width="45" src="{{ asset('media/teacher/' .$teacher->photo) }}" alt="Student Profile">
                        @else
                            <img class="rounded-circle" height="45" width="45" src="{{ asset('assets/image/default-profile.png') }}" alt="Default Profile">
                        @endif

                    <div class="d-none d-sm-block text-end">
                        <div style="line-height:1;">{{ $teacher->name }}</div>
                        <small class="text-muted">Mathematics</small>
                    </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="profileDropdown">
                    <li><a class="dropdown-item" href="{{ route('profile.teacher') }}"><i class="bi bi-person me-2"></i> Profile</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <form action="{{ route('logout.teacher') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger"><i class="bi bi-box-arrow-right me-2"></i> Logout</button>
                    </form>
                    </li>
                    </ul>
                </div>
                </div>

                <!-- Stats -->
                <div class="row g-3 mb-3">
                <div class="col-md-3">
                    <div class="stat-card text-center">
                    <small class="text-muted">Total Students</small>
                    <h4 class="mt-2 mb-0">320</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card text-center">
                    <small class="text-muted">Active Classes</small>
                    <h4 class="mt-2 mb-0">12</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card text-center">
                    <small class="text-muted">Attendance Today</small>
                    <h4 class="mt-2 mb-0">88%</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card text-center">
                    <small class="text-muted">Pending Tasks</small>
                    <h4 class="mt-2 mb-0">4</h4>
                    </div>
                </div>
                </div>

                <!-- Charts row -->
                <div class="row g-4">
                <!-- Graph chart (Bar) -->
                <div class="col-lg-8">
                    <div class="card p-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5 class="mb-0">Student Performance (Monthly)</h5>
                        <small class="text-muted">Last 6 months</small>
                    </div>
                    <div style="height:340px;">
                        <canvas id="performanceChart" style="max-height:320px;"></canvas>
                    </div>
                    </div>
                </div>

                <!-- Pie + Calendar -->
                <div class="col-lg-4">
                    <div class="card p-3 mb-3">
                    <h6 class="mb-2">Attendance Breakdown</h6>
                    <div style="height:240px;">
                        <canvas id="attendancePie"></canvas>
                    </div>
                    </div>

                    <div class="card p-4">
                    <h6 class="mb-2 text-center">Upcoming</h6>
                    <div id="miniCalendar"></div>
                    </div>
                </div>
                </div>

                <!-- Table -->
                <div class="card mt-4 p-3">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="mb-0">Recent Students</h5>
                    <div><button class="btn btn-sm btn-outline-primary">Export CSV</button></div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                        <th>#</th><th>Name</th><th>Class</th><th>Avg Grade</th><th>Attendance</th><th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>1</td><td>Rahim</td><td>10</td><td>A-</td><td><span class="badge bg-success">92%</span></td>
                        <td><button class="btn btn-sm btn-outline-secondary">View</button></td>
                        </tr>
                        <tr>
                        <td>2</td><td>Ayesha</td><td>9</td><td>A+</td><td><span class="badge bg-success">98%</span></td>
                        <td><button class="btn btn-sm btn-outline-secondary">View</button></td>
                        </tr>
                        <tr>
                        <td>3</td><td>Karim</td><td>8</td><td>B+</td><td><span class="badge bg-warning text-dark">78%</span></td>
                        <td><button class="btn btn-sm btn-outline-secondary">View</button></td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
      </div>
  </div>



    <!-- Chart.js and FullCalendar scripts -->

  <script>
    // ---------- Bar chart (performance) ----------
    const perfCtx = document.getElementById('performanceChart').getContext('2d');
    const performanceChart = new Chart(perfCtx, {
      type: 'bar',
      data: {
        labels: ['May','Jun','Jul','Aug','Sep','Oct'],
        datasets: [
          {
            label: 'Average Mark (%)',
            data: [76, 82, 79, 85, 88, 91],
            backgroundColor: 'rgba(26,110,240,0.85)',
            borderRadius: 6,
            barThickness: 28
          },
          {
            label: 'Attendance (%)',
            data: [88, 86, 90, 87, 89, 92],
            backgroundColor: 'rgba(16,185,129,0.85)',
            borderRadius: 6,
            barThickness: 28
          }
        ]
      },
      options: {
        responsive: true,
        plugins: { legend: { position: 'top' } },
        scales: { y: { beginAtZero: true, max: 100 } }
      }
    });

    // ---------- Pie chart (attendance breakdown) ----------
    const pieCtx = document.getElementById('attendancePie').getContext('2d');
    const attendancePie = new Chart(pieCtx, {
      type: 'doughnut',
      data: {
        labels: ['Present','Absent','Late'],
        datasets: [{ data: [85, 10, 5], backgroundColor: ['#16a34a','#ef4444','#f59e0b'] }]
      },
      options: { responsive: true, cutout: '60%' }
    });

    // ---------- Mini calendar using FullCalendar ----------
    const miniCalEl = document.getElementById('miniCalendar');
    if (miniCalEl) {
      const miniCalendar = new FullCalendar.Calendar(miniCalEl, {
        initialView: 'listWeek',
        height: 250,
        headerToolbar: false,
        events: [
          { title: 'Math Class - 9A', start: new Date().toISOString().slice(0,10) },
          { title: 'Physics Quiz', start: new Date(new Date().setDate(new Date().getDate() + 2)).toISOString().slice(0,10) },
          { title: 'Parent Meeting', start: new Date(new Date().setDate(new Date().getDate() + 4)).toISOString().slice(0,10) }
        ]
      });
      miniCalendar.render();
    }
  </script>


@endsection
