<?php

/************************************************************************************************************************************
 * Adapter (Адаптор)                                                                                                                *
 ************************************************************************************************************************************
 * Адаптер используется для того, что бы преобразовать интерфейс одного класса к интерфейсу другого класса                          *
 ***********************************************************************************************************************************/                                                 

 interface iPayments
 {
     function payments($sum);
 }

 interface iWebPayments
 {
     function webPayments($sum);
 }

 class Bank implements iPayments
 {
    public function payments($sum){
        echo 'Банк. Оплата наличными деньгами. <br>';
    }
 }

 class Qiwi implements iWebPayments
 {
    public function webPayments($sum){
        echo 'Qiwi. Оплата через интернет. <br>';
    }
 }

 // Создаем наш класс адаптер, который будет имплементировать интерфейс iPayments
 class QiwiAdapter implements iPayments
 {
     private $qiwi;

     public function __construct(Qiwi $qiwi){
         $this->qiwi = $qiwi;
     }
     // Можем использовать методы интерфейса iPayments
     public function payments($sum){
         echo 'Qiwi. Оплата наличными деньгами. <br>';
     }
     // Можем использовать методы интерфейса iWebPayments
     public function webPayments($sum){
         $this->qiwi->webPayments($sum);
     }
 }


 // Использования:

 $bank = new Bank();
 $bank->payments(100);
 
 $qiwi = new Qiwi();
 $qiwi->webPayments(200);

 $adapter = new QiwiAdapter($qiwi);
 $adapter->payments(200);
