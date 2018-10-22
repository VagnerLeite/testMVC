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
			<li><a href="<?php echo HOME_URI;?>/user-register/">User Register</a></li>
			<li><a href="<?php echo HOME_URI;?>/noticias/">Notícias</a></li>
			<li><a href="<?php echo HOME_URI;?>/noticias/adm/">Notícias Admin</a></li>
    </ul>
  </div>
</nav>
