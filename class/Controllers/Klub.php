<?php
namespace Controllers;
use \Tools\FlashMessage;


class Klub extends GlobalController {
    public function showAll() {
      $this->view->setTemplate('Klub/showAll');
      $this->view->addCSSSet(array('external/datatables',
                                   'external/dataTables.checkboxes'
                                  ));
      $this->view->addJSSet(array('external/datatables',
                                  'external/dataTables.checkboxes',
                                  'external/bootstrap',
                                  'external/validator',
                                  'delete-confirm',
                                  'load-modal',
                                  'klub',

                                  'external/jquery.validate',

                                  'external/jquery.cookie',
                                  'external/jquery-ui'
                                  ));
      $model = $this->createModel('Klub');
      $result['data'] = $model->selectAll();
      $model = $this->createModel('Trener');
      $result['coaches'] = $model->transferByColumn($model->selectAll('trener'));
      return $result;
    }
    public function showOne($id) {
      $this->view->setTemplate('Klub/showOne');
      $this->view->addCSSSet(array('external/datatables',
                                   'external/dataTables.checkboxes'
                                  ));
      $this->view->addJSSet(array('external/datatables',
                                  'external/dataTables.checkboxes',
                                  'external/bootstrap',
                                  'external/validator',
                                  'delete-confirm',
                                  'load-modal',
                                  'klub',

                                  'external/jquery.validate',

                                  'external/jquery.cookie',
                                  'external/jquery-ui'
                                  ));
      $model = $this->createModel('Klub');
      $result['data'] = $model->selecteOneById($id);
      $model = $this->createModel('Trener');
      $result['coaches'] = $model->transferByColumn($model->selectAll('trener'));
      return $result;
    }
    function delete($id) {
      $counter = $this->deleteOne($id);
      FlashMessage::addMessage($counter, 'delete');
      $this->redirect('klub/');
    }
    public function form() {
      $this->view->setTemplate('Klub/addForm');
      $this->view->addCSSSet(array('external/datatables',
                                   'external/dataTables.checkboxes'
                                  ));
      $this->view->addJSSet(array('external/datatables',
                                  'external/dataTables.checkboxes',
                                  'external/validator',
                                  'delete-confirm',
                                  'load-modal',
                                  'klub',

                                  'external/jquery.validate',

                                  'external/jquery.cookie',
                                  'external/jquery-ui'
                                  ));
      $model = $this->createModel('Trener');
      $result['coaches'] = $model->transferToSelectable($model->selectAll('trener'),['Imie','Nazwisko'],' ');
      return $result;
    }
    public function ajaxAddForm() {
      $this->view->setTemplate('ajaxModals/addKlub');
      $model = $this->createModel('Trener');
      $result['coaches'] = $model->transferToSelectable($model->selectAll('trener'), ['Imie','Nazwisko'], ' ');
      return $result;
    }
    public function ajaxEditForm($id) {
      $this->view->setTemplate('ajaxModals/editKlub');
      $model = $this->createModel('Klub');
      $result['data'] = $model->selecteOneById($id);
      $model = $this->createModel('Trener');
      $result['coaches'] = $model->transferToSelectable($model->selectAll('trener'), ['Imie','Nazwisko'], ' ');
      return $result;
    }
    public function insert() {
      $this->check(['siedziba', 'nazwa', 'opis', 'idt'], $_POST);
      $model = $this->createModel('Klub');
      $result = $model->insert($_POST['siedziba'],$_POST['nazwa'],$_POST['opis'],$_POST['idt']);
      FlashMessage::addMessage($result, 'add');
      $this->redirect('klub/');
    }
    public function update() {
      $this->check(['id', 'siedziba', 'nazwa', 'opis', 'idt'], $_POST);
      $model = $this->createModel('Klub');
      $result = $model->update($_POST['id'],$_POST['siedziba'],$_POST['nazwa'],$_POST['opis'],$_POST['idt']);
      FlashMessage::addMessage($result, 'update');
      $this->redirect('klub/');
    }
}
