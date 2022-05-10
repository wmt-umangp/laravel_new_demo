<!DOCTYPE html>
<html>
<head>
    <title>Add New Student</title>
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
                {{"Please Login or Reigster First"}}
            @else
            <h3 class="mb-5">Add Students</h3>
                <form action="{{route('postaddstudent')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="roll_no" class="form-label">Roll No</label>
                        <input type="number" class="form-control" id="roll_no" placeholder="Enter Roll Number" name="roll_no">
                        @if ($errors->has('roll_no'))
                            <span class="text-danger">*{{ $errors->first('roll_no') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                        @if ($errors->has('name'))
                            <span class="text-danger">*{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="standard" class="form-label">Standard</label>
                        <input type="number" name="standard" class="form-control" id="standard" placeholder="Enter Standard" min="1" max="12" onKeyPress="if(this.value.length==2) return false;">
                        @if ($errors->has('standard'))
                            <span class="text-danger">*{{ $errors->first('standard') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" name="age" class="form-control" id="age" placeholder="Enter Standard" min="1" max="18" onKeyPress="if(this.value.length==2) return false;">
                        @if ($errors->has('age'))
                            <span class="text-danger">*{{ $errors->first('age') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email">
                        @if ($errors->has('email'))
                            <span class="text-danger">*{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary mb-5">Submit</button>
                </form>
            @endguest
    </div>
</body>
</html>
