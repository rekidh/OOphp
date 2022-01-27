<?php

class Produk
{

  public $judul, $penulis, $penerbit, $harga;

  // metod adalah function yang ada di dalam Class
  public function namaComik()
  {
    $result = " komik ini adalah komik $this->judul yang diterbikan oleh $this->penerbit";
    return  $result;
  }
}

$produk = new Produk();
$produk->judul = "Naruto";
$produk->penulis = "Masasi Khisimoto";
$produk->penerbit = "Shonen Jump";
$produk->harga = 30000;


$produk2 = new Produk();
$produk2->judul = " ancharted";

echo " Komik : $produk->judul penulis adalah $produk->penulis  dan penerbit adalah $produk->penerbit ";

echo "<br>";
echo "<br>";

$komik = new Produk();
$komik->judul = "shincan";
$komik->penerbit = "ochiri";

echo $komik->namaComik($komik->judul, $komik->penerbit);

echo "<br>";
echo "<br>";

$komik2 = new Produk();
$komik2->judul = " Bokuno hero";
$komik2->penerbit = "akademi boku";
$komik2->penulis = "sashomi";
$komik2->harga = 35000;

echo "Komik :" . $komik2->namaComik();
