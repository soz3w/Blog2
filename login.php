<?php 
session_start();
if (isset($_SESSION["login"]))
    header('location:getPostsList.php');
?>
<h3>Sign in</h3>
<form role="form" class="clearfix form-horizontal">
 <p class="warning" id="MessageError"></p>
    <div class="form-group" >
      <label for="idLogin" class="col-md-6 control-label">login</label>
      <div class="col-md-6">
        <input class="form-control" type="text" name="login" id="idLogin" value="">
      </div>
    </div>
    
    <div class="form-group">
      <label for="idPassword" class="col-md-6 control-label">Password</label>
      <div class="col-md-6">
        <input class="form-control" type="password" name="password" id="idPassword" value="">
      </div>
    </div>
  
    <div class="form-group">
        <div class="col-md-offset-8 col-md-4">
        <button  onclick="return false;" class="btn btn-primary btn-lg btnLogin">Login</button>
      </div>
    </div>
  
</form>