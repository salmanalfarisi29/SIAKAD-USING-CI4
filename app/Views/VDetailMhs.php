<tr align="center">
            <td colspan="3">

				<h3>Detail Data Mahasiswa</h3>



				<!-- <a class="tombol" href="<?php echo base_url('/mahasiswa')?>">Data Mahasiswa</a> -->

				<?php
					foreach($getMahasiswa as $row):
				?>
					<p>Nim Mahasiswa  : <?= $row->nim;?></p>
					<p>Nama Mahasiswa : <?= $row->nama;?></p>
					<p>Umur Mahasiswa : <?= $row->umur;?></p>
				<?php endforeach;?>

            </td>
</tr>