<?php
namespace Controllers;
use \Tools\FlashMessage;


class Trener extends GlobalController {
    public function showAll() {
      $this->view->setTemplate('Trener/showAll');
      $this->view->addCSSSet(array('external/datatables',
                                   'external/dataTables.checkboxes'
                                  ));
      $this->view->addJSSet(array('external/datatables',
                                  'external/dataTables.checkboxes',
                                  'external/bootstrap',
                                  'external/validator',
                                  'delete-confirm',
                                  'load-modal',
                                  'trener',

                                  'external/jquery.validate',

                                  'external/jquery.cookie',
                                  'external/jquery-ui'
                                  ));
      $model = $this->createModel('Trener');
      $result['data'] = $model->selectAll();
      return $result;
    }
    public function showOne($id) {
      $this->view->setTemplate('Trener/showOne');
      $this->view->addCSSSet(array('external/datatables',
                                   'external/dataTables.checkboxes'
                                  ));
      $this->view->addJSSet(array('external/datatables',
                                  'external/dataTables.checkboxes',
                                  'external/bootstrap',
                                  'external/validator',
                                  'delete-confirm',
                                  'load-modal',
                                  'trener',

                                  'external/jquery.validate',

                                  'external/jquery.cookie',
                                  'external/jquery-ui'
                                  ));
      $model = $this->createModel('Trener');
      $result['data'] = $model->selecteOneById($id);
      $model = $this->createModel('Trener');
      return $result;
    }
    function delete($id) {
      $counter = $this->deleteOne($id);
      FlashMessage::addMessage($counter, 'delete');
      $this->redirect('trener/');
    }
    public function form() {
      $this->view->setTemplate('Trener/addForm');
      $this->view->addCSSSet(array('external/datatables',
                                   'external/dataTables.checkboxes'
                                  ));
      $this->view->addJSSet(array('external/datatables',
                                  'external/dataTables.checkboxes',
                                  'external/validator',
                                  'delete-confirm',
                                  'load-modal',
                                  'trener',

                                  'external/jquery.validate',

                                  'external/jquery.cookie',
                                  'external/jquery-ui'
                                  ));
    }
    public function ajaxAddForm() {
      $this->view->setTemplate('ajaxModals/addTrener');
    }
    public function ajaxEditForm($id) {
      $this->view->setTemplate('ajaxModals/editTrener');
      $model = $this->createModel('Trener');
      $result['data'] = $model->selecteOneById($id);
      return $result;
    }
    public function insert() {
      $this->check(['imie'], $_POST);
      $this->check(['nazwisko'], $_POST);
      $model = $this->createModel('Trener');
      $result = $model->insert($_POST['imie'],$_POST['nazwisko']);
      FlashMessage::addMessage($result, 'add');
      $this->redirect('trener/');
    }
    public function update() {
      $this->check(['id', 'imie', 'nazwisko'], $_POST);
      $model = $this->createModel('Trener');
      $result = $model->update($_POST['id'],$_POST['imie'],$_POST['nazwisko']);
      FlashMessage::addMessage($result, 'update');
      $this->redirect('trener/');
    }
}
