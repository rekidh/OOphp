<?php

use Produk as GlobalProduk;

class Produk
{

  public $judul,
    $penulis,
    $penerbit,
    $harga;

  public function __construct($judul, $penulis, $penerbit, $harga)       // __construct() mejig method php
  {
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;
  }
  // metod adalah function yang ada di dalam Class
  public function getLabel()
  {
    return "$this->judul,$this->penulis, $this->penerbit";
  }
}

$produk = new Produk("Naruto", "Masasi Khisimoto", "shonen Jump", 30000);               //instancesiasi

$komik2 = new Produk("Bokuno Hero", "Boku akademi", "sashomi", 35000);

class CetakInfoProduct
{
  public function cetak(Produk $product)      // <= parameter $product hanya bole menerima class Produk
  {
    $str = "{$product->judul} | {$product->getLabel()}(rp.{$product->harga})";
    return $str;
  }
}

$infoProduct1 = new CetakInfoProduct();   // instance class cetak info dan tampung

echo $infoProduct1->cetak($komik2);   // tampilkan cetak info dengan method cetak
