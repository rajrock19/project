<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets\auth\login.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/toastr/css/toastr.min.css') }}">
    <title>Login</title>
</head>
<body>
    <form class="login">
        @csrf
        <h2>Welcome!</h2>
        <p>Please log in</p>
        <input type="text" placeholder="Email Id" id="email"> 
        <input type="password" placeholder="Password" id="password">
        <button class="button" type="button" value="Log In" id="submit">Submit</button>
        <div class="links">
          <div href="javascript:void(0)">Employee Register</div>
          <a href="{{route('employee.register')}}">Register</a>
        </div>
      </form>
    
      <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
      <script src="{{ asset('assets/toastr/js/toastr.min.js') }}" type="text/javascript"></script>
<script>
        $('#submit').on('click',function(){
             
            var email=$('#email').val();
            var password=$('#password').val();

            if(email =='' && password ==''){
                toastr.error('Email And Password Field are Required');
                return false;
            }

            $.ajax({
            type: 'post',
            url: '{!! route('authenticate') !!}',
                    data: {
                     _token: '{{ csrf_token() }}',
                     _method: 'post',
                     email: email,
                      password:password
                     },
                     success: function(data) {
                        if(data.error){
                            toastr.error(data.message);  
                        }else{
                            window.location.href = data.redirect_url;
                        }
                        
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            var data = $.parseJSON(jqXHR.responseText);
                            toastr.error('Something Went Wrong');  
                        }                     
         });
        });
   
</script>
</body>

</html>