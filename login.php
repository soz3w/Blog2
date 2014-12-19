<?php 
session_start();
if (isset($_SESSION["login"]))
{
   header('location:getPostsList.php');
}
   
?>
<h3>Sign in</h3>
<form role="form" class="form-horizontal">
 <p class="warning" id="MessageError"></p>
    <div class="form-group has-error has-feedback" >
      <label for="idLogin" class="col-xs-6 control-label">login</label>
      <div class="col-xs-6">
        <input class="form-control input-sm" type="text" name="login" id="idLogin" value="">
        
      </div>
    </div>
    
    <div class="form-group">
      <label for="idPassword" class="col-xs-6 control-label">Password</label>
      <div class="col-xs-6">
        <input class="form-control input-sm" type="password" name="password" id="idPassword" value="">
      </div>
    </div>
  
    <div class="form-group">

        <div class="col-xs-offset-8 col-xs-4">
          <button onclick="return false"  class="btn btn-primary btn-sm btnLogin">Login</button>        
      </div>
      <div class="row alert alert-block alert-danger" style="display:none">
            <h4>Erreur !</h4>
            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
            <span class="help-block"></span>
        </div>
      
    </div>
  
</form>

