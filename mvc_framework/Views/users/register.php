<?php /** @var \Core\View\ViewInterface $this */ ?>
<h1>Register</h1>

<form method="post" action="<?= $this->url('users','registerProcess')?>">
    Username <input type="text" name="username"><br/>
    Password <input type="password" name="password"><br/>
    Password <input type="password" name="confirmPassword"><br/>
    <input type="submit" name="register" value="Register">
</form>

