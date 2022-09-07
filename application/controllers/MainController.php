<?php

namespace application\controllers;

use application\core\Controller;
use application\models\Admin;

class MainController extends Controller {

	public function exitAction() {
		$_SESSION['logins'] = null;
		$_SESSION['accountID'] = null;
		$this->view->redirect('');
	}

	public function loginAction() {
		if (isset($_SESSION['logins'])) $this->view->redirect("cabinet");

		if (!empty($_POST)) {
			$array = $this->model->loginPlayer($_POST);
			if (!$array[0]) {
				$this->view->message('Помилка', $array[1]);
			}
			$this->view->location("cabinet");
		}
		$this->view->render(0, "Логін", "Логін", [], $this->model);
	}

	public function registerAction() {
		if (isset($_SESSION['logins'])) $this->view->redirect("cabinet");
		if (!empty($_POST)) {
			$array = $this->model->registerPlayer($_POST);
			if (!$array[0]) {
				$this->view->message('Помилка', $array[1]);
			}
			$this->view->location("cabinet");
		}
		$this->view->render(0, "Реєстрація", "Реєстрація", [], $this->model);
	}

	public function cabinetAction() {
		$title = "Список компаній";
		$vars = [];
		if (isset($this->route['id'])) {
			$id = $this->route['id'];
			$row = $this->model->getCompany($id);
			$title = "Звіт компанії ".$row[1]["company"];
			$vars = [
				'infoComp' => $row[1],
			];
		} else {
			$row = $this->model->getAllCompany();
			$vars = [
				'infoComp2' => $row[1],
			];
		}
		$this->view->render(0, $title, $title, $vars, $this->model);
	}

	public function createpostAction() {
		$testName = "noobtest";
		$id = null;
		if (isset($this->route['id'])) {
			$id = $this->route['id'];
			if ($id == 2) $testName = "profitest"; 
		}
		if (!empty($_POST)) {
			$array = $this->model->parserAudit($_POST, $testName);
			if (!$array[0]) {
				$this->view->message('Помилка', $array[1]);
			}
			$this->view->location("cabinet/".$array[1]);
		}
		$this->view->render(0, "Аудит підприємства", "Аудит підприємства", ['idTest' => $id, 'namefile' => $testName], $this->model);
	}

}