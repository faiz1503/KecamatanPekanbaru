<?php
function cmb_dinamis($name, $table, $field, $pk, $selected = null, $extra = null) {
	$ci = & get_instance();
	$cmb = "<select name='$name' id='$name' class='selectpicker form-control' $extra data-live-search='true'>";
	$cmb .="<option value='0' >--Pilih--</option>";
	$data = $ci->db->get($table)->result();
	foreach ($data as $row) {
		$cmb .="<option value='" . $row->$pk . "' data-tokens='" . $row->$field . "'";
		$cmb .= $selected == $row->$pk ? 'selected' : '';
		$cmb .=">" . $row->$field . "</option>";
	}
	$cmb .= "</select>";
	return $cmb;
}
?>