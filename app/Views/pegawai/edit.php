<tr align="center">
            <td colspan="5">

				<?php
					foreach($getPegawai as $row):
				?>

					<form action="/pegawai/update" method="post">		
						<table>
							<input type="hidden" name="id" value="<?= $row->id;?>">
							<tr>
				                <td>Nip</td>
				                <td><input type="number" name="nip" value="<?= $row->nip; ?>"></td>                 
				            </tr>   
				            <tr>
				                <td>Nama</td>
				                <td><input type="text" name="nama" value="<?= $row->nama; ?>"></td>                    
				            </tr>   
				            <tr>
				                <td>Gender</td>
				                <td><input type="text" name="gender" value="<?= $row->gender; ?>"></td>                  
				            </tr>  
				            <tr>
				                <td>Telepon</td>
				                <td><input type="number" name="telepon" value="<?= $row->telepon; ?>"></td>                  
				            </tr> 
				            <tr>
				                <td>Email</td>
				                <td><input type="text" name="email" value="<?= $row->email; ?>"></td>                  
				            </tr> 
				            <tr>
				                <td>Pendidikan</td>
				                <td><input type="text" name="pendidikan" value="<?= $row->pendidikan; ?>"></td>                  
				            </tr> 

							<tr>
								<td></td>
								<td><input type="submit" value="Update"></td>					
							</tr>				
						</table>
					</form>

				<?php endforeach;?>

			</td>
        </tr>