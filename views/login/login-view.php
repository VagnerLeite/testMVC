<?php if ( ! defined('ABSPATH')) exit; ?>

<div class="wrap">

<?php
if ( $this->logged_in ) {
	echo '<div class="alert alert-warning">
			  	<strong>Logado!</strong>
				</div>';
}
?>
	<div class="container" style="width: 100%;">
		<form method="post">
			<table class="table table-striped">
				<tr><td width="150px">User</td><td><input name="userdata[user]" class="form-control" id="userdata[user]" aria-describedby="user" placeholder="Enter User"></td></tr>
				<tr><td>Password </td><td><input type="password" class="form-control" id="userdata[user_password]" name="userdata[user_password]" placeholder="Password"></td></tr>
				<?php
				if ( $this->login_error ) {
					echo '<tr><td colspan="2" class="error">' . $this->login_error . '</td></tr>';
				}
				?>
				<tr><td colspan="2"><div class='linhabase-block' align='center'><input class="btn btn-success" type="submit" value="Enter"></div></td></tr>
			</table>
		</form>
	</div>




</div> <!-- .wrap -->
