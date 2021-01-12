<?php
namespace Controllers;
use \Tools\FlashMessage;


class Sedzia extends GlobalController {
    public function showAll() {
      $this->view->setTemplate('Sedzia/showAll');
      $this->view->addCSSSet(array('external/datatables',
                                   'external/dataTables.checkboxes'
                                  ));
      $this->view->addJSSet(array('external/datatables',
                                  'external/dataTables.checkboxes',
                                  'external/bootstrap',
                                  'external/validator',
                                  'delete-confirm',
                                  'load-modal',
                                  'sedzia',

                                  'external/jquery.validate',

                                  'external/jquery.cookie',
                                  'external/jquery-ui'
                                  ));
      $model = $this->createModel('Sedzia');
      $result['data'] = $model->selectAll();
      return $result;
    }
    public function showOne($id) {
      $this->view->setTemplate('Sedzia/showOne');
      $this->view->addCSSSet(array('external/datatables',
                                   'external/dataTables.checkboxes'
                                  ));
      $this->view->addJSSet(array('external/datatables',
                                  'external/dataTables.checkboxes',
                                  'external/bootstrap',
                                  'external/validator',
                                  'delete-confirm',
                                  'load-modal',
                                  'sedzia',

                                  'external/jquery.validate',

                                  'external/jquery.cookie',
                                  'external/jquery-ui'
                                  ));
      $model = $this->createModel('Sedzia');
      $result['data'] = $model->selecteOneById($id);
      $model = $this->createModel('Sedzia');
      return $result;
    }
    function delete($id) {
      $counter = $this->deleteOne($id);
      FlashMessage::addMessage($counter, 'delete');
      $this->redirect('sedzia/');
    }
    public function form() {
      $this->view->setTemplate('Sedzia/addForm');
      $this->view->addCSSSet(array('external/datatables',
                                   'external/dataTables.checkboxes'
                                  ));
      $this->view->addJSSet(array('external/datatables',
                                  'external/dataTables.checkboxes',
                                  'external/validator',
                                  'delete-confirm',
                                  'load-modal',
                                  'sedzia',

                                  'external/jquery.validate',

                                  'external/jquery.cookie',
                                  'external/jquery-ui'
                                  ));
    }
    public function ajaxAddForm() {
      $this->view->setTemplate('ajaxModals/addSedzia');
    }
    public function ajaxEditForm($id) {
      $this->view->setTemplate('ajaxModals/editSedzia');
      $model = $this->createModel('Sedzia');
      $result['data'] = $model->selecteOneById($id);
      return $result;
    }
    public function insert() {
      $this->check(['imie'], $_POST);
      $this->check(['nazwisko'], $_POST);
      $model = $this->createModel('Sedzia');
      $result = $model->insert($_POST['imie'],$_POST['nazwisko']);
      FlashMessage::addMessage($result, 'add');
      $this->redirect('sedzia/');
    }
    public function update() {
      $this->check(['id', 'imie', 'nazwisko'], $_POST);
      $model = $this->createModel('Sedzia');
      $result = $model->update($_POST['id'],$_POST['imie'],$_POST['nazwisko']);
      FlashMessage::addMessage($result, 'update');
      $this->redirect('sedzia/');
    }
}
