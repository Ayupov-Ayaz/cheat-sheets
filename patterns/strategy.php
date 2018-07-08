<?php
namespace app\patterns;
/************************************************************************************************************************************
 * Strategy (Стратегия)                                                                                                             *
 ************************************************************************************************************************************
 * Паттерн проектирования, который реализует алгоритм по которым мы можем работать с тем или иным классом                           *
 *                                                                                                                                  *
 ***********************************************************************************************************************************/                                                 

 // Заводим интерфейс для создаваемых классов, что бы определить обязательный метод который будет работать в независимости от класса
 interface iTransport
 {
     function delivery();
 }

 // Машина
 class Car implements iTransport
 {
    public function delivery(){
        echo 'Доставка легковой машиной';
    }
 }

 // Грузовик
 class Truck implements iTransport
 {
     public function delivery(){
         echo 'Доставка грузовым автомобилем';
     }
 }

 // Поезд
 class Train implements iTransport
 {
     public function delivery(){
         echo 'Доставка поездом';
     }
 }

 // Класс фабрика для создания транспорта, объеденим со стратегией. 
 class TransportFactory
 {
    /**
     * Стратегия для создания класса, в зависимости от веса груза определяем какай класс будет осуществлять доставку груза
     * 
     * @param int $parcel_weight - вес товара который нужно доставить
     */
    public static function delivery(int $parcel_weight){
        if($parcel_weight < 10){
            $transport = new Car();
        }
        else if($parcel_weight < 100){
            $transport = new Truck();
        }
        else $transport = new Train();

        return $transport->delivery();
    }
 }

// Использование:

// Создаем нашу фабрику класса
$transportFactory = new TransportFactory();

// Получаем результат метода delivery исходя из переданного значения 
$transportFactory->delivery(15);