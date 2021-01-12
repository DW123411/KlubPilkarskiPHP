<?php
namespace Controllers;
use \Tools\FlashMessage;


class Zawodnik extends GlobalController {
    public function showAll() {
      $this->view->setTemplate('Zawodnik/showAll');
      $this->view->addCSSSet(array('external/datatables',
                                   'external/dataTables.checkboxes'
                                  ));
      $this->view->addJSSet(array('external/datatables',
                                  'external/dataTables.checkboxes',
                                  'external/bootstrap',
                                  'external/validator',
                                  'delete-confirm',
                                  'load-modal',
                                  'zawodnik',

                                  'external/jquery.validate',

                                  'external/jquery.cookie',
                                  'external/jquery-ui'
                                  ));
      $model = $this->createModel('Zawodnik');
      $result['data'] = $model->selectAll();
      $model = $this->createModel('Klub');
      $result['clubs'] = $model->transferByColumn($model->selectAll('klub'));
      return $result;
    }
    public function showOne($id) {
      $this->view->setTemplate('Zawodnik/showOne');
      $this->view->addCSSSet(array('external/datatables',
                                   'external/dataTables.checkboxes'
                                  ));
      $this->view->addJSSet(array('external/datatables',
                                  'external/dataTables.checkboxes',
                                  'external/bootstrap',
                                  'external/validator',
                                  'delete-confirm',
                                  'load-modal',
                                  'zawodnik',

                                  'external/jquery.validate',

                                  'external/jquery.cookie',
                                  'external/jquery-ui'
                                  ));
      $model = $this->createModel('Zawodnik');
      $result['data'] = $model->selecteOneById($id);
      $model = $this->createModel('Klub');
      $result['clubs'] = $model->transferByColumn($model->selectAll('klub'));
      return $result;
    }
    function delete($id) {
      $counter = $this->deleteOne($id);
      FlashMessage::addMessage($counter, 'delete');
      $this->redirect('zawodnik/');
    }
    public function form() {
      $this->view->setTemplate('Zawodnik/addForm');
      $this->view->addCSSSet(array('external/datatables',
                                   'external/dataTables.checkboxes'
                                  ));
      $this->view->addJSSet(array('external/datatables',
                                  'external/dataTables.checkboxes',
                                  'external/validator',
                                  'delete-confirm',
                                  'load-modal',
                                  'zawodnik',

                                  'external/jquery.validate',

                                  'external/jquery.cookie',
                                  'external/jquery-ui'
                                  ));
      $model = $this->createModel('Klub');
      $result['clubs'] = $model->transferToSelectable($model->selectAll('klub'),['Nazwa'],' ');
      return $result;
    }
    public function showStatistics($id){
      $this->view->setTemplate('Zawodnik/showStatistics');
      $this->view->addCSSSet(array());
      $this->view->addJSSet(array('external/bootstrap'));
      $model = $this->createModel('Zawodnik');
      $result['data'] = $model->wyswietlStatystyki($id);
      return $result;
    }
    public function ajaxAddForm() {
      $this->view->setTemplate('ajaxModals/addZawodnik');
      $model = $this->createModel('Klub');
      $result['clubs'] = $model->transferToSelectable($model->selectAll('klub'), ['Nazwa'], ' ');
      return $result;
    }
    public function ajaxEditForm($id) {
      $this->view->setTemplate('ajaxModals/editZawodnik');
      $model = $this->createModel('Zawodnik');
      $result['data'] = $model->selecteOneById($id);
      $model = $this->createModel('Klub');
      $result['clubs'] = $model->transferToSelectable($model->selectAll('klub'), ['Nazwa'], ' ');
      return $result;
    }
    public function updOne($id) {
      $this->view->setTemplate('Zawodnik/addUpd');
      $this->view->addCSSSet(array());
      $this->view->addJSSet(array());
      $model = $this->createModel('Zawodnik');
      $result['data'] = $model->selecteOneById($id);
      $model = $this->createModel('Klub');
      $result['clubs'] = $model->transferToSelectable($model->selectAll('klub'),['Nazwa'],' ');
      return $result;
    }
    public function insert() {
      $this->check(['imie', 'nazwisko', 'idk', 'opis'], $_POST);
      $model = $this->createModel('Zawodnik');
      $result = $model->insert($_POST['imie'],$_POST['nazwisko'],$_POST['idk'],$_POST['opis']);
      FlashMessage::addMessage($result, 'add');
      $this->redirect('zawodnik/');
    }
    public function update() {
      $this->check(['id', 'imie', 'nazwisko', 'idk', 'opis'], $_POST);
      $model = $this->createModel('Zawodnik');
      $result = $model->update($_POST['id'],$_POST['imie'],$_POST['nazwisko'],$_POST['idk'],$_POST['opis']);
      FlashMessage::addMessage($result, 'update');
      $this->redirect('zawodnik/');
    }
}
