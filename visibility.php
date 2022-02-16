<!-- 
  - visibility atau akses modifair 
visibility adlah konsep yang di gunkan untuk mengatur akses dari property dan method pada sebuah object 

ada 3 keyword untuk visibility:
public  => dapat digunakan di mana saja bahakan di luar class
protected => hanya dapat di gunakan di dalam class beserta turunan nya
private => hanya dapat digunakan dalam sebuah class tertentu saja 

- kenanapa kita perlu menerapkan visibility
1.supaya kita hanya memperlihatkan aspek dari class yang dibutuhkan oleh client nya saja
2. kita dapat menetukan kebutuhan yang jelas untuk object
3. memberiakna kendali pada kode untuk menhindari bug
-->
<!-- note
untuk dapat menampilkan isi var dari sebuah visibility yang bukan public 
kita bisa menggunakan sebuah method get yang di dalam nya terdapat retunr sebuah
var dengan visibility u=yang mungkin di jangkau -->
<?php

class Produk
{
  public $judul,
    $penulis,
    $penerbit;
  protected $diskon, $harga;

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
  public function setDicont($diskon)
  {
    $this->diskon = $diskon;
  }
  public function getHarga()
  {
    return $this->harga - ($this->harga * $this->diskon / 100);
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
  public function setDicont($diskon)
  {
    $this->diskon = $diskon;
  }
  public function getHarga()
  {
    return $this->harga - ($this->harga * $this->diskon / 100);
  }
}
$game = new Game("Naruto", "Masasi Khisimoto", "shonen Jump", 30000, 50, "game");               //instancesiasi
$komik = new Komik("Bokuno Hero", "Boku akademi", "sashomi", 35000, 300, "komik");

echo $game->getinfoProduct();
echo '<br>';
echo $komik->getinfoProduct();
echo "<hr>";

//$game->harga=5000; jadi kita bisa mengubah harga nya
// protected $harga; properti ini menjadi tidak lagi dapat di akses atau di lindungi
$komik->setDicont(10);

echo $komik->getHarga();











?>