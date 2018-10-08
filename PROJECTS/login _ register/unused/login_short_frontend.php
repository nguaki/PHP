<?php
    require '../core/init.php';
    
    echo 'login_short_frontend()  _SESSION:';
    var_dump($_SESSION);
?>
    
    <form action="login_short_backend.php" method="POST">
        <div class="field">
           <p><span><?php echo Session::get('errors'); Session::delete('errors'); ?></span></p>
        </div>
        </div><div class="field">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="" autocomplete="on">
        </div> 
        <div class="field">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value="" autocomplete="off">
        </div> 
        <div class="field">
            <input type="checkbox" name="remember" id="remember">
            <laber for="remember">Remember</laber>
        </div> 
            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
            <input type="submit" value="Log In">
    </form>