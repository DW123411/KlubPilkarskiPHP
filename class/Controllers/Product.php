<?php
namespace Controllers;


class Product extends GlobalController {
    public function showAll() {
      $this->view->setTemplate('Product/showAll');
      $this->view->addCSSSet(array());
      $this->view->addJSSet(array());
      $model = $this->createModel('Product');
      $result['data'] = $model->selectAll();
      $model = $this->createModel('Category');
      $result['categories'] = $model->transferByColumn($model->selectAll('kategorie'));
      return $result;
    }
    public function showCat($category) {
      $this->view->setTemplate('Product/showAllInCategory');
      $this->view->addCSSSet(array());
      $this->view->addJSSet(array());
      $model = $this->createModel('Product');
      $result['data'] = $model->selectAllInCategory($category);
      $result['selectedCategory'] = $category;
      $model = $this->createModel('Category');
      $result['categories'] = $model->transferByColumn($model->selectAll('kategorie'));
      return $result;
    }
    public function showOne($id) {
      $this->view->setTemplate('Product/showOne');
      $this->view->addCSSSet(array());
      $this->view->addJSSet(array());
      $model = $this->createModel('Product');
      $result['data'] = $model->selecteOneById($id);
      $model = $this->createModel('Category');
      $result['categories'] = $model->transferByColumn($model->selectAll('kategorie'));
      return $result;
    }
    public function delete($id) {
      $this->deleteOne($id);
      $this->redirect('produkt/');
    }
    public function form() {
      $this->view->setTemplate('Product/addForm');
      $this->view->addCSSSet(array());
      $this->view->addJSSet(array());
      $model = $this->createModel('Category');
      $result['categories'] = $model->transferByColumn($model->selectAll('kategorie'));
      return $result;
    }
    public function insert() {
      $this->check(['nazwa', 'opis', 'cena', 'id_kategorii'], $_POST);
      $model = $this->createModel('Product');
      $model->insert($_POST['nazwa'], $_POST['opis'], $_POST['cena'], $_POST['id_kategorii']);
      $this->redirect('produkt/');
    }
}
