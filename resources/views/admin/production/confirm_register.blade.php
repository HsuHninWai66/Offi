@include('layout.html-head')
  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="{{ route('registerConfirm') }}" method="POST">
              @csrf
              <h1>Create Account</h1>
              <div class="text-left" style="padding: 20px;">
                FirstName : <b>{{ $adminData['firstname'] }}</b>
                <input type="hidden" name="firstname" class="form-control" value="{{ $adminData['firstname'] }}" placeholder="First Name"/>
              </div>
              <div class="text-left" style="padding: 20px;">
                LastName : <b>{{ $adminData['lastname'] }}</b>
                <input type="hidden" name="lastname" class="form-control" value="{{ $adminData['lastname'] }}" placeholder="Last Name" />
              </div>
              <div class="text-left" style="padding: 20px;">
                Email : <b>{{ $adminData['email'] }}</b>
                <input type="hidden" name="email" class="form-control" value="{{ $adminData['email'] }}" />
              </div>
              <div class="text-left" style="padding: 20px;"> 
                Phone Number : <b>{{ $adminData['phone'] }}</b>
                <input type="hidden" name="phone" class="form-control" value="{{ $adminData['phone'] }}" />
              </div>
              <div class="text-left" style="padding: 20px;">
                Password : <b>********</b>
                <input type="hidden" name="password" class="form-control" value="{{ $adminData['password'] }}" />
                <input type="hidden" name="conf_password" class="form-control" value="{{ $adminData['conf_password'] }}" />
              </div>
              <div class="clearfix"></div>

              <div class="separator">
                  <input type="submit" value="Confirm" style="width:150px;">
                  <p class="change_link" style="padding: 10px;"><a href="{{ url('login') }}">Already a member?</a>
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
