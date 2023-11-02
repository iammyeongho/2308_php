<?php
	namespace controller;

	class Boardcontroller extends ParentsController {
		protected function listGet() {
			return "view/list.php";
		}
	}