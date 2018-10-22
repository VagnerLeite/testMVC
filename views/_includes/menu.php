<?php if ( ! defined('ABSPATH')) exit; ?>

<?php if ( $this->login_required && ! $this->logged_in ) return; ?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">My MVC</a>
    </div>
    <ul class="nav navbar-nav">
			<li><a href="<?php echo HOME_URI;?>">Home</a></li>
			<li><a href="<?php echo HOME_URI;?>/login/">Login</a></li>
			<li><a href="<?php echo HOME_URI;?>/user-register/">Usuarios</a></li>
			<li><a href="<?php echo HOME_URI;?>/agenda/">Agenda</a></li>
    </ul>
  </div>
</nav>
