<!-- overriding adalah istilah dimana kita bisa membuat method di class child 
  yang memiliki nama yang sama dengan peren class-->
<!-- overriding (mengambil alih/ menimpa) -->

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

  public function getinfoProduct()
  {
    $str = " {$this->getLabel()} (rp.{$this->harga}) ";
    return $str;
  }
}

class Komik extends Produk
{
  public  $jumlahHalam;

  // __consturct ini tidak masalh jika ingin di isi nilai default
  public function __construct($judul, $penulis, $penerbit, $harga, $jumlahHalam)
  {
    // parent --construct jangan di isi nilai default
    parent::__construct($judul, $penulis, $penerbit, $harga, $jumlahHalam);
    $this->jumlahHalam = $jumlahHalam;
  }

  public function getinfoProduct()
  {
    $str = " Komik :" . parent::getinfoProduct() . "- {$this->jumlahHalam} halaman ";
    return $str;
  }
}


class Game extends Produk
{
  public $waktuMain;
  public function __construct($judul, $penulis, $penerbit, $harga, $waktuMain)
  {
    parent::__construct($judul, $penulis, $penerbit, $harga, $waktuMain);
    $this->waktuMain = $waktuMain;
  }
  public function getinfoProduct()
  {
    $str = " Game :" . parent::getinfoProduct() . "- {$this->waktuMain} jam ";
    return $str;
  }
}
$game = new Game("Naruto", "Masasi Khisimoto", "shonen Jump", 30000, 50, "game");               //instancesiasi
$komik = new Komik("Bokuno Hero", "Boku akademi", "sashomi", 35000, 300, "komik");

echo $game->getinfoProduct();

echo $komik->getinfoProduct();




?>