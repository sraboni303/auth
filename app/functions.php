<?php


/**
 * Validation Error Function:
 */
	function val_error($msg, $type='danger'){

		return '<p class="alert alert-'. $type .'">' . $msg .' ! <button class="close" data-dismiss="alert"> &times; </button></p>';
	}


/**
 *  Insert Data:
 */
function insert($dtin) {

	global $connection;
	$connection -> query($dtin);
}




/**
*  Value Check:
 */
function val_check($table, $column, $val){

	global $connection;

	$sql = "SELECT $column FROM $table WHERE $column='$val' ";
	$data = $connection -> query($sql);
	return $data -> num_rows;

}







?>