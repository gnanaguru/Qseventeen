 <?php
  print_r($_POST['otpValue']);
if(isset($_POST['Validate']) && $_POST['Validate'] != ''){
  print_r($_POST['otpValue']);
  exit();

}

?>
<script type="text/javascript">
  jQuery(document).ready(function(){
    jQuery('#otpValidate').click(function(e){
      e.preventDefault();
      var tvalue = document.getElementById("otpValue").value;
      alert(tvalue);
      jQuery.ajax({
          method: 'POST',
          url: 'http://wordpress461.com/otpTest.php',
          data:{ 'approach':'check', 'otpvalue': tvalue} 
      })
      .done(function(data){
        if(data == 'true'){
          alert('success')
          var form = jQuery(this);
          var inputs = form.find("input, select, button, textarea");
          var serializedData = form.serialize();
          alert(serializedData);
          jQuery.post({
            method: 'POST',
            url: 'http://wordpress461.com/otpTest.php',
            data:{ 'approach':'submit', 'postvalues':serializedData}
          }).done(function(data){
            alert(data);
            alert('done-post values');
          }).fail(function(){
            alert(data);
            alert('fail-post values');
          });
          jQuery('#review-form').submit();
          return true;
        }else if(data != 'true'){
          alert('wrong, please entre valid number');
          return false;
        }
      })
      .fail(function(event){
        alert('failure');
        return false;
      });

    });
  });
</script>

<?php 
  echo $intRandNumber = rand(1000,9999);
?>


 <div class="content-area" style="width: 50%; margin: 0 auto;">
  <h1 class="page-title">Q Verify</h1>
  <form id="otpverifyform" method="post" action="#" >
  <input type="text" id="otpValue" value="1234" placeholder="enter otp">
  <input type="submit" id="otpValidate" name="Validate" value="Validate">
  </form>
</div> 