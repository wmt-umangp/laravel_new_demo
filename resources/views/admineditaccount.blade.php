<!DOCTYPE html>
<html>

<head>
    <title>Edit Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>
<body>
    <div class="container">
        <section class="row justify-content-center mt-5">
            <div class="col-md-6 col-md-offset-3 mt-5">
                <header class="mt-3 text-center"><h3>Update Account</h3></header>
                <form action="{{route('adminupdateaccount')}}" method="post" id="account" class="mt-5" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" id="name">
                        @if ($errors->has('name'))
                            <span class="text-danger">*{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group mb-4">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}" id="email">
                        @if ($errors->has('email'))
                            <span class="text-danger">*{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group mb-4">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                        @if ($errors->has('image'))
                            <span class="text-danger">*{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Update Account</button>
                    <a class="btn btn-danger" href="{{ route('adminaccount') }}">Cancel</a>

                </form>
            </div>
        </section>
    </div>
</body>
