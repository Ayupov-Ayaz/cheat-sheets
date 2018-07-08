<?php
namespace app\solid;
/**
 * Принцип инверсии зависимостей (Dependency Invertion)
 * «Зависимости должны строится относительно абстракций, а не деталей»
 * Проверяем, зависят ли классы от каких-то других классов
 * (непосредственно инстанцируют объекты других классов и т.д)
 * и если эта зависимость имеет место, заменяем на зависимость от абстракции.
 */


class Customer
{
    private $currentOrder = null;

    public function buyItems(IOrderProcessor $processor)
    {
        if(is_null($this->currentOrder)){
            return false;
        }

        return $processor->checkout($this->currentOrder);
    }

    public function addItem($item){
        if(is_null($this->currentOrder)){
            $this->currentOrder = new Order();
        }
        return $this->currentOrder->addItem($item);
    }
    public function deleteItem($item){
        if(is_null($this->currentOrder)){
            return false;
        }
        return $this->currentOrder ->deleteItem($item);
    }
}

interface IOrderProcessor
{
    public function checkout($order);
}

class OrderProcessor implements IOrderProcessor
{
    public function checkout($order){/*...*/}
}
