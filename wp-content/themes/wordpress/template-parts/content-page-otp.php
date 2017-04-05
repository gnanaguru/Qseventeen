 <?php
?>
<script type="text/javascript">
  jQuery(document).ready(function(){
    jQuery('#otpValidate').click(function(e){
      var tvalue = document.getElementById("otpValue").value;  
      var intPhonenumber = document.getElementById('frmphone').value;
      if(tvalue == ''){
        jQuery('#verifiedstatus').html('please enter otp');
        return false
      }

      //verify otp
      jQuery.ajax({
          method: 'POST',
          url: 'http://l.w.qseventeen.com/otpTest.php',
          async:false,
          data:{ 'approach':'verify', 'otpvalue': tvalue, 'intphonenumber': intPhonenumber} 
      })
      .done(function(data){
        if(data == 'verified'){
          alert('verified');
        }else if(data == 'wrong otp'){
          jQuery('#verifiedstatus').html('Wrong OTP, please entre valid number');
          e.preventDefault();
        }
      })
      .fail(function(event){
        alert('failure call');
      });



      //e.preventDefault();
    });

    jQuery('#frmsend').click(function(){
      if(document.getElementById('frmfirstname').value == ''){
        alert('please enter your firstname');
        return false
      }

      if(document.getElementById('frmlastname').value == ''){
        alert('please enter your lastname');
        return false
      }

      if(document.getElementById('frmemail').value == ''){
        alert('please enter your email');
        return false
      }

      if(document.getElementById('frmphone').value == ''){
        alert('please enter your mobile number');
        return false
      }


      var intPhonenumber = document.getElementById('frmphone').value;
      //generate otp
      //check for abuse
      var abusewords = ['guru ','samy ','test ','ravi '];
      var strdescription = document.getElementById('frmlastname').value;


      jQuery(abusewords).each(function(key,value){
        if(strdescription.indexOf(value) >=0){
           jQuery('#verifiedstatus').html('Sorry, your review are not allow submit due to abuse word');
           e.preventDefault();
         }
      });
      

      jQuery.ajax({
          method: 'POST',
          url: 'http://l.w.qseventeen.com/otpTest.php',
          data:{ 'approach':'generate', 'intphonenumber': intPhonenumber} 
      }).done(function(data){
          jQuery('#otparea').slideDown(400);
          var halfphonenumber = intPhonenumber.substring(7,10);
          jQuery('#verifiedstatus').html('OTP has been sent to your mobile number: *******'+halfphonenumber);
      }).fail(function(data){
          alert('failure call');
      });

    });
  });

</script>
<style type="text/css">
  .otparea{ display: none; }
</style>

<?php

if(isset($_POST['Validate']) && $_POST['Validate'] == 'Verify'){
  print_r($_POST);
}

?>
<div class="content-area" style="width: 50%; margin: 0 auto;">
<h1 class="page-title">Q Form</h1>
  <h4 id="verifiedstatus"></h4>
  <form id="otpverifyform" method="post" action="">
    <div class="otparea" id="otparea">
      <input type="text" id="otpValue" value="" placeholder="enter otp">
      <input type="submit" id="otpValidate" name="Validate" value="Verify">
    </div>
    <input type="text" id="frmfirstname" name="frmfirstname" value="gnana" placeholder="firstname">
    <input type="text" id="frmlastname" name="frmlastname" value="guru" placeholder="lastname">
    <input type="email" id="frmemail" name="frmemail" value="gnanangurumari@gmail.com" placeholder="gnanangurumari@gmail.com">
    <input type="text" id="frmphone" name="frmphone" value="9962468686" placeholder="99624268686">
    <input type="button" id="frmsend" name="frmsend" value="Send">
  </form>
</div> 