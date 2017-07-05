<?php
require_once("../httpResources.php");
require_once("../model/M_evaluation.php");

class EvaluationResource extends HttpResource {
	  protected $user;
    function init() {
		$user = array("id" => 1, "email" => "subhash@epita.fr");
	  }

	  function do_get() {
		// Get data from the model
		$data = array();
		$data['eval'] = EvaluationModel::get(1);
		// Checks something (the user has rights)

		// Send to the view
		require_once("../view/V_evaluation.php");
	}
}
EvaluationResource::run();
