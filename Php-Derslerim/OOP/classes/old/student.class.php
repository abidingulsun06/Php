<?php
class student
{
  //İki tane aynı isme sahip methodu tercih edeceğimiz zaman tercih etmek istediğimizi başa yazıp method adını belirtip insteadof yazarak hangi classtaki methodu kullanmayacağımızı belirtiriz
  use person, primaryscholl {
    person::FullName insteadof primaryscholl;
  }

  use person, primaryscholl {
    //Bir trait içindeki methodun ismini değiştirir
    primaryscholl::studentInfo as myMethod;
    //Bir methodun türünü pub,pri ve pro türünü değiştirebiliriz
    person::PrintMe as public;
  }
}
