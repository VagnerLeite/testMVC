<?php
/**
 * AgendaController - Controller de exemplo
 *
 * @package myMVC
 * @since 0.1
 */
class AgendaController extends MainController
{

	/**
	 * $login_required
	 *
	 * Se a página precisa de login
	 *
	 * @access public
	 */
	public $login_required = true;

	/**
	 * $permission_required
	 *
	 * Permissão necessária
	 *
	 * @access public
	 */
	public $permission_required = 'gerenciar-agenda';

	/**
	 * Carrega a página "/views/agenda/index.php"
	 */
    public function index() {
  		// Page title
  		$this->title = 'Registro na Agenda';

  		// Verifica se o usuário está logado
  		if ( ! $this->logged_in ) {

  			// Se não; garante o logout
  			$this->logout();

  			// Redireciona para a página de login
  			$this->goto_login();

  			// Garante que o script não vai passar daqui
  			return;

  		}

  		// Verifica se o usuário tem a permissão para acessar essa página
  		if (!$this->check_permissions($this->permission_required, $this->userdata['user_permissions'])) {

  			// Exibe uma mensagem
  			echo 'Você não tem permissao para acessar essa pagina.';

  			// Finaliza aqui
  			return;
  		}

		    // Parametros da função
      $parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();

		    // Carrega o modelo para este view
      $modelo = $this->load_model('agenda/agenda-model');

		      /** Carrega os arquivos do view **/

		        // /views/_includes/header.php
      require ABSPATH . '/views/_includes/header.php';

		      // /views/_includes/menu.php
      require ABSPATH . '/views/_includes/menu.php';

		      // /views/user-register/index.php
      require ABSPATH . '/views/agenda/agenda-view.php';

		      // /views/_includes/footer.php
      require ABSPATH . '/views/_includes/footer.php';

    } // index

} // class home