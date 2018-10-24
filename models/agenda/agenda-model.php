<?php

/**
 * Classe para registros de agenda
 *
 * @package agendaMVC
 * @since 0.1
 */
class AgendaModel {

    /**
     * $form_data
     *
     * Os dados do formulário de envio.
     *
     * @access public
     */
    public $form_data;

    /**
     * $form_msg
     *
     * As mensagens de feedback para o usuário.
     *
     * @access public
     */
    public $form_msg;

    /**
     * $db
     *
     * O objeto da nossa conexão PDO
     *
     * @access public
     */
    public $db;

    /**
     * Construtor
     *
     * Carrega  o DB.
     *
     * @since 0.1
     * @access public
     */
    public function __construct($db = false) {
        $this->db = $db;
    }

    /**
     * Valida o formulário de envio
     *
     * Este método pode inserir ou atualizar dados dependendo do campo de
     * usuário.
     *
     * @since 0.1
     * @access public
     */
    public function validate_register_form() {

        // Configura os dados do formulário
        $this->form_data = array();

        // Verifica se algo foi postado
        if ('POST' == $_SERVER['REQUEST_METHOD'] && !empty($_POST)) {

            // Faz o loop dos dados do post
            foreach ($_POST as $key => $value) {

                // Configura os dados do post para a propriedade $form_data
                $this->form_data[$key] = $value;

                //echo $key.' - '.$value.'<br />';

                // Nós não permitiremos nenhum campos em branco
                if (empty($value)) {

                    // Configura a mensagem
                    $this->form_msg = '<p class="form_error">Existem Dados Vazios.</p>';
                    return;
                }
            }
        } else {
            // Termina se nada foi enviado
            return;
        }

        // Verifica se a propriedade $form_data foi preenchida
        if (empty($this->form_data)) {
            return;
        }

        // Verifica se o usuário existe
        $db_check_user = $this->db->query(
                'SELECT * FROM `agenda` WHERE `age_id` = ?', array(
            chk_array($this->form_data, 'age_id')
                )
        );

        // Verifica se a consulta foi realizada com sucesso
        if (!$db_check_user) {
            $this->form_msg = '<p class="form_error">Internal error.</p>';
            return;
        }

        // Obtém os dados da base de dados MySQL
        $fetch_user = $db_check_user->fetch();

        // Configura o ID do usuário
        $age_id = $fetch_user['age_id'];

        // Verifica se as permissões tem algum valor inválido:
        // 0 a 9, A a Z e , . - _
        if (empty($this->form_data['age_nome'])) {
            $this->form_msg = '<p class="form_error">Digite um nome.</p>';
            return;
        }

        if (empty($this->form_data['age_telefone'])) {
            $this->form_msg = '<p class="form_error">Digite um Telefone.</p>';
            return;
        }



        // Se o ID do usuário não estiver vazio, atualiza os dados
        if (!empty($age_id)) {

            $query = $this->db->update('agenda', 'age_id', $age_id, array(
                'age_nome' => chk_array($this->form_data, 'age_nome'),
                'age_telefone' => chk_array($this->form_data, 'age_telefone'),
                'age_celular' => chk_array($this->form_data, 'age_celular'),
                'age_comercial' => chk_array($this->form_data, 'age_comercial'),
            ));

            // Verifica se a consulta está OK e configura a mensagem
            if (!$query) {
                $this->form_msg = '<p class="form_error">Erro na pesquisa.</p>';
                // Termina
                return;
            } else {
                $this->form_msg = '<p class="form_success">Agenda atualizada com Sucesso.</p>';
                // Termina
                return;
            }
            // Se o ID do usuário estiver vazio, insere os dados
        } else {

            // Executa a consulta
            $query = $this->db->insert('agenda', array(
                'age_nome' => chk_array($this->form_data, 'age_nome'),
                'age_telefone' => chk_array($this->form_data, 'age_telefone'),
                'age_celular' => chk_array($this->form_data, 'age_celular'),
                'age_comercial' => chk_array($this->form_data, 'age_comercial'),
            ));

            // Verifica se a consulta está OK e configura a mensagem
            if (!$query) {
                $this->form_msg = '<p class="form_error">Erro de novo.</p>'.__LINE__;

                // Termina
                return;
            } else {
                $this->form_msg = '<p class="form_success">Agenda Salva com sucesso</p>';

                // Termina
                return;
            }
        }
    }

// validate_register_form

