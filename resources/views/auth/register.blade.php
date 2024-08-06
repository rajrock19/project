<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets\auth\login.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/toastr/css/toastr.min.css') }}">
    <title>Employee Register</title>
</head>
<body>
    <form class="login">
        @csrf
        <h2>Employee Registration form</h2>
        <input type="text" placeholder="Name" id="name"> 
        <input type="text" placeholder="Email Id" id="email"> 
        <input type="text" placeholder="phone no" id="phone"> 
        <input type="text" placeholder="Age" id="age"> 
        <input type="text" placeholder="Address" id="address"> 

        <input type="password" placeholder="Password" id="password">
        
        <button class="button" type="button" value="Log In" id="submit">Submit</button>
        <div class="links">
          <div href="javascript:void(0)">Already Account </div>
          <a href="{{url('/')}}">Login</a>
        </div>
      </form>
    
      <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
      <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('assets/js/feather.min.js') }}"></script>
      <script src="{{ asset('assets/js/moment.min.js') }}"></script>
      <script src="{{ asset('assets/js/script.js') }}"></script>
      <script src="{{ asset('assets/toastr/js/toastr.min.js') }}" type="text/javascript"></script>
<script>
$('#submit').on('click', function() {
    console.log('Submit button clicked.');

    var email = $('#email').val();
    var name = $('#name').val();
    var password = $('#password').val();
    var phone = $('#phone').val();
    var age = $('#age').val();
    var address = $('#address').val();

    if (email == '' || password == '' || phone == '' || age == '' || address == '') {
        toastr.error('All Fields are Required');
        return false;
    }

    $.ajax({
        type: 'post',
        url: '{!! route('employee.store') !!}',
        data: {
            _token: '{{ csrf_token() }}',
            _method: 'post',
            email: email,
            name: name,
            password: password,
            phone: phone,
            age: age,
            address: address
        },
        success: function(data) {
            console.log('AJAX success:', data);
            if (data.success) {
                window.location.href = data.redirect_url;
            } else {
                toastr.error(data.message);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('AJAX error:', jqXHR, textStatus, errorThrown);
            var data = $.parseJSON(jqXHR.responseText);
            toastr.error('Something Went Wrong: ' + data.message);
        }
    });
});

   
</script>
</body>

</html>