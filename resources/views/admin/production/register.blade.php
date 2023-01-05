@include('layout.html-head')
  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="{{ url('register') }}" method="POST">
              @csrf
              <h1>Create Account</h1>
            
              <div>
                @error('firstname')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                <input type="text" name="firstname" class="form-control @error('firstname') parsley-error border border-danger @enderror" placeholder="First Name"/>
              </div>
              
              <div>
                @error('lastname')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                <input type="text" name="lastname" class="form-control @error('lastname') parsley-error border border-danger @enderror" placeholder="Last Name" />
              </div>

              <div>
                @error('email')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                <input type="email" name="email" class="form-control @error('email') parsley-error border border-danger @enderror" placeholder="Email" />
              </div>

              <div>
                @error('phone')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                <input type="text" name="phone" class="form-control @error('phone') parsley-error border border-danger @enderror" placeholder="Phone Number" />
              </div>

              <div>
                @error('password')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                <input type="password" name="password" class="form-control @error('password') parsley-error border border-danger @enderror" placeholder="Password" />
              </div>

              <div>
                @error('conf_password')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                <input type="password" name="conf_password" class="form-control @error('conf_password') parsley-error border border-danger @enderror" placeholder="Confirm Password" />
              </div>
              
              <div>
                <input type="submit" value="Submit" style="width: 150px;"/>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member?
                  <a href="{{ url('login') }}" class="to_register"> Login </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> OFFICE!</h1>
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
