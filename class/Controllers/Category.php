<?php
namespace Controllers;


class Category extends GlobalController {
    public function showAll() {
      $this->view->setTemplate('Category/showAll');
      $this->view->addCSSSet(array());
      $this->view->addJSSet(array());
      $model = $this->createModel('Category');
      $result['data'] = $model->selectAll();
      /*
        CREATE VIEW `ilosc_produktow` AS
        SELECT `id_kategorii`, count(id) AS `ilosc` FROM produkty GROUP BY `id_kategorii`
      */
      $result['amount'] = $model->transferToSelectable($model->selectAll('ilosc_produktow'), ['ilosc'], '', 'id_kategorii');
      return $result;
    }
    public function delete($id) {
      $this->deleteOne($id);
      $this->redirect('kategoria/');
    }
    public function form() {
      $this->view->setTemplate('Category/addForm');
      $this->view->addCSSSet(array());
      $this->view->addJSSet(array());
    }
    public function insert() {
      $this->check(['nazwa'], $_POST);
      $model = $this->createModel('Category');
      $result = $model->insert($_POST['nazwa']);
      $this->redirect('kategoria/');
    }
}
