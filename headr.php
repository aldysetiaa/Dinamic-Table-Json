<?php
$head = array(array('label' => 'A. Gaji Pokok', 'id' => 'A', 'rowspan' => 1, 'colspan' => 3, 'have_child' => 1, 'status' => 'info', 'children' => array(array('label' => 'Gaji Bulanan', 'id' => 'gb', 'status' => 'info'), array('label' => 'Prorate (Hari)', 'id' => 'prorate', 'status' => 'info'),  array('label' => 'Gaji Bulanan', 'id' => 'gb', 'status' => 'info'))),array('label' => 'Overtime/Jam', 'id' => 'OTJ', 'rowspan' => 2, 'colspan' => 1,  'have_child' => 0, 'status' => 'info', 'children' => array()),array('label' => 'A. Gaji Pokok', 'id' => 'bb', 'rowspan' => 1, 'colspan' => 3, 'have_child' => 1,  'status' => 'info', 'children' => array(array('label' => 'Gaji Bulanan', 'id' => 'cc', 'status' => 'info'), array('label' => 'Prorate (Hari)', 'id' => 'dd', 'status' => 'info'),  array('label' => 'Gaji Bulanan', 'id' => 'ee', 'status' => 'info'))),array('label' => 'A. Gaji Pokok', 'id' => 'A', 'rowspan' => 1, 'colspan' => 3, 'have_child' => 1, 'status' => 'info', 'children' => array(array('label' => 'Gaji Bulanan', 'id' => 'gb', 'status' => 'info'), array('label' => 'Prorate (Hari)', 'id' => 'prorate', 'status' => 'info'),  array('label' => 'Gaji Bulanan', 'id' => 'gb', 'status' => 'info'))),array('label' => 'Overtime/Jam', 'id' => 'OTJ', 'rowspan' => 2, 'colspan' => 1,  'have_child' => 0, 'status' => 'info', 'children' => array()),array('label' => 'A. Gaji Pokok', 'id' => 'bb', 'rowspan' => 1, 'colspan' => 3, 'have_child' => 1,  'status' => 'info', 'children' => array(array('label' => 'Gaji Bulanan', 'id' => 'cc', 'status' => 'info'), array('label' => 'Prorate (Hari)', 'id' => 'dd', 'status' => 'info'),  array('label' => 'Gaji Bulanan', 'id' => 'ee', 'status' => 'data'))), array('label' => 'Total', 'id' => 'total', 'rowspan' => 2, 'colspan' => 1, 'have_child' => 0,  'status' => 'total', 'children' => array()));


// echo count($head);

echo "<h2>Data Raw</h2>";
echo json_encode($head);


echo "<h2>Data Parsing</h2>";

echo "<pre>";
print_r($head);
echo "</pre>";


// echo json_encode($head);

// print_r($tdval);
// echo "<pre>";
// echo "</pre>";
echo "<table border=1>
		<tr>
			<th>No</th>
			<th>label</th>
			<th>ID</th>
			<th>RowSpan</th>
			<th>ColSpan</th>
			<th>Child</th>
			<th>Status</th>
			<th>Children</th>
			</tr>
			<tr>
		";
for ($i=0; $i < count($head); $i++) { 
	echo "<tr>
			<td>".($i+1)."</td>
			<td>".$head[$i]['label']."</td>
			<td>".$head[$i]['id']."</td>
			<td>".$head[$i]['rowspan']."</td>
			<td>".$head[$i]['colspan']."</td>
			<td>".$head[$i]['have_child']."</td>
			<td>".$head[$i]['status']."</td>
			<td>";
			for ($x=0; $x < count($head[$i]['children']); $x++) { 
				echo "- ".$head[$i]['children'][$x]['label'].' ('.$head[$i]['children'][$x]['id'].','.$head[$i]['children'][$x]['status'].')'.'<br>';
			}
			echo "</td>";
	echo "</tr>";
} 
    echo "</table>";


echo "
<table border='1'>
	<tr>"; 
$tdval = array();
$tdstatus = array();
for ($i=0; $i < count($head); $i++) { 
	echo "<th colspan='".$head[$i]['colspan']."'  rowspan='".$head[$i]['rowspan']."'>".$head[$i]['label']."</th>";
} 
echo"</tr><tr>";
for ($i=0; $i < count($head); $i++) {
 	$jm = count($head[$i]['children']);
 	if($jm > 0){ 
 		for ($x=0; $x < $jm; $x++) {  
	 		echo "<th >".$head[$i]['children'][$x]['label']."</th>";
			$tdval[] = $head[$i]['children'][$x]['id'];		 
			$tdstatus[] = $head[$i]['children'][$x]['status'];		 
		} 
	}else{
			$tdval[] = $head[$i]['id'];		 
			$tdstatus[] = $head[$i]['status'];		 
	}
}
echo"</tr><tr>"; 
for ($i=0; $i < count($tdval); $i++) {   
		echo "<td><input type='text' value='".$tdval[$i]."-".$tdstatus[$i]."'></td>"; 
}
echo"</tr>"; 
echo"</table>"; 