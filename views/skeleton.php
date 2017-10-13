<?php
require_once(HEADER);
require_once(ROOT . '/lib/get_data.php');
require_once('partials/base_calc.php');
?>


<!-- ###### DEBUG SECTION ##### -->

<div style='color:white;width:80%; margin:0 auto; background:#333'>
<h3 style='text-align:center;color:white;'> DEBUG SECTION </h3>
<?php
echo "<pre style='color:white;padding:5px;'>";
print_r($data_array);
echo "</pre>";

?>
</div>



