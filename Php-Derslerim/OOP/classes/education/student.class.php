<?php

namespace sifirdanphp\education;

class Student
{

  public $name;
  private $age;
  protected $deneme;
  public $lastName;
  private static $number = 0;
  function __construct()
  {
    echo "nesne belleği yüklendi<br>";
  }

  function __destruct()
  {
    echo "nesne bellekten silindi<br>";
  }

  //Nesnede bulunmayan bir method çağırılırsa istediğimiz uyarıyı bize verir
  public function __call($name, $par)
  {
    echo $name . " methodu bu sınıfta mevcut değil<br>";
  }

  //nesnede bulunmayan yahut bulunupta private olan değere dışardan erişim yaparken kontrol ederiz
  function __get($name)
  {
    echo $name . " isimli bir property yok veya ulaşılmıyor<br>";
  }

  //nesnede bulunmayan bir değere veri atanmaya kalkarsak istediğimiz mesajı veririz
  function __set($name, $val)
  {
    echo $name . " isimli bir property yok veya ulaşılmıyor<br>";
    echo $val . " bulunmayan bir porpertye veri atanamaz<br>";
  }

  //Nesne içinde olmayan veya erişim izni olmayan bir property isset veya empty fonksiyonları ile sınandığında çalışır
  function __isset($name)
  {
    echo $name . " isimli property bulunmuyor veya erişilemiyo. Bu yüzden isset veya empty functionları ile sınamaya kalkamazsınız <br>";
  }

  //Nesne içinde olmayan veya erişim izni olmayan bir property unset fonksiyonu ile yok edilmeye çalışıldığında çalışır
  function __unset($name)
  {
    echo $name . " Olmadığından ötürü unset fonksiyonunu kullanamazsınız<br>";
  }

  //nesne fonksiyon olarak çağırılıp içine değer atanırsa mevcut parametre ismiyle mesajı bize döndürür
  function __invoke($par)
  {
    echo "Nesne  $par parametresi ile fonksiyon olarak çalıştırılmaya başladı<br>";
  }

  //clone ile nesne kopyalandığında çalışır
  function __clone()
  {
    self::$number++;
  }
  public static function Sum()
  {
    return "Toplam kopya sayısı=" . self::$number . "<br>";
  }

  //nesne yazdırılmaya çalışınca ekrana return değerini verir
  function __toString()
  {
    return "Tostring mesajı geldi<br>";
  }
  //Nesneye serialize fonksiyonu uygulandığında çalışır
  function __sleep()
  {
    echo "Nesne dizi haline getiriliyor<br>";
  }

  //Nesneye unserialize fonksiyonu uygulandığında çalışır
  function __wakeup()
  {
    echo "Dizi nesne haline getiriliyor<br>";
  }

  //Nesnede bulunmayan bir static method çağırılırsa istediğimiz uyarıyı bize verir
  public static function __callStatic($name, $arguments)
  {
    echo $name . " metodu bu sınıfta mevcut değil<br>";
  }

  //Nesneye var_dump fonksiyonu uygulandığında çalışır
  function __debugInfo()
  {
    echo "nesneye vardump uygulandı..<br>";
  }


  public function StudentInfo()
  {
    return $this->name . " " . $this->lastName;
  }
}
