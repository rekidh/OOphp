<!-- inheritanece adalah konsep hirki anatar kelas (perent& child)
  Child class , mewarisi semua properti dan method dari Parent nya ( yang visible)
    child class , memperluas (extend) functionalitas dari parent nnya
-->
<?php

class Produk
{

  public $judul,
    $penulis,
    $penerbit,
    $harga,
    $jumlahHalam,
    $waktuMain,
    $tipe;

  public function __construct($judul, $penulis, $penerbit, $harga, $jumlahHalam, $waktuMain, $tipe)       // __construct() mejig method php
  {
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;
    $this->jumlahHalam = $jumlahHalam;
    $this->waktuMain = $waktuMain;
    $this->tipe = $tipe;
  }
  // metod adalah function yang ada di dalam Class
  public function getLabel()
  {
    return "$this->judul,$this->penulis, $this->penerbit";
  }

  public function getinfolengkap()
  {
    $str = "{$this->tipe} : {$this->getLabel()} (rp.{$this->harga}) ";
    if ($this->tipe == "komik") {
      $str .= "-{$this->jumlahHalam} halaman";
    } else if ($this->tipe == "game") {
      $str .= "~{$this->waktuMain} jam";
    }
    return $str;
  }
}

$produk = new Produk("Naruto", "Masasi Khisimoto", "shonen Jump", 30000, 0, 50, "game");               //instancesiasi

$komik2 = new Produk("Bokuno Hero", "Boku akademi", "sashomi", 35000, 300, 0, "komik");

class CetakInfoProduct
{
  public function cetak(Produk $product)      // <= parameter $product hanya bole menerima class Produk
  {
    $str = "{$product->judul} | {$product->getLabel()}(rp.{$product->harga})";
    return $str;
  }
}

$infoProduct1 = new CetakInfoProduct();   // instance class cetak info dan tampung

// tampilkan cetak info dengan method cetak

// komik : naruto | penulis product ,harga, jumlah halam
// game : judul | penulis dan penerbit , harga , jam main

echo $produk->getinfolengkap();
echo $komik2->getinfolengkap();
var_dump($komik2->jumlahHalam);
