<?php


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


echo "<br>";

echo $komik2->getLabel();
echo "<br>";
echo $produk->getLabel();
echo " komit test";
