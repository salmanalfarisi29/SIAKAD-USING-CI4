<!doctype html>
<html lang="en">
 
<head>
    <title><?= $title; ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>
 
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="">DATA  MAHASISWA</a>
        </div>
    </nav>


    <div class="text-center">
    <a href="<?= base_url('/mahasiswa/add') ?>">
				<button type="button" class="btn btn-success" style="margin-bottom:10px;">Tambah Data</button>
	</a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <form action="/mahasiswa/search" method="post">
                <table class="table table-bordered table-striped">
                        <tr>
                            <td>nama</td>
                            <td><input type="text" name="nama"></td>
                            <td><input type="submit" value="Search"></td>
                        </tr>
                </table>
            </form>
        </div>
    </div>
        

  
    <div class="card-body">
		<div class="table-responsive">
            <table border="1" class="table table-bordered table-striped table-success" align="center">
            <thead class="table-dark">
                <tr>
                    <th>No.</th>
                    <th>Nama Mahasiswa</th>
                    <th>NIM</th>
                    <th>UMUR</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                //ngambil data getMahasiswa
                //array object jadi pakai ->
                foreach ($getMahasiswa as $mhs) { ?>
                    <tr>
                        <td><?= $no++?></td>
                        <td><?= $mhs['nama']; ?></td>
                        <td><?= $mhs['nim']; ?></td>
                        <td><?= $mhs['umur'];?></td>
                        <td>
                            <a href="<?= base_url('/mahasiswa/edit/' . $mhs['nim']); ?>" class="btn btn-success" data-target="#editModal">
                                Edit |</a>
                            <a href="<?= base_url('akademis/hapus/' . $mhs['nim']); ?>" onclick="javascript:return confirm('Apakah Anda yakin ingin menghapus data mahasiswa?')" class="btn btn-danger">
                                Hapus |</a>
                            <a href="/VDetailMhs/<?= $mhs['nim'];?>" class="btn btn-secondary">
                            Detail</a>                                    
                        </td>
                    </tr>
                <?php $no;
                } ?>
            </tbody>
            </table>
            <?= $pager->links('getMahasiswa', 'bootstrap_pagination'); ?>
            <?= $pager->links() ?>
            
            
            </div>
        </div>
    </body>

   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
 
    </html>