<?php


/************************************************************************************************************************************
 * Builder (Строитель)                                                                                                              *
 ************************************************************************************************************************************
 * Порождающий паттерн проектирования, который позволяет создавать сложные объекты пошагово                                         *
 * Применение паттерна:                                                                                                             *
 * а) Когда вы хотите избавиться от "телескопического конструктора"                                                                 *
 * b) Когда ваш код должен создавать разные представления какого-то объекта. Например: деревянные и кирпичные дома.                 *
 * c) КОгда вам нужно собирать сложные составные объекты, например, деревья Компоновщика.                                           *
 ***********************************************************************************************************************************/                                                 

 class User
 {
     private $name;
     private $surname;
     private $age;
     private $phone;
     private $address;

     
     function __construct(UserBuilder $userBuilder){
         $this->name    = $userBuilder->getName();
         $this->surname = $userBuilder->getSurname();
         $this->age     = $userBuilder->getAge();
         $this->phone   = $userBuilder->getPhone();
         $this->address = $userBuilder->getAddress();
     }
 }

 // Строитель класса User
 class UserBuilder
 {
     // Определяем такие же поля, как и в классе User
    private $name;
    private $surname;
    private $phone;
    private $address;
    private $age;

    // функции для построения класса
    public function name(string $name){
        $this->name = $name;
        return $this;
    }
    public function surname(string $surname){
        $this->surname = $surname;
        return $this;
    }
    public function age(int $age){
        $this->age = $age;
        return $this;
    }
    public function phone(string $phone){
        $this->phone = $phone;
        return $this;
    }
    public function address(string $address){
        $this->address = $address;
        return $this;
    }
    
    // getters
    public function getName(){
        return $this->name;
    }
    public function getSurname(){
        return $this->surname;
    }
    public function getAge(){
        return $this->age;
    }
    public function getPhone(){
        return $this->phone;
    }
    public function getAddress(){
        return $this->address;
    }

    // Строительство класса
    public function build(){
        return new User($this);
    }

    }



    // Использование:
    $user = new UserBuilder(); // Создаем класс строителя 
    $user = $user->phone('89870616987')->surname('Аюпов')->name('Аяз')->address('г.Казань')->age(26)->build(); // Передаем в любом порядке наши переменные, в конце вызываем метод build()
    echo '<pre>';
    var_dump($user); // Получаем класс User