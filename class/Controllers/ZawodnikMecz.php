<?php
namespace Controllers;
use \Tools\FlashMessage;


class ZawodnikMecz extends GlobalController {
    public function showAll() {
      $this->view->setTemplate('ZawodnikMecz/showAll');
      $this->view->addCSSSet(array('external/datatables',
                                   'external/dataTables.checkboxes'
                                  ));
      $this->view->addJSSet(array('external/datatables',
                                  'external/dataTables.checkboxes',
                                  'external/bootstrap',
                                  'external/validator',
                                  'delete-confirm',
                                  'load-modal',
                                  'zawodnikmecz',

                                  'external/jquery.validate',

                                  'external/jquery.cookie',
                                  'external/jquery-ui'
                                  ));
      $model = $this->createModel('ZawodnikMecz');
      $result['data'] = $model->selectAll();
      $model = $this->createModel('Zawodnik');
      $result['players'] = $model->transferByColumn($model->selectAll('zawodnik'));
      $model = $this->createModel('Mecz');
      $result['matches'] = $model->transferByColumn($model->selectAll('mecz'));
      $model = $this->createModel('Klub');
      $result['clubs'] = $model->transferByColumn($model->selectAll('klub'));
      return $result;
    }
    public function showOne($id) {
      $this->view->setTemplate('ZawodnikMecz/showOne');
      $this->view->addCSSSet(array('external/datatables',
                                   'external/dataTables.checkboxes'
                                  ));
      $this->view->addJSSet(array('external/datatables',
                                  'external/dataTables.checkboxes',
                                  'external/bootstrap',
                                  'external/validator',
                                  'delete-confirm',
                                  'load-modal',
                                  'zawodnikmecz',

                                  'external/jquery.validate',

                                  'external/jquery.cookie',
                                  'external/jquery-ui'
                                  ));
      $model = $this->createModel('ZawodnikMecz');
      $result['data'] = $model->selecteOneById($id);
      $model = $this->createModel('Zawodnik');
      $result['players'] = $model->transferByColumn($model->selectAll('zawodnik'));
      $model = $this->createModel('Mecz');
      $result['matches'] = $model->transferByColumn($model->selectAll('mecz'));
      $model = $this->createModel('Klub');
      $result['clubs'] = $model->transferByColumn($model->selectAll('klub'));
      return $result;
    }
    public function delete($id) {
      $counter = $this->deleteOne($id);
      FlashMessage::addMessage($counter, 'delete');
      $this->redirect('zawodnikmecz/');
    }
    public function form() {
      $this->view->setTemplate('ZawodnikMecz/addForm');
      $this->view->addCSSSet(array('external/datatables',
                                   'external/dataTables.checkboxes'
                                  ));
      $this->view->addJSSet(array('external/datatables',
                                  'external/dataTables.checkboxes',
                                  'external/validator',
                                  'delete-confirm',
                                  'load-modal',
                                  'zawodnikmecz',

                                  'external/jquery.validate',

                                  'external/jquery.cookie',
                                  'external/jquery-ui'
                                  ));
      $model = $this->createModel('Zawodnik');
      $result['players'] = $model->transferToSelectable($model->selectAll('zawodnik'),['Imie','Nazwisko'],' ');
      $model = $this->createModel('Klub');
      $result['clubs'] = $model->transferToSelectable($model->selectAll('klub'),['Nazwa'],' ');
      $model = $this->createModel('Mecz');
      $result['matches'] = $model->transferToSelectable($model->selectAll('meczekluby'),['Data','KlubGospodarze','KlubGoscie'], ' - ');
      return $result;
    }
    public function ajaxAddForm() {
      $this->view->setTemplate('ajaxModals/addZawodnikMecz');
      $model = $this->createModel('Zawodnik');
      $result['players'] = $model->transferToSelectable($model->selectAll('zawodnik'),['Imie','Nazwisko'],' ');
      $model = $this->createModel('Klub');
      $result['clubs'] = $model->transferToSelectable($model->selectAll('klub'),['Nazwa'],' ');
      $model = $this->createModel('Mecz');
      $result['matches'] = $model->transferToSelectable($model->selectAll('meczekluby'),['Data','KlubGospodarze','KlubGoscie'], ' - ');
      return $result;
    }
    public function ajaxEditForm($id) {
      $this->view->setTemplate('ajaxModals/editZawodnikMecz');
      $model = $this->createModel('ZawodnikMecz');
      $result['data'] = $model->selecteOneById($id);
      $model = $this->createModel('Zawodnik');
      $result['players'] = $model->transferToSelectable($model->selectAll('zawodnik'),['Imie','Nazwisko'],' ');
      $model = $this->createModel('Klub');
      $result['clubs'] = $model->transferToSelectable($model->selectAll('klub'),['Nazwa'],' ');
      $model = $this->createModel('Mecz');
      $result['matches'] = $model->transferToSelectable($model->selectAll('meczekluby'),['Data','KlubGospodarze','KlubGoscie'], ' - ');
      return $result;
    }
    public function insert() {
      $this->check(['idm', 'idz', 'pozycja', 'minutyod', 'minutydo', 'bramki', 'asysty', 'kartkizolte', 'kartkiczerwone', 'podaniaudane', 'podanianieudane'], $_POST);
      $model = $this->createModel('ZawodnikMecz');
      $counter = $model->insert($_POST['idm'], $_POST['idz'], $_POST['pozycja'], $_POST['minutyod'], $_POST['minutydo'], $_POST['bramki'], $_POST['asysty'], $_POST['kartkizolte'], $_POST['kartkiczerwone'], $_POST['podaniaudane'], $_POST['podanianieudane']);
      FlashMessage::addMessage($counter, 'add');
      $this->redirect('zawodnikmecz/');
    }
    public function update() {
      $this->check(['id', 'idm', 'idz', 'pozycja', 'minutyod', 'minutydo', 'bramki', 'asysty', 'kartkizolte', 'kartkiczerwone', 'podaniaudane', 'podanianieudane'], $_POST);
      $model = $this->createModel('ZawodnikMecz');
      $result = $model->update($_POST['id'],$_POST['idm'], $_POST['idz'], $_POST['pozycja'], $_POST['minutyod'], $_POST['minutydo'], $_POST['bramki'], $_POST['asysty'], $_POST['kartkizolte'], $_POST['kartkiczerwone'], $_POST['podaniaudane'], $_POST['podanianieudane']);
      FlashMessage::addMessage($result, 'update');
      $this->redirect('zawodnikmecz/');
    }
}
