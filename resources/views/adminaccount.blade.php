<!DOCTYPE html>
<html>

<head>
    <title>Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container">
        <section class="row justify-content-center">
            <div class="col-md-6  col-md-offset-3" style="margin-top:150px">
                <div class="card mt-3" style="max-width: 540px;">
                    <div class="card-header">
                        <h3 class="text-center">Your Account</h3>
                    </div>
                    <div class="row g-0">
                        <div class="col-12 col-md-5 d-flex justify-content-center  justify-content-sm-start">
                            <img src="{{ $user->profile_img_path }}"
                                alt="Profile Image" class="mt-3 mt-sm-0 img-fluid" width='200' height='200'>
                        </div>
                        <div class="col-12 col-md-7">
                            <div
                                class="card-body mt-2  d-flex flex-column justify-content-center align-items-center align-items-sm-start  justify-content-sm-start">
                                <p><i class="fa-solid fa-user text-primary"></i><span
                                        class="card-title ms-2 h5">{{ $user->name }}</span>
                                </p>
                                <p><i class="fa-solid fa-envelope text-primary"></i><span
                                        class="card-text ms-2">{{ $user->email }}</span>
                                </p>
                                <p>
                                    <a href="{{ route('admineditaccount') }}" class="btn btn-primary mt-4"><i
                                            class="fa-solid fa-pen-to-square me-2"></i>Edit Profile</a>
                                    <a href="{{ route('admindashboard') }}" class="btn btn-success mt-4"><i
                                            class="fa-solid fa-pen-to-square"></i>Back</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
