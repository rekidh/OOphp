<!-- inheritance adalah hirarki  antar class  -->
<!-- inheritance akan memperluar dari propertidari method  -->

<?php

use Produk as GlobalProduk;

class Mobil
{
  public    // fisibiliti 
    $mobil,
    $warna;
  public function tambahKecePatan()
  {
    return "kecepatan bertambah";
  }
}

class MobilSport extends Mobil
{
  public
    $turbo;
  public function turbo()
  {
    return " turbo On";
  }
}

$avanza = new Mobil();

$mersi = new MobilSport();

echo $mersi->tambahKecePatan();


// komik dengan pendekatan inheritance


class Produk
{

  public $judul,
    $penulis,
    $penerbit,
    $harga,
    $jumlahHalam,
    $waktuMain;

  public function __construct($judul, $penulis, $penerbit, $harga, $jumlahHalam, $waktuMain)       // __construct() mejig method php
  {
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;
    $this->jumlahHalam = $jumlahHalam;
    $this->waktuMain = $waktuMain;
  }
  // metod adalah function yang ada di dalam Class
  public function getLabel()
  {
    return "$this->judul,$this->penulis, $this->penerbit";
  }

  public function getinfoProduct()
  {
    $str = " {$this->getLabel()} (rp.{$this->harga}) ";
    return $str;
  }
}



class CetakInfoProduct
{
  public function cetak(Produk $product)      // <= parameter $product hanya bole menerima class Produk
  {
    $str = "{$product->judul} | {$product->getLabel()}(rp.{$product->harga})";
    return $str;
  }
}

$infoProduct1 = new CetakInfoProduct();   // instance class cetak info dan tampung


class Komik extends Produk
{
  public function getinfoProduct()
  {
    $str = " Komik : {$this->getLabel()} (rp.{$this->harga}) - {$this->jumlahHalam} halaman ";
    return $str;
  }
}
class Game extends Produk
{
  public function getinfoProduct()
  {
    $str = " Game : {$this->getLabel()} (rp.{$this->harga}) - {$this->waktuMain} jam ";
    return $str;
  }
}
$game = new Game("Naruto", "Masasi Khisimoto", "shonen Jump", 30000, 0, 50, "game");               //instancesiasi
$komik = new Komik("Bokuno Hero", "Boku akademi", "sashomi", 35000, 300, 0, "komik");

echo $game->getinfoProduct();
echo $komik->getinfoProduct();
