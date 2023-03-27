<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
    integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
    integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{asset('/css/style.css')}}">
  <title>Login</title>
</head>

<body>
  <!-- ============================= Start ================================  -->
  <section class="description-sec px-sm-0 px-2">
    <div class="container">
      <div class="row des-shadow2">
        <div class="col-md-6 bg-zinc px-sm-5 px-4 py-3 des-shadow des-bor d-flex flex-column justify-content-center">
          <div class="text-center login-img">
            <img src="{{asset('/img/logo.png')}}" alt="" class="img-fluid">
          </div>
          <h2 class="des-cl fw-bold">Description Heading</h2>
          <p class="des-cl">Quisque sit amet sagittis erat. Duis pharetra ornare venenatis. Nulla maximus porta velit ut
            molestie. Proin quis convallis mauris. In facilisis justo at mi pharetra lobortis. s.</p>
          <!-- --------------------------------- slider --------------------------  -->
          <div class="main-slide">
            <div class="box d-flex flex-column justify-content-center py-3 mx-3">
              <div class="box-img">
                <img src="{{asset('/img/Group 42046.png')}}" alt="barcode" class="w-100 h-100 img-bar">
              </div>
            </div>
            <div class="box d-flex flex-column justify-content-center py-3 mx-3">
              <div class="box-img">
                <img src="{{asset('/img/Group 42046.png')}}" alt="barcode" class="w-100 h-100 img-bar">
              </div>
            </div>
            <div class="box d-flex flex-column justify-content-center py-3 mx-3">
              <div class="box-img">
                <img src="{{asset('/img/Group 42046.png')}}" alt="barcode" class="w-100 h-100 img-bar">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 px-sm-5 px-4 py-4 des-bor2 d-flex flex-column">
          <div>
            <div class="text-center login-img">
              <img src="{{asset('/img/logo.png')}}" alt="" class="img-fluid">
            </div>
            <h2 class="text-center">Welcome to Our System</h2>
            <p class="text-center">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to
              demonstrate the visual form of a document or a typeface without</p>
            <div class="row">
              <div class="col-lg-10 m-auto">
                <!-- -- ----------------------------
                          Start Form
                ------------------------------ -- -->
                <form method="POST" action="{{ route('login') }}">
                  @if (session('message'))
                      <p class="py-2 px-3 bg-success text-white my-3 rounded">
                          {{ session('message') }}
                      </p>
                  @endif
                  @if (session('loginerror'))
                      <p class="py-2 px-3 bg-danger text-white my-3 rounded">
                          {{ session('loginerror') }}
                      </p>
                  @endif
                  @csrf
                  <div class="mt-3 for-des">
                    <input type="email" 
                      class="form-control @error('email') is-invalid @enderror border-0 text-secondary py-3 shadow-none"
                      placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                      @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>

                  <div class="mt-3 for-des">
                    <input type="password" 
                    class="form-control @error('password') is-invalid @enderror text-secondary border-0 py-3 shadow-none "
                    required autocomplete="current-password"
                    placeholder="Password" name="password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="d-flex flex-sm-row flex-column justify-content-between align-items-sm-center">
                    <div class="mt-3">
                      <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : ''}}>
                      <label for="remember">Remember me</label>
                    </div>
                    <div class="mt-sm-3 mt-2 text-sm-start text-center">
                      <input type="submit" value="Login" name="submit" class="btn border rounded-pill px-5 py-2 pri-btn text-white">
                    </div>
                  </div>
                </form>
                <!-- -- ----------------------------
                          End Form
                ------------------------------ -- -->
              </div>
            </div>
          </div> 
          <div class="mt-auto">
            <a href="resetPassword" class="d-block text-decoration-none text-dark text-center mt-5">
              Change password
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="{{asset('/js/main.js')}}"></script>
</body>

</html>