<?php

class massupload extends dbObject{

 private $_class_name;

 public function setProperty($property, $value) {
	if (property_exists($this, $property)) {
	 switch ($property) {
		case '_class_name':
		 $this->$property = $value;

		default:
		 $this->$property = $value;
		 break;
	 }
	}
 }

 private static function valdiate_data_array($data_array, $class_name) {
	$invalid_columns = null;
	foreach ($data_array[0] as $key => $value) {
	 if (!property_exists($class_name, $value)) {
		$invalid_columns .= $value . ', ';
	 }
	}
	if (!empty($invalid_columns)) {
	 $error = " Data column is incorrect. Below columns in input file is/are invalid <br>";
	 $error .= $invalid_columns;
	 throw new Exception($error);
	} else {
	 return true;
	}
 }

 public function mass_upload($data_array) {
	$class = $this->_class_name;
	try {
	 massupload::valdiate_data_array($data_array, $class);
	} catch (Exception $e) {
	 echo 'Message: ' . $e->getMessage();
	}

	try {
	 $columns = array_shift($data_array);
	 $count = 0;
	 foreach ($data_array as $records) {
		$$class = new $class;
		foreach ($columns as $key => $field_name) {
		 $$class->$field_name = $records[$key];
		}
		
    $$class->audit_trial();
		$$class->save();
		echo $$class->{$class::$primary_column};
		$count++;
	 }
   	 echo "<div class='message'> $count Record(s) is/are sucessfully imported </div>";
	 return true;
	} catch (Exception $e) {
	 echo 'Error Message: ' . $e->getMessage();
	}
 }

}

//end of forma class
?>