<!doctype html>
<html lang="en">

<tr align="center">
            <td colspan="5">
            <head>
                <title><?= $title; ?></title>
	            <!-- Required meta tags -->
	            <meta charset="utf-8">
	            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	        <!-- Bootstrap CSS -->
	            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
	            <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
            </head>

            <div class="container pt-5">
                <a class="tombol" href="<?php echo base_url('/pegawai/add')?>">+ Tambah Data Baru</a>
                <form action="/pegawai/search" method="post">
                    <table>
                        <tr>
                            <td>nama</td>
                            <td><input type="text" name="nama"></td>    
                            <td><input type="submit" value="Search"></td>                
                        </tr>    
                    </table>
                </form>
                <table border="1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nip</th>
                            <th>Nama</th>
                            <th>Gender</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Pendidikan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $nomor = 1; 
                        foreach($getPegawai as $row):
                    ?>
                        <tr>
                            <td><?= $nomor++; ?></td>
                            <td><?= $row->nip;?></td>
                            <td><?= $row->nama;?></td>
                            <td><?= $row->gender;?></td>
                            <td><?= $row->telepon;?></td>
                            <td><?= $row->email;?></td>
                            <td><?= $row->pendidikan;?></td>
                            <td>
                                <a class="edit" href="/pegawai/edit/<?= $row->id;?>">Edit</a> |
                                <a class="hapus" href="/pegawai/delete/<?= $row->id;?>">Hapus</a> |                     
                                <a class="detail" href="/pegawai/<?= $row->id;?>">Detail</a>                   
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            </body>

            </td>
        </tr>

            <!-- Optional JavaScript
    jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </html>