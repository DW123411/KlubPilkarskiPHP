<?php
namespace Controllers;
use \Tools\FlashMessage;


class Mecz extends GlobalController {
    public function showAll() {
      $this->view->setTemplate('Mecz/showAll');
      $this->view->addCSSSet(array('external/datatables',
                                   'external/dataTables.checkboxes'
                                  ));
      $this->view->addJSSet(array('external/datatables',
                                  'external/dataTables.checkboxes',
                                  'external/bootstrap',
                                  'external/validator',
                                  'delete-confirm',
                                  'load-modal',
                                  'mecz',

                                  'external/jquery.validate',

                                  'external/jquery.cookie',
                                  'external/jquery-ui'
                                  ));
      $model = $this->createModel('Mecz');
      $result['data'] = $model->selectAll();
      $model = $this->createModel('Klub');
      $result['clubs'] = $model->transferByColumn($model->selectAll('klub'));
      return $result;
    }
    public function showCat($category) {
      $this->view->setTemplate('Mecz/showAllInCategory');
      $this->view->addCSSSet(array('external/datatables',
                                   'external/dataTables.checkboxes'
                                  ));
      $this->view->addJSSet(array('external/datatables',
                                  'external/dataTables.checkboxes',
                                  'external/bootstrap',
                                  'external/validator',
                                  'delete-confirm',
                                  'load-modal',
                                  'mecz',

                                  'external/jquery.validate',

                                  'external/jquery.cookie',
                                  'external/jquery-ui'
                                  ));
      $model = $this->createModel('Mecz');
      $result['data'] = $model->selectAllInCategory($category);
      $result['selectedSeason'] = $category;
      $model = $this->createModel('Sezon');
      $result['seasons'] = $model->transferByColumn($model->selectAll('sezon'));
      $model = $this->createModel('Klub');
      $result['clubs'] = $model->transferByColumn($model->selectAll('klub'));
      return $result;
    }
    public function showLeagueTable($category){
      $this->view->setTemplate('Mecz/showLeagueTable');
      $this->view->addCSSSet(array('external/datatables',
                                   'external/dataTables.checkboxes'
                                  ));
      $this->view->addJSSet(array('external/datatables',
                                  'external/dataTables.checkboxes',
                                  'external/bootstrap',
                                  'external/validator',
                                  'delete-confirm',
                                  'load-modal',

                                  'external/jquery.validate',

                                  'external/jquery.cookie',
                                  'external/jquery-ui'
                                  ));
      $model = $this->createModel('Mecz');
      $result['data'] = $model->wyswietlTabeleLigowa($category);
      $model = $this->createModel('Sezon');
      $result['seasons'] = $model->transferByColumn($model->selectAll('sezon'));
      $result['selectedSeason'] = $category;
      return $result;
    }
    public function showOne($id) {
      $this->view->setTemplate('Mecz/showOne');
      $this->view->addCSSSet(array('external/datatables',
                                   'external/dataTables.checkboxes'
                                  ));
      $this->view->addJSSet(array('external/datatables',
                                  'external/dataTables.checkboxes',
                                  'external/validator',
                                  'delete-confirm',
                                  'load-modal',
                                  'mecz',

                                  'external/jquery.validate',

                                  'external/jquery.cookie',
                                  'external/jquery-ui'
                                  ));
      $model = $this->createModel('Mecz');
      $result['data'] = $model->selecteOneById($id);
      $model = $this->createModel('Sezon');
      $result['seasons'] = $model->transferByColumn($model->selectAll('sezon'));
      $model = $this->createModel('Stadion');
      $result['stadiums'] = $model->transferByColumn($model->selectAll('stadion'));
      $model = $this->createModel('Sedzia');
      $result['referees'] = $model->transferByColumn($model->selectAll('sedzia'));
      $model = $this->createModel('Klub');
      $result['clubs'] = $model->transferByColumn($model->selectAll('klub'));
      return $result;
    }
    public function delete($id) {
      $counter = $this->deleteOne($id);
      FlashMessage::addMessage($counter, 'delete');
      $this->redirect('mecz/');
    }
    public function form() {
      $this->view->setTemplate('Mecz/addForm');
      $this->view->addCSSSet(array('external/datatables',
                                   'external/dataTables.checkboxes'
                                  ));
      $this->view->addJSSet(array('external/datatables',
                                  'external/dataTables.checkboxes',
                                  'external/validator',
                                  'delete-confirm',
                                  'load-modal',
                                  'mecz',

                                  'external/jquery.validate',

                                  'external/jquery.cookie',
                                  'external/jquery-ui'
                                  ));
      $model = $this->createModel('Sezon');
      $result['seasons'] = $model->transferToSelectable($model->selectAll('sezon'),['RokOd','RokDo'],'/');
      $model = $this->createModel('Stadion');
      $result['stadiums'] = $model->transferToSelectable($model->selectAll('stadion'),['Miejscowosc','Nazwa'],' - ');
      $model = $this->createModel('Sedzia');
      $result['referees'] = $model->transferToSelectable($model->selectAll('sedzia'),['Imie','Nazwisko'],' ');
      $model = $this->createModel('Klub');
      $result['clubs'] = $model->transferToSelectable($model->selectAll('klub'),['Nazwa'],' ');
      return $result;
    }
    public function ajaxAddForm() {
      $this->view->setTemplate('ajaxModals/addMecz');
      $model = $this->createModel('Sezon');
      $result['seasons'] = $model->transferToSelectable($model->selectAll('sezon'),['RokOd','RokDo'],'/');
      $model = $this->createModel('Stadion');
      $result['stadiums'] = $model->transferToSelectable($model->selectAll('stadion'),['Miejscowosc','Nazwa'],' - ');
      $model = $this->createModel('Sedzia');
      $result['referees'] = $model->transferToSelectable($model->selectAll('sedzia'),['Imie','Nazwisko'],' ');
      $model = $this->createModel('Klub');
      $result['clubs'] = $model->transferToSelectable($model->selectAll('klub'),['Nazwa'],' ');
      return $result;
    }
    public function ajaxEditForm($id) {
      $this->view->setTemplate('ajaxModals/editMecz');
      $model = $this->createModel('Mecz');
      $result['data'] = $model->selecteOneById($id);
      $model = $this->createModel('Sezon');
      $result['seasons'] = $model->transferToSelectable($model->selectAll('sezon'),['RokOd','RokDo'],'/');
      $model = $this->createModel('Stadion');
      $result['stadiums'] = $model->transferToSelectable($model->selectAll('stadion'),['Miejscowosc','Nazwa'],' - ');
      $model = $this->createModel('Sedzia');
      $result['referees'] = $model->transferToSelectable($model->selectAll('sedzia'),['Imie','Nazwisko'],' ');
      $model = $this->createModel('Klub');
      $result['clubs'] = $model->transferToSelectable($model->selectAll('klub'),['Nazwa'],' ');
      return $result;
    }
    public function insert() {
      $this->check(['ids', 'data', 'idstadion', 'idklubgospodarze', 'idklubgoscie', 'bramkigospodarze', 'bramkigoscie', 'punktygospodarze', 'punktygoscie', 'opis', 'idsedzia', 'kibice'], $_POST);
      $model = $this->createModel('Mecz');
      $counter = $model->insert($_POST['ids'], $_POST['data'], $_POST['idstadion'], $_POST['idklubgospodarze'], $_POST['idklubgoscie'], $_POST['bramkigospodarze'], $_POST['bramkigoscie'], $_POST['punktygospodarze'], $_POST['punktygoscie'], $_POST['opis'], $_POST['idsedzia'], $_POST['kibice']);
      FlashMessage::addMessage($counter, 'add');
      $this->redirect('mecz/');
    }
    public function update() {
      $this->check(['id', 'ids', 'data', 'idstadion', 'idklubgospodarze', 'idklubgoscie', 'bramkigospodarze', 'bramkigoscie', 'punktygospodarze', 'punktygoscie', 'opis', 'idsedzia', 'kibice'], $_POST);
      $model = $this->createModel('Mecz');
      $result = $model->update($_POST['id'],$_POST['ids'], $_POST['data'], $_POST['idstadion'], $_POST['idklubgospodarze'], $_POST['idklubgoscie'], $_POST['bramkigospodarze'], $_POST['bramkigoscie'], $_POST['punktygospodarze'], $_POST['punktygoscie'], $_POST['opis'], $_POST['idsedzia'], $_POST['kibice']);
      FlashMessage::addMessage($result, 'update');
      $this->redirect('mecz/');
    }
}
