<?php
include '../dbconnect.php';
// menghapus barang dari stock
if(isset($_POST['hapusbarang'])){
	$idb = $_POST['idb']; //idbarang

	$gambar = mysqli_query($conn, "select * from produk where idproduk='$idb'");
	$get = mysqli_fetch_array($gambar);
	$img = 'produk/'.$get['gambar'];
	unlink($img);


	$hapus = mysqli_query($conn, "delete from produk where idproduk='$idb'");
	if($hapus){
		header('location:produk.php');
	} else {
		echo "Gagal";
		header('location:produk.php');
	}
};
// edit data produk
if(isset($_POST['updateproduk'])){
	$namaproduk	= $_POST['namaproduk'];
	$deskripsi = $_POST['deskripsi'];
	$hargaafter = $_POST['hargaafter'];
    $hargabefore = $_POST['hargabefore'];
   
	$idproduk = $_POST['idproduk'];

	$queryupdate = mysqli_query($conn,"update produk set namaproduk='$namaproduk', deskripsi='$deskripsi', 
    hargaafter='$hargaafter', hargabefore='$hargabefore' where idproduk='$idproduk'");

	if($queryupdate){
		header('location:produk.php');
	} else{
		header('location:produk.php');
	}
}
?>