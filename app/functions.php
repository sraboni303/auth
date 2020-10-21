<?php

/**
 * Validation Error Function:
 */
	function val_error($msg, $type='danger'){

		return '<p class="alert alert-'. $type .'">' . $msg .' ! <button class="close" data-dismiss="alert"> &times; </button></p>';
	}
?>