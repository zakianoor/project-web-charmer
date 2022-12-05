<?php 
    $title = "Daftar Barang";
    require "includes/header.php"; 
?>
        <section class="dashboard">
            <div class="content">
                <h2 class="product-category">Product  <a class="btn-cart" href="barang_tambah.php">Add<i class="fa fa-plus"></i></a></h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Artist</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = mysqli_query($connect, "SELECT * FROM barang ");
                            $data = mysqli_fetch_assoc($query);
                            if(mysqli_num_rows($query) > 0) {
                                $no = 1;
                                do {
                        ?>
                                    <tr>
                                        <td><?=$no++;?></td>
                                        <td><img src="<?=BASE_URL;?>assets/img/<?=$data['img_brg'];?>" style="width: 250px;"></td>
                                        <td><?=$data['nama_brg'];?></td>
                                        <td><?=$data['nama_artis'];?></td>
                                        <td><?=$data['harga_brg'];?></td>
                                        <td><?=$data['stok_brg'];?></td>
                                        <td>
                                            <a href="barang_edit.php?id=<?=$data['id_brg'];?>"class="btn btn-sm btn-success">Edit<a>  
                                            <a href="barang_delete.php?id=<?=$data['id_brg'];?>"class="btn btn-sm btn-danger">Delete<a>
                                        </td>       
                                    </tr>
                        <?php
                                } while($data = mysqli_fetch_assoc($query));
                            } else {
                                echo "<tr><td colspan='7'><center>Belum ada data!</center></td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
<?php 
	require "includes/footer.php";
?>