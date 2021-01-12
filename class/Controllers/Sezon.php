<?php
namespace Controllers;
use \Tools\FlashMessage;


class Sezon extends GlobalController {
    public function showAll() {
      $this->view->setTemplate('Sezon/showAll');
      $this->view->addCSSSet(array('external/datatables',
                                   'external/dataTables.checkboxes'
                                  ));
      $this->view->addJSSet(array('external/datatables',
                                  'external/dataTables.checkboxes',
                                  'external/bootstrap',
                                  'external/validator',
                                  'delete-confirm',
                                  'load-modal',
                                  'sezon',

                                  'external/jquery.validate',

                                  'external/jquery.cookie',
                                  'external/jquery-ui'
                                  ));
      $model = $this->createModel('Sezon');
      $result['data'] = $model->selectAll();
      return $result;
    }
    function delete($id) {
      $counter = $this->deleteOne($id);
      FlashMessage::addMessage($counter, 'delete');
      $this->redirect('sezon/');
    }
    public function form() {
      $this->view->setTemplate('Sezon/addForm');
      $this->view->addCSSSet(array('external/datatables',
                                   'external/dataTables.checkboxes'
                                  ));
      $this->view->addJSSet(array('external/datatables',
                                  'external/dataTables.checkboxes',
                                  'external/bootstrap',
                                  'external/validator',
                                  'delete-confirm',
                                  'load-modal',
                                  'sezon',

                                  'external/jquery.validate',

                                  'external/jquery.cookie',
                                  'external/jquery-ui'
                                  ));
    }
    public function ajaxAddForm() {
      $this->view->setTemplate('ajaxModals/addSezon');
      $this->view->addJSSet(array('sezon'));
    }
    public function ajaxEditForm($id) {
      $this->view->setTemplate('ajaxModals/editSezon');
      $model = $this->createModel('Sezon');
      $result['data'] = $model->selecteOneById($id);
      return $result;
    }
    public function insert() {
      $this->check(['rokod'], $_POST);
      $this->check(['rokdo'], $_POST);
      $model = $this->createModel('Sezon');
      $result = $model->insert($_POST['rokod'],$_POST['rokdo']);
      FlashMessage::addMessage($result, 'add');
      $this->redirect('sezon/');
    }
    public function update() {
      $this->check(['id', 'rokod', 'rokdo'], $_POST);
      $model = $this->createModel('Sezon');
      $result = $model->update($_POST['id'],$_POST['rokod'],$_POST['rokdo']);
      FlashMessage::addMessage($result, 'update');
      $this->redirect('sezon/');
    }
}
