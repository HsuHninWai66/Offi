@include('layout.html-head')
  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="{{ route('login-user') }}" method="POST">
              @csrf
              <h1>Login Form</h1>
               @if (session('success'))
                  <div class="alert alert-success show mb-0" role="alert" style="margin-bottom: 10px !important;background:linear-gradient(45deg,#9c7efe8a,#faaca8a3) !important;border:none;">
                    {{session('success')}}
                  </div>
                @elseif (session('login-fail'))
                  <div class="alert alert-danger show mb-0" role="alert" style="margin-bottom: 10px !important;background: rgba(231,76,60,0.1);border: none;color: rgba(231,76,60,0.88);border: 1px solid rgba(231,76,60,0.88);">
                  {{session('login-fail')}}
                </div>
                @elseif (session('login-password-fail'))
                  <div class="alert alert-danger show mb-0" role="alert" style="margin-bottom: 10px !important;background: rgba(231,76,60,0.1);border: none;color: rgba(231,76,60,0.88);border: 1px solid rgba(231,76,60,0.88);">
                  {{session('login-password-fail')}}
                 </div>
               @endif
              <div>
                @error('email')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                <input type="text" class="form-control @error('email') parsley-error border border-danger @enderror" placeholder="Username or email" name="email" value="{{ old('email') }}" />
              </div>
              <div>
                @error('password')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                <input type="password" class="form-control @error('email') parsley-error border border-danger @enderror" placeholder="Password" name="password" value="{{ old('password') }}"/>
              </div>
              <div>
                <input type="submit" value="Submit" style="width: 150px;"/>
              </div>

              <div class="clearfix"></div>

              <div class="separator mt-4">
                <p class="change_link">Lost your password?
                  <a href="{{ url('register') }}" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Welcome to our OFFICE!</h1>
                  <p>©2022 All Rights Reserved. </p>
                </div>
              </div>
            </form>
          </section>
        </div>

      </div>
    </div>
  </body>
</html>
