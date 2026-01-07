<?php
function format_rupiah($angka){
  $rupiah=number_format($angka,0,',','.');
  return $rupiah;
}

function barcode($kode){
  
  $generator = new \Picqer\Barcode\BarcodeGeneratorJPG();
  $barcode = '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($kode, $generator::TYPE_CODE_128)) . '">';
  return $barcode;
}