<?php
echo 'something<br>';
echo '<br>';
$length = count($_POST['course']);


for ($i = 0; $i < $length; $i++) {
	foreach ($_POST as $key => $value) {
		if (gettype($value) == 'array') {
			echo $key . ': ' . $value[$i] . ' :: ';
		}
	}
	echo '<br>';
}
?>