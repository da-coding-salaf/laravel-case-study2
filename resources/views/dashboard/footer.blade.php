<div style="position: fixed;bottom:20px;right:20px">
  <a href="https://api.whatsapp.com/send?phone=<?php echo $website_info[0]->admin_whatsapp_number?>">
        <img src="../dacodingsalaf-assets/img/icons8-whatsapp-48.png">
   </a>
</div>
	<script src="../dacodingsalaf-assets/dashboard-assets/js/app.js"></script>

 <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="../loader.js"></script>

  <script type="text/javascript">

    //  $.LoadingOverlay("show")

    function disabler() {
        document.getElementById('network').disabled="disabled"
        document.getElementById('amount').disabled="disabled"
        document.getElementById('sending-number').disabled="disabled"
        document.getElementById('account-number').disabled="disabled"
        document.getElementById('bank-name').disabled="disabled"
        document.getElementById('account-name').disabled="disabled"
    }

     function enabler() {
        document.getElementById('network').disabled=""
        document.getElementById('amount').disabled=""
        document.getElementById('sending-number').disabled=""
        document.getElementById('account-number').disabled=""
        document.getElementById('bank-name').disabled=""
        document.getElementById('account-name').disabled=""
        document.getElementById('edit-btn').style.display="none"
    }



    var t=0;

    $(document).ready(function (e) {
 $("#submit-airtime-order").on('submit',(function(e) {
  e.preventDefault();
  
  if(t==0){
      disabler()
      alert("Please preview all details provided before final submittion")
      document.getElementById('edit-btn').style.display='block'
  t++
  return  
  }

  $.LoadingOverlay("show")
  enabler()
  $.ajax({
         url: "../dacodingsalaf-assets/send-airtime-order.php",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,   
   beforeSend : function()
   {

  
   },

   success: function(data)
      {

        loaderReceiver()
        console.log(data);
        var w=JSON.parse(data)
          $.LoadingOverlay("hide")
        if(w.status==true){
          document.getElementById('after-send').style.display="flex"
           swal("Awesome !", "Your order has been received, now click 'Ok' button and send the airtime to the number on the screen. \n Check your your transactions page in other of more detail about your order.", "success");
           document.forms[0].reset()
              document.getElementById('edit-btn').style.display='none'
            document.getElementById('btn').disabled=''
            document.getElementById('receiving-amount').style.display="none"
           
            t=0;
      /*     setTimeout(()=>{
              window.location="dashboard"
           },2000)
*/
        }else{
            document.getElementById('btn').disabled=''
          swal("Incorrect!", w.message, "warning");
        }
        


      },
     error: function(e) 
      {
    $("#err").html(e).fadeIn();
      }          
    });
 }));
});



$(document).ready(function (e) {
 $("#update-user-profile").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: "../dacodingsalaf-assets/update-user-profile.php",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,   
   beforeSend : function()
   {

    document.getElementById('btn').value='Updating'
   document.getElementById('btn').disabled='disabled'
  
   },

   success: function(data)
      {
      	console.log(data);
        var w=JSON.parse(data)

        if(w.status==true){
           swal("Awesome !", w.message, "success");
           //document.getElementById('form')
           document.getElementById('btn').value='Update Profile'
            document.getElementById('btn').disabled=''
      /*     setTimeout(()=>{
              window.location="dashboard"
           },2000)
*/
        }else{
            document.getElementById('btn').value='Update Profile'
            document.getElementById('btn').disabled=''
          swal("Incorrect!", w.message, "warning");
        }
        


      },
     error: function(e) 
      {
    $("#err").html(e).fadeIn();
      }          
    });
 }));
});


$(document).ready(function (e) {
 $("#form-update-password").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: "../dacodingsalaf-assets/update-user-password.php",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,   
   beforeSend : function()
   {

    document.getElementById('btn').value='Updating'
   document.getElementById('btn').disabled='disabled'
  
   },

   success: function(data)
      {
        console.log(data);
        var w=JSON.parse(data)

        if(w.status==true){
           swal("Awesome !", w.message, "success");
           //document.getElementById('form')
           document.getElementById('btn').value='Update Password'
            document.getElementById('btn').disabled=''

           setTimeout(()=>{
              window.location="sign-out"
           },2000)

        }else{
            document.getElementById('btn').value='Update Password'
            document.getElementById('btn').disabled=''
          swal("Incorrect!", w.message, "warning");
        }
        


      },
     error: function(e) 
      {
    $("#err").html(e).fadeIn();
      }          
    });
 }));
});

 function query(a){  
     a.disabled="disabled"
     a.value="Sending Query"
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
      //a.style.display="none"
       a.disabled=""
      a.onclick=""
      a.id=""
      a.style.backgroundColor="#FDC800";
      a.style.borderRadius="0px"
      a.style.color="white"
      a.style.border="0px solid"
      a.style.padding="3px"
      a.value="Status: Reviewing by Admin"
    if(this.responseText){
         swal("Awesome !", "Your query transaction request has been sent to the Admin for review thanks", "success");
    }
  
      }
  };
   var b="id="+a.id;
 xhttp.open("POST", "../dacodingsalaf-assets/query-back.php", true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send(b);
      }

        function simpleChange(){
               document.getElementById('amount').value=0 
        document.getElementById('TOTALtransactionsCharge').innerHTML=0
        }

       function loaderReceiver(wew){ 
       
        document.getElementById('receiver').style.display="none"
         //document.getElementById('receiver2').style.display="none"
        document.getElementById('receiver-box').value=""
        document.getElementById('amount').value=0 
        document.getElementById('TOTALtransactionsCharge').innerHTML=0
        $.LoadingOverlay("show"); 
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
       $.LoadingOverlay("hide")
        var w=JSON.parse(this.responseText)
        if(w.status==true){
             // document.getElementById('receiver2').style.display="block"
             document.getElementById('receiver').style.display="block"
              document.getElementById('receiver-box').value=w.message
        }
        


  };
}
   var b="network="+document.getElementById('network').value;
 xhttp.open("POST", "../dacodingsalaf-assets/get-receiver-number.php", true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send(b);
      }

   </script>


</body>

</html>