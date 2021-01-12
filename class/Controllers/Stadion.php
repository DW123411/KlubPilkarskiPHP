<?php
namespace Controllers;
use \Tools\FlashMessage;


class Stadion extends GlobalController {
    public function showAll() {
      $this->view->setTemplate('Stadion/showAll');
      $this->view->addCSSSet(array('external/datatables',
                                   'external/dataTables.checkboxes'
                                  ));
      $this->view->addJSSet(array('external/datatables',
                                  'external/dataTables.checkboxes',
                                  'external/bootstrap',
                                  'external/validator',
                                  'delete-confirm',
                                  'load-modal',
                                  'stadion',

                                  'external/jquery.validate',

                                  'external/jquery.cookie',
                                  'external/jquery-ui'
                                  ));
      $model = $this->createModel('Stadion');
      $result['data'] = $model->selectAll();
      return $result;
    }
    public function showOne($id) {
      $this->view->setTemplate('Stadion/showOne');
      $this->view->addCSSSet(array('external/datatables',
                                   'external/dataTables.checkboxes'
                                  ));
      $this->view->addJSSet(array('external/datatables',
                                  'external/dataTables.checkboxes',
                                  'external/bootstrap',
                                  'external/validator',
                                  'delete-confirm',
                                  'load-modal',
                                  'stadion',

                                  'external/jquery.validate',

                                  'external/jquery.cookie',
                                  'external/jquery-ui'
                                  ));
      $model = $this->createModel('Stadion');
      $result['data'] = $model->selecteOneById($id);
      $model = $this->createModel('Stadion');
      return $result;
    }
    function delete($id) {
      $counter = $this->deleteOne($id);
      FlashMessage::addMessage($counter, 'delete');
      $this->redirect('stadion/');
    }
    public function form() {
      $this->view->setTemplate('Stadion/addForm');
      $this->view->addCSSSet(array('external/datatables',
                                   'external/dataTables.checkboxes'
                                  ));
      $this->view->addJSSet(array('external/datatables',
                                  'external/dataTables.checkboxes',
                                  'external/validator',
                                  'delete-confirm',
                                  'load-modal',
                                  'stadion',

                                  'external/jquery.validate',

                                  'external/jquery.cookie',
                                  'external/jquery-ui'
                                  ));
    }
    public function ajaxAddForm() {
      $this->view->setTemplate('ajaxModals/addStadion');
    }
    public function ajaxEditForm($id) {
      $this->view->setTemplate('ajaxModals/editStadion');
      $model = $this->createModel('Stadion');
      $result['data'] = $model->selecteOneById($id);
      return $result;
    }
    public function insert() {
      $this->check(['nazwa'], $_POST);
      $this->check(['miejscowosc'], $_POST);
      $this->check(['pojemnosc'], $_POST);
      $model = $this->createModel('Stadion');
      $result = $model->insert($_POST['nazwa'],$_POST['miejscowosc'],$_POST['pojemnosc']);
      FlashMessage::addMessage($result, 'add');
      $this->redirect('stadion/');
    }
    public function update() {
      $this->check(['id', 'nazwa', 'miejscowosc', 'pojemnosc'], $_POST);
      $model = $this->createModel('Stadion');
      $result = $model->update($_POST['id'],$_POST['nazwa'],$_POST['miejscowosc'],$_POST['pojemnosc']);
      FlashMessage::addMessage($result, 'update');
      $this->redirect('stadion/');
    }
}
