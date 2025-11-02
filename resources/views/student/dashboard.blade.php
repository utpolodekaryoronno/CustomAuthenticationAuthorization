@extends('layouts.app')
@section('title', ' Student Dashboard')
@section('content')
    <style>
        body {
            overflow-x: hidden;
             background: #EEF2F7;
        }
        .sidebar {
            min-height: 100vh;
            background: #4a67e6;
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
        .card { border-radius: 15px; }
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
                    <h5>Student Panel</h5>
                </div>
                <nav class="nav flex-column">
                    <a href="#"  class="nav-link text-white">🏠 Dashboard</a>
                    <a href="#"  class="nav-link text-white">📚 My Courses</a>
                    <a href="#"  class="nav-link text-white">📊 Results</a>
                    <a href="#"  class="nav-link text-white">📝 Assignments</a>
                    <a href="#"  class="nav-link text-white">🕒 Attendance</a>
                    <a href="#"  class="nav-link text-white">💬 Messages</a>
                    <a href="#"  class="nav-link text-white">⚙️ Settings</a>
                    <a href="#"  class="nav-link text-white">🚪 Logout</a>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 pl-5">
                <!-- Top Navbar -->
                <div class="d-flex justify-content-between">
                    <h2>Welcome, {{$student->name }} 👋</h2>
                    <!-- Student Account Dropdown -->
                    <nav class="navbar navbar-light bg-light shadow-sm px-3">
                        <div class="ms-auto dropdown">
                            <a class="dropdown-toggle text-decoration-none" href="#" data-bs-toggle="dropdown">
                                @if($student->photo)
                                    <img class="rounded-circle" height="30" width="30" src="{{ asset('media/student/' .$student->photo) }}" alt="Student Profile">
                                @else
                                    <img class="rounded-circle" height="30" width="30" src="{{ asset('assets/image/default-profile.png') }}" alt="Default Profile">
                                @endif

                                {{ $student->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('profile') }}">👤 Profile</a></li>
                                <li><a class="dropdown-item" href="#">⚙️ Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li class="mb-2 mx-3">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <input type="submit" value="Logout">
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>

                <div class="content">
                    <!-- Cards Row -->
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
