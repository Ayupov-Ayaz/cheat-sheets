<?php
namespace app\patterns;
/***************************************************************************************************************************************************************************
 * Singleton                                                                                                                                                               *
 * *************************************************************************************************************************************************************************
 * Гарантирует наличие экземпляра класса                                                                                                                                   *
 * Предоставляет глобальную точку доступа                                                                                                                                  *
 *                                                                                                                                                                         *
 * Реализация: Конструктор скрыт по умолчанию, создается публичный статический метод который и будет контролировать жизненный цикл объекта-одиночки                        *
 * Структура: В классе должнен быть метод getinstance(), который возвращает единственный экземпляр класса Singleton. Конструктор класса должен быть скрыть от клиента,     *
 * вызов функции getinstance() должен быть единсвенным способом получить экземпляр класса.                                                                                 *
 **************************************************************************************************************************************************************************/

 class Settings
 {
     // Заводим статическую переменную, которая будет хранить экземпляр нашего класса
     private static $_instance = null;

     // Массив который будет хранить настройки нашего класса 
     private $properties = array();

     // Защищаем класс от new
     private function __construct(){}

    // Защищаем класс от клонирования
     private function __clone(){} 

    // Защищаем класс от unserialize
    private function __wakeup(){}
    
    // Создаем/получаем единственный экземпляр класса
     public static function getinstance(){
         if(self::$_instance == null){
                self::$_instance = new Settings();
         }
         return self::$_instance;
     }

     // устанавливаем значения
     public function setProperty($key, $propery){
        $this->properties[$key] = $propery;
     }

     // получаем значения
     public function getProperty($key){
         return $this->properties[$key];
     }
 }

 // Пример использования:

 // Определяем 3 переменные и присваиваем им экземпляр класса Settings
 $settings1 = Settings::getInstance();
 $settings2 = Settings::getInstance();
 $settings3 = Settings::getInstance();

 echo 'Тут мы можем увидеть, что все наши экземпляры класса это на самом деле один и тотже экземляр: <pre>';
 var_dump($settings1);
 var_dump($settings2);
 var_dump($settings3);

