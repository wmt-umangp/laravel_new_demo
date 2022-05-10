<!DOCTYPE html>
<html>

<head>
    <title>All Students Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
        <div class="container">
            <a class="navbar-brand" href="{{route('admindashboard')}}">Student Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('adminsignin') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('adminsignup') }}">Register</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('alogout') }}">Logout</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @guest
            {{ 'Please login First' }}
        @else
            <div class="container">
                <table class="table table-striped mt-5">
                    <tr>
                        <th>Roll No</th>
                        <th>Name</th>
                        <th>Standard</th>
                        <th>Age</th>
                        <th>Email</th>
                        <th>Creator Name</th>
                    </tr>
                    @foreach ($student as $st)
                        <tr>
                            <td>{{ $st->roll_no }}</td>
                            <td>{{ $st->name }}</td>
                            <td>{{ $st->standard }}</td>
                            <td>{{ $st->age }}</td>
                            <td>{{ $st->email }}</td>
                            <td>{{$st->user->name}}</td>
                        </tr>
                    @endforeach
                </table>
                {{-- Pagination --}}
                <div class="d-flex justify-content-center">
                    {!! $student->links() !!}
                </div>
            </div>
        @endguest
    </div>
</body>

</html>
