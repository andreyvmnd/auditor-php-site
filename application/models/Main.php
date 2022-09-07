<?php
namespace application\models;

use application\core\Model;

class Main extends Model {

	public $error;

	public function registerPlayer($post) {
		$params = [
			'id' => '',
			'login' => $post['login'],
			'password' => md5($post["password"]),
			'date' => date('Y-m-d'),
		];
		if ($params["password"] != md5($post['password2'])) return array(false, "Паролі не співпадають");
		if ($this->db->column('SELECT id FROM accounts WHERE login = :login', [ 'login' => $params["login"] ]) >= 1) return array(false, "Даний логін вже зареєстровано в системі");

		$this->db->query('INSERT INTO accounts VALUES (:id, :login, :password, :date)', $params);
		$_SESSION['logins'] = true;
		$_SESSION['accountID'] = $this->db->lastInsertId();

		return array(true, "true");
	}

	public function loginPlayer($post) {
		$params = [
			'login' => $post['login'],
			'password' => md5($post["password"]),
		];

		$row = $this->db->row('SELECT * FROM accounts WHERE (login = :login and password = :password)', $params);
		//$row = $this->db->column('SELECT * FROM accounts WHERE (login = :login and password = :password)', $params);
		if (!$row) return array(false, "Неправильний логін або пароль");
		$_SESSION['logins'] = true;
		$_SESSION['accountID'] = $row[0]["id"];

		return array(true, $row);
	}

	public function getCompany($id) {
		$params = [
			'id' => $id,
		];

		$row = $this->db->row('SELECT * FROM audits WHERE id = :id', $params);
		if (!$row) return array(false, "Опитування №$post[id] не існує");

		$table = $row[0];
		$rowL = $this->db->row('SELECT * FROM accounts WHERE id = :id', ['id' => $row[0]['login']]);
		$table["loginname"] = $rowL[0]["login"];

		return array(true, $table);
	}

	public function getAllCompany() {
		$row = $this->db->row('SELECT * FROM audits',[]);
		if (!$row) return array(false, "Жодного опитування не знайдено");

		$table = $row;
		foreach ($table as $ID => $VALUE) {
			$rowL = $this->db->row('SELECT * FROM accounts WHERE id = :id', ['id' => $VALUE['login']]);
			$table[$ID]["loginname"] = $rowL[0]["login"];
		}

		return array(true, $table);
	}

	public function parserAudit($post,$namefile) {
		$quest = require 'application/config/tests/'.$namefile.'.php';

		$arr = [];

		foreach ($quest as $blockID => $blockARRAY) {
			if (!array_key_exists($blockID,$arr)) $arr[$blockID] = [];

			foreach ($blockARRAY["quest"] as $voteID => $voteARRAY) {
				array_push($arr[$blockID], $post[$blockID."_".$voteID]);
			}

			$arr[$blockID] = ['name' => $blockARRAY["gname"], 'average' => $arr[$blockID]];//(array_sum($arr[$blockID]) / sizeof($arr[$blockID]))];
		}

		$params = [
			'id' => '',
			'company' => $post['company'],
			'login' => $_SESSION['accountID'],
			'date' => date('Y-m-d'),
			'results' => json_encode($arr),
		];

		$this->db->query('INSERT INTO audits VALUES (:id, :company, :date, :login, :results)', $params);

		return array(true, $this->db->lastInsertId());
	}

}