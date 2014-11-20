<h3>Sign in</h3>
<form role="form" class="form-horizontal" method="POST" action="">
 
    <div class="form-group" >
      <label for="idLogin" class="col-sm-6 control-label">login</label>
      <div class="col-sm-6">
        <input class="form-control" type="text" name="login" id="idLogin" value="<?php
          if (isset($_POST['login']))
            echo $_POST['login'];

        ?>">
      </div>
    </div>
    
    <div class="form-group">
      <label for="idPassword" class="col-sm-6 control-label">Password</label>
      <div class="col-sm-6">
        <input class="form-control" type="password" name="password" id="idPassword" value="<?php
          if (isset($_POST['password']))
            echo $_POST['password'];

        ?>">
      </div>
    </div>
  <div class="jumbotron">
    <div class="form-group">
        <div class="col-sm-offset-8 col-sm-4">
        <button type="submit" class="btn btn-primary btn-lg">Login</button>
      </div>
    </div>
  </div>
</form>