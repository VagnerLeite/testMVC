<?php if ( ! defined('ABSPATH')) exit; ?>

<div class="wrap">

<?php

// Carrega todos os métodos do modelo
$modelo->validate_register_form();
$modelo->get_register_form( chk_array( $parametros, 1 ) );
$modelo->del_user( $parametros );
?>

<form method="post" action="">
	<table class="form-table">
		<tr>
			<td>Name: </td>
			<td> <input type="text" name="user_name" value="<?php
				echo htmlentities( chk_array( $modelo->form_data, 'user_name') );
				?>" /></td>
		</tr>
		<tr>
			<td>User: </td>
			<td> <input type="text" name="user" value="<?php
				echo htmlentities( chk_array( $modelo->form_data, 'user') );
			?>" /></td>
		</tr>
		<tr>
			<td>Password: </td>
			<td> <input type="password" name="user_password" value="<?php
			echo htmlentities( chk_array( $modelo->form_data, 'user_password') );
			?>" /></td>
		</tr>
		<tr>
			<td>Permissions <br><small>(Separate permissions using commas)</small>: </td>
			<td> <input type="text" name="user_permissions" value="<?php
			echo htmlentities( chk_array( $modelo->form_data, 'user_permissions') );
			?>" /></td>
		</tr>
		<tr>
			<td colspan="2">
				<?php echo $modelo->form_msg;?>
				<input type="submit" value="Save" />
				<a href="<?php echo HOME_URI . '/user-register';?>">New user</a>
			</td>
		</tr>
	</table>
</form>

<?php
// Lista os usuários
$lista = $modelo->get_user_list();
?>


<table class="list-table">
	<thead>
		<tr>
			<th>ID</th>
			<th>Usuário</th>
			<th>Name</th>
			<th>Permissões</th>
			<th>Edição</th>
		</tr>
	</thead>

	<tbody>

		<?php foreach ($lista as $fetch_userdata): ?>

			<tr>

				<td> <?php echo $fetch_userdata['user_id'] ?> </td>
				<td> <?php echo $fetch_userdata['user'] ?> </td>
				<td> <?php echo $fetch_userdata['user_name'] ?> </td>
				<td> <?php echo implode( ',', unserialize( $fetch_userdata['user_permissions'] ) ) ?> </td>

				<td>
					<a href="<?php echo HOME_URI ?>/user-register/index/edit/<?php echo $fetch_userdata['user_id'] ?>">Edit</a>
					<a href="<?php echo HOME_URI ?>/user-register/index/del/<?php echo $fetch_userdata['user_id'] ?>">Delete</a>
				</td>

			</tr>

		<?php endforeach;?>

	</tbody>
</table>

<div class="panel panel-default">
		<div class="panel-heading">
				Lista de Usuarios
		</div>
		<!-- /.panel-heading -->
		<div class="panel-body">
				<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
								<tr>
										<th>ID</th>
										<th>Usuario</th>
										<th>Nome</th>
										<th>Permissoes</th>
										<th><center>Editar</center></th>
										<th><center>Excluir</center></th>
								</tr>
						</thead>
						<tbody>
							<?php foreach ($lista as $fetch_userdata): ?>
								<tr class="odd gradeX">
										<td><?php echo $fetch_userdata['user_id'] ?></td>
										<td><?php echo $fetch_userdata['user'] ?></td>
										<td><?php echo $fetch_userdata['user_name'] ?></td>
										<td><?php echo implode( ',', unserialize( $fetch_userdata['user_permissions'] ) ) ?></td>
										<td align="center"><a href="<?php echo HOME_URI ?>/user-register/index/edit/<?php echo $fetch_userdata['user_id'] ?>"><i class="fa fa-edit"></i></a></td>
										<td align="center"><a href="<?php echo HOME_URI ?>/user-register/index/del/<?php echo $fetch_userdata['user_id'] ?>"><i class="fa fa-trash"></i></a></td>
								</tr>
							<?php endforeach;?>


						</tbody>
				</table>
		</div>
		<!-- /.panel-body -->
</div>

</div> <!-- .wrap -->