    /**
     * Obtém os dados do formulário
     *
     * Obtém os dados para usuários registrados
     *
     * @since 0.1
     * @access public
     */
    public function get_register_form($age_id = false) {

        // O ID do registro que vamos pesquisar
        $s_age_id = false;

        // Verifica se você enviou algum ID para o método
        if (!empty($age_id)) {
            $s_age_id = (int) $age_id;
        }

        // Verifica se existe um ID de usuário
        if (empty($s_age_id)) {
            return;
        }

        // Verifica na base de dados
        $query = $this->db->query('SELECT * FROM `agenda` WHERE `age_id` = ?', array($s_age_id));

        // Verifica a consulta
        if (!$query) {
            $this->form_msg = '<p class="form_error">Nada foi encontrado.</p>';
            return;
        }

        // Obtém os dados da consulta
        $fetch_userdata = $query->fetch();

        // Verifica se os dados da consulta estão vazios
        if (empty($fetch_userdata)) {
            $this->form_msg = '<p class="form_error">Agenda nao existe.</p>';
            return;
        }

        // Configura os dados do formulário
        foreach ($fetch_userdata as $key => $value) {
            $this->form_data[$key] = $value;
        }

        // Por questões de segurança, a senha só poderá ser atualizada
        $this->form_data['age_nome'] = $this->form_data['age_nome'];
        $this->form_data['age_telefone'] = $this->form_data['age_telefone'];
        $this->form_data['age_celular'] = $this->form_data['age_celular'];
        $this->form_data['age_comercial'] = $this->form_data['age_nome'];
    }

// get_register_form

    /**
     * Apaga usuários
     *
     * @since 0.1
     * @access public
     */
    public function del_agenda($parametros = array()) {

        // O ID do usuário
        $age_id = null;

        // Verifica se existe o parâmetro "del" na URL
        if (chk_array($parametros, 0) == 'del') {

            // Mostra uma mensagem de confirmação
            echo '<p class="alert">Tem certeza que deseja apagar este registro?</p>';
            echo '<p><a href="' . $_SERVER['REQUEST_URI'] . '/confirma">Sim</a> |
			<a href="' . HOME_URI . '/agenda">Não</a> </p>';

            // Verifica se o valor do parâmetro é um número
            if (
                    is_numeric(chk_array($parametros, 1)) && chk_array($parametros, 2) == 'confirma'
            ) {
                // Configura o ID do usuário a ser apagado
                $age_id = chk_array($parametros, 1);
            }
        }

        // Verifica se o ID não está vazio
        if (!empty($age_id)) {

            // O ID precisa ser inteiro
            $age_id = (int) $age_id;

            // Deleta o usuário
            $query = $this->db->delete('agenda', 'age_id', $age_id);

            // Redireciona para a página de registros
            echo '<meta http-equiv="Refresh" content="0; url=' . HOME_URI . '/agenda/">';
            echo '<script type="text/javascript">window.location.href = "' . HOME_URI . '/agenda/";</script>';
            return;
        }
    }

// del_user

    /**
     * Obtém a lista da agenda
     *
     * @since 0.1
     * @access public
     */
    public function listar_agenda() {

        // Simplesmente seleciona os dados na base de dados
        $query = $this->db->query('SELECT * FROM `agenda` ORDER BY age_id DESC');

        // Verifica se a consulta está OK
        if (!$query) {
            return array();
        }
        // Preenche a tabela com os dados do usuário
        return $query->fetchAll();
    }

// get_agenda_list
}
