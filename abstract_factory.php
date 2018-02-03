<?php


/************************************************************************************************************************************
 * Abstrack Factory  (Абстрактная Фабрика)                                                                                          *
 ************************************************************************************************************************************
 * Порождающий паттерн проектировани, основное предназначение - генерация связанных наборов классов которые реализуют единый        *
 * интерфейс.                                                                                                                       *
 * Структура: Изначально создается интерфейс или абстрактный класс объекта фабрики, на их основе реализуются фабричные классы       *
 ***********************************************************************************************************************************/                                                 

 abstract class Product
 {
     abstract public function getTitle();
 }

 interface Provider
 {
     function createPhone();

     function createNotebook();
 }

 // Lenovo
 class LenovoPhone extends Product
 {
     public function getTitle(){
         return 'This is Lenovo phone <br>';
     }
 }
 class LenovoNotebook extends Product
 {
     public function getTitle(){
         return 'This is Lenovo notebook <br>';
     }
 }

 // Samsung
 class SamsungPhone extends Product
 {
     public function getTitle(){
         return 'This is Lenovo phone <br>';
     }
 }

 class SamsungNotebook extends Product
 {
     public function getTitle(){
         return 'This is Samsung notebook <br>';
     }
 }

 // Поставщик которыq выступает как фабрика классов для Lenovo, реализующий правила из интерфейса Provider
 class LenovoProvider implements Provider
 {
     public function createPhone(){
         return new LenovoPhone();
     }

     public function createNotebook(){
         return new LenovoNotebook();
     }
 }

 // Поставщик который выступает как фабрика классов для Samsung, реализующий правила из интерфейса Provider
 class SamsungProvider implements Provider
 {
     public function createPhone(){
         return new SamsungPhone();
     }

     public function createNotebook(){
         return new SamsungNotebook();
     }
 }



 // Использование:

 // Создаем фабричные классы
 $lenovoProvider = new LenovoProvider();
 $samsungProvider = new SamsungProvider();

 // Создаем телефон samsung
 $samsungPhone = $samsungProvider->createPhone();
 echo $samsungPhone->getTitle();

 // Создаем ноутбук lenovo
 $lenovoNotebook = $lenovoProvider->createNotebook();
 echo $lenovoNotebook->getTitle();