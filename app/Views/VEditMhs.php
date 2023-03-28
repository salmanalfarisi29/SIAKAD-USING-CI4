<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Mahasiswa</title>
</head>
<body>
	<!-- define edit -->
	<?php
	    foreach($tampil as $row):
	?>

		<form action="/mahasiswa/update" method="post">		
			<table>
				<tr>
					<td>nama</td>
					<td><input type="text" name="nama" value="<?= $row->nama;?>"></td>					
				</tr>	
				<tr>
					<td>nim</td>
					<td><input type="text" name="nim" readonly  value="<?= $row->nim;?>"></td>					
				</tr>	
				<tr>
					<td>umur</td>
					<td><input type="number" name="umur" value="<?= $row->umur;?>"></td>					
				</tr>	
				<tr>
					<td></td>
					<td><input type="submit" value="update"></td>					
				</tr>				
			</table>
		</form>

	<?php endforeach;?>

</body>
</html>