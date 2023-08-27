
<!doctype html>
<html lang="en">
  <head>
  	<title>| Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ asset('dacodingsalaf-assets/css/style.css') }}">
	</head>
	<body>
		<style type="text/css">
			
		</style>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center">
					 <span class="align-middle" style="color:#025ce3;text-align: center;width: inherit;font-size:25px "></span>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4"></h3>
						<form  id="form" class="login-form" method="post" autocomplete="off">
              @csrf
		      		<div class="form-group">
		      			<input type="text" name="firstname" class="form-control rounded-left" placeholder="First Name" required>
		      		</div>

		      		<div class="form-group">
		      			<input type="text" name="lastname" class="form-control rounded-left" placeholder="Last Name" required>
		      		</div>

		      		<div class="form-group">
		      			<input type="text" name="username" class="form-control rounded-left" placeholder="Username" required>
		      		</div>

		      		<div class="form-group">
		      			<input type="email" name="email" class="form-control rounded-left" placeholder="Email" required>
		      		</div>

		      		   <style type="text/css">
        
        #password{
          padding-right:30px 
        }#pass-cont{
          position: relative;
         
        }#pass-eye{
          position: absolute;
          top:10px;
          right:8px 
        }
      </style>

		      		<div class="form-group" id="pass-cont">
		      			<input type="password" name="password" id="password" class="form-control rounded-left" placeholder="Password" required>
		      			 <div id="pass-eye"><i class="fa fa-eye" style="color:#025CE3" onclick="show_hide_pass(this)" aria-hidden="true"></i></div>
		      		</div>

		      		<div class="form-group" id="pass-cont">
		      			<input type="password" name="confirm_password" id="password2" class="form-control rounded-left" placeholder="Confirm Password" required>
		      			 <div id="pass-eye"><i class="fa fa-eye" style="color:#025CE3 " onclick="show_hide_pass2(this)" aria-hidden="true"></i></div>

		      		</div>
		      		<div class="form-group">
		      			<input type="text" name="phone_number" class="form-control rounded-left" placeholder="Phone Number" required>
		      		</div>

	            <div class="form-group">
	            	 <input type="hidden" name="register" value="register">
	            	<input type="submit" name="register" id="btn" class="btn btn-primary rounded submit p-3 px-5" value="Register">
	            </div>
	          </form>
	        </div>

				</div>

			</div>

		</div>
		 <div style="margin-top: 50px">
		 		<div id="already_member">Already a Member? <a href="{{route('login')}}">Login</a></div>

		 </div>
	</section>



   <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script type="text/javascript">


  	  function show_hide_pass(a){
      if(a.getAttribute('class')=="fa fa-eye"){
        document.getElementById('password').type='text'
        a.className="fa fa-eye-slash"
      }else{
         document.getElementById('password').type='password'
        a.className="fa fa-eye"
      }
    }

     function show_hide_pass2(a){
      if(a.getAttribute('class')=="fa fa-eye"){
        document.getElementById('password2').type='text'
        a.className="fa fa-eye-slash"
      }else{
         document.getElementById('password2').type='password'
        a.className="fa fa-eye"
      }
    }


$(document).ready(function (e) {
 $("#form").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: "{{route('register-user')}}",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,   
   beforeSend : function()
   {

    document.getElementById('btn').value='Authenticating'
   document.getElementById('btn').disabled='disabled'
  
   },

   success: function(data)
      {
      	
        if(data.length>0){
          var w=JSON.parse(data)

if(w.status==true){
   swal("Awesome !", "Your has account successfully registered. You will soon be redirected to your Login Page", "success");
   //document.getElementById('form')
   document.getElementById('btn').value='Redirecting'
   document.getElementById('btn').disabled='disabled'
   setTimeout(()=>{
      window.location="{{route('login')}}"
   },2000)

}else{
    document.getElementById('btn').value='Login'
    document.getElementById('btn').disabled=''
  swal("Incorrect!", w.message, "warning");
}
        }
        
      },
     error: function(e) 
      {


           // var w=JSON.parse(e)
       var errors=e.responseJSON.errors;


for (const key in errors) {
if (errors.hasOwnProperty(key)) {
if(errors[key].length>1){
for(var i=0;i<errors[key].length;i++){
  swal("Oppps !", errors[key][i], "warning");
  return
}
}else{
swal("Oppps !", errors[key][0], "warning");
return
}
}
}


    //$("#err").html(e).fadeIn();
      }          
    });
 }));
});
   </script>
 
	</body>
</html>

