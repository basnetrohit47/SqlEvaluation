<?php
require_once("../httpResources.php");
require_once("../model/M_test.php");

class TestResource extends HttpResource {
	protected $user;
	protected $evaluationId;

	function init() {
		$this->user = array("id" => 1, "email" => "ssssubhash@epita.fr");
		$this->evaluationId = 1;
	}

	function do_get() {
		// Get data from the model
		$data = array();
		//die($this->user['id'].' '. $this->evaluationId);
		if (1 == TestModel::insert($this->user['id'], $this->evaluationId)) {
      require_once("../view/V_test.html");
		}
		else {
		  require_once("../view/notFound.php");
		}

	}
}
TestResource::run();
