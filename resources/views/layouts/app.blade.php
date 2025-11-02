<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Auth')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- chart js  --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light mb-4" style="background-color: #dbdee0;">
        <div class="container">
            <a class="logo" href="{{ url('/') }}"><img src="{{ asset('assets/image/logo.png') }}" alt="" style="height: 60px"></a>
            <ul class="navbar-nav ms-auto">
                 @if (Auth::guard('student')->user() && Auth::guard('student')->user()->role === 'student')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-danger" type="submit">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @endif

                {{-- @if(Auth::guard('staff')->user() && in_array(Auth::guard('staff')->user()->role, ['manager', 'librarian']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('staff.dashboard') }}">Staff Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout.staff') }}" method="POST">
                            @csrf
                            <button class="btn btn-danger" type="submit">Logout</button>
                        </form>
                    </li>
                @elseif(Auth::guard('staff')->user() && Auth::guard('staff')->user()->role === 'accountant')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('accountant.dashboard') }}">Accountant Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout.staff') }}" method="POST">
                            @csrf
                            <button class="btn btn-danger" type="submit">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login.staff') }}">Staff Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register.staff') }}">Staff Register</a></li>
                @endif --}}


            </ul>
        </div>
    </nav>

    <section>
        @yield('content')
    </section>



    {{-- script js  --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Toastr JS -->
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000"
        }

        @if ($errors->any())
            toastr.error("{{ $errors->first() }}");
        @endif

        @if(session('success'))
            toastr.success("{{ session('success') }}");
        @endif

    </script>



    {{-- password toggle script  --}}
    <script>
        document.querySelectorAll('.toggle-password').forEach(icon => {
            icon.addEventListener('click', function () {
            const target = document.querySelector(this.dataset.target);
            const type = target.getAttribute('type') === 'password' ? 'text' : 'password';
            target.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
            });
        });
    </script>

     {{-- Dynamic Delete Confirmation with SweetAlert --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".delete-form").forEach(form => {
                form.addEventListener("submit", function (e) {
                    e.preventDefault(); // stop form submission

                    let message = form.getAttribute("data-message") || "Are you sure you want to delete this Account?";

                    Swal.fire({
                        title: "Confirm Delete",
                        text: message,
                        icon: "question",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "Cancel"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // finally submit if confirmed
                        }
                    });
                });
            });
        });
    </script>


</body>
</html>
