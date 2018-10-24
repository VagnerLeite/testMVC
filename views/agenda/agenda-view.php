<?php if (!defined('ABSPATH')) exit; ?>

    <?php
// Carrega todos os métodos do modelo
    $modelo->validate_register_form();
    $modelo->get_register_form(chk_array($parametros, 1));
    $modelo->del_agenda($parametros);
    ?>
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <center>Cadastrar Agenda <i class="fa fa-phone"></i></center>
                </div>
                <div class="panel-body">
                    <form method="post">
                            <tr><td width="150px">Id</td><td><input readonly name="age_id" class="form-control" id="age_id" aria-describedby="user" placeholder="Id" value="<?php echo htmlentities(chk_array($modelo->form_data, 'age_id')); ?>"></td></tr>
                            <tr><td width="150px">Nome</td><td><input name="age_nome" class="form-control" id="age_nome" aria-describedby="user" placeholder="Nome" value="<?php echo htmlentities(chk_array($modelo->form_data, 'age_nome')); ?>"></td></tr>
                            <tr><td>Telefone </td><td><input type="text" class="form-control" id="age_telefone" name="age_telefone" placeholder="Telefone" ata-mask="(00) 0000-0000" data-mask-selectonfocus="true" value="<?php echo htmlentities(chk_array($modelo->form_data, 'age_telefone')); ?>"></td></tr>
                            <tr><td>Celular </td><td><input type="text" class="form-control" id="age_celular" name="age_celular" placeholder="Celular" ata-mask="(00) 0000-0000" data-mask-selectonfocus="true" value="<?php echo htmlentities(chk_array($modelo->form_data, 'age_celular')); ?>"></td></tr>
                            <tr>&nbsp;</tr>
                            <tr><td colspan="2"><div class='linhabase-block' align='center'><input class="btn btn-success" type="submit" value="Salvar"></div></td></tr>
                            <tr>
                                <td colspan="2">
                                    <?php echo $modelo->form_msg; ?>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="agendaModal" tabindex="-1" role="dialog" aria-labelledby="agendaModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="agendaModalLabel">Editar Agenda</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="panel-body">
                <form method="post">
                        <tr><td width="150px">Id</td><td><input readonly name="age_id" class="form-control" id="age_id" aria-describedby="user" placeholder="Id" value="<?php echo htmlentities(chk_array($modelo->form_data, 'age_id')); ?>"></td></tr>
                        <tr><td width="150px">Nome</td><td><input name="age_nome" class="form-control" id="age_nome" aria-describedby="user" placeholder="Nome" value="<?php echo htmlentities(chk_array($modelo->form_data, 'age_nome')); ?>"></td></tr>
                        <tr><td>Telefone </td><td><input type="text" class="form-control" id="age_telefone" name="age_telefone" placeholder="Telefone" ata-mask="(00) 0000-0000" data-mask-selectonfocus="true" value="<?php echo htmlentities(chk_array($modelo->form_data, 'age_telefone')); ?>"></td></tr>
                        <tr><td>Celular </td><td><input type="text" class="form-control" id="age_celular" name="age_celular" placeholder="Celular" ata-mask="(00) 0000-0000" data-mask-selectonfocus="true" value="<?php echo htmlentities(chk_array($modelo->form_data, 'age_celular')); ?>"></td></tr>
                        <tr>&nbsp;</tr>
                        <tr><td colspan="2"><div class='linhabase-block' align='center'><input class="btn btn-success" type="submit" value="Salvar"></div></td></tr>
                        <tr>
                            <td colspan="2">
                              <div class="alert alert-warning">
                                <?php echo $modelo->form_msg; ?>
                              </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
          </div>
          <div class="modal-footer">
            <input class="btn btn-danger" data-dismiss="modal" type="button" value="Close">
          </div>
        </div>
      </div>
    </div>

    <?php
    // Lista a agenda
    $lista = $modelo->listar_agenda();
    ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            Agenda Telefonica
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered" id="dataTables-example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Celular</th>
                        <th><center>Editar</center></th>
                <th><center>Excluir</center></th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista as $values): ?>
                        <tr class="odd gradeX">
                            <td><?php echo $values['age_id'] ?></td>
                            <td><?php echo $values['age_nome'] ?></td>
                            <td><?php echo $values['age_telefone'] ?></td>
                            <td><?php echo $values['age_celular'] ?></td>
                            <td align="center"><a href="<?php echo HOME_URI ?>/agenda/index/edit/<?php echo $values['age_id'] ?>"><i class="fa fa-edit"></i></a></td>
                            <td align="center"><a href="<?php echo HOME_URI ?>/agenda/index/del/<?php echo $values['age_id'] ?>"><i class="fa fa-trash-o"></i></a></td>
                            <td align="center"><button onclick="get_register_form(<?php echo $values['age_id'] ?>);" type="button" class="btn btn-info" data-toggle="modal" data-target="#agendaModal">Edit</button></td>
                        </tr>
                    <?php endforeach; ?>


                </tbody>
            </table>
        </div>
        <!-- /.panel-body -->
    </div>
