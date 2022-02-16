<!-- Accessor method / setter &getter -->
<!-- kita menggunakan seter dan geter untuk menghidari poroperty dengan visility public
karna sebaiknya kita tidak membiarkan bagian luar dari class
bisa mengakses property secara langsung 

setelah kita mengubah visibility dari sebuah property kita tidak lagi 
dapat mengakses property secara langsung jika kita mau mendapatkan isi dari sebuah properti
atau bahkan menset nilai baru dari sebuah property
karna itu lah kita butuh sebuah method setter() dan getter() untuk bisa
membaca ataupun menggubah isinya

-->
<!-- note
sebaik nya sebuah property itu visibility nya protected atau private
tergantung akan di gunkan pada class child atau tidak
-->

<?php

class Produk
{
  private $judul,
    $penulis,
    $penerbit, $harga;
  protected $diskon;

  public function __construct($judul, $penulis, $penerbit, $harga)       // __construct() mejig method php
  {
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;
  }
  // metod adalah function yang ada di dalam Class
  public function getLabel() // getmethod
  {
    return "$this->judul,$this->penulis, $this->penerbit";
  }

  public function getinfoProduct() // get method
  {
    $str = " {$this->getLabel()} (rp.{$this->harga}) ";
    return $str;
  }
  public function getHarga()
  {
    return $this->harga - ($this->harga * $this->diskon / 100);
  }
  public function getJudul() // get method
  {
    return $this->judul;
  }
  public function getPenulis() // get method
  {
    return $this->penulis;
  }
  public function getPenerbit() // get method
  {
    return $this->penerbit;
  }


  //*********************************** set *********/
  public function setJudul($judul)
  {
    if (!is_string($judul)) {
      throw new Exception("judul harus huruf");
    }
    $this->judul = $judul;
  }
  public function setHarga($harga)
  {
    $this->harga = $harga;
  }

  public function setpPenulis($penulis)
  {
    $this->penulis = $penulis;
  }
  public function setPenerbit($penerbit)
  {
    $this->penerbit = $penerbit;
  }
  public function setDicont($diskon)
  {
    $this->diskon = $diskon;
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
echo '<br>';
echo $komik->getinfoProduct();
echo "<hr>";

//$game->harga=5000; jadi kita bisa mengubah harga nya
// protected $harga; properti ini menjadi tidak lagi dapat di akses atau di lindungi
$komik->setDicont(10);

echo $komik->getHarga();
echo "<hr>";

$komik->setDicont(50);
echo $komik->getHarga();


// note 
/* Overloading
seter dan getter bisa menggunakan magic method 
__set() & __get()
*/