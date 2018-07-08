<?php
namespace app\solid;
/**
 * Принцип открытости/закрытости (Open-closed)
 * «Программные сущности должны быть открыты для расширения, но закрыты для модификации»
 * Для этого представляем наш класс как «чёрный ящик» и смотрим, можем ли в таком случае изменить его поведение.
 */


class OrderRepository
{
    private $source;

    public function setSource(IOrderSource $source)
    {
        $this->source = $source;
    }

    public function load($orderID)
    {
        return $this->source->load($orderID);
    }
    public function save($order){/*...*/}
    public function update($order){/*...*/}
}

interface IOrderSource
{
    public function load($orderID);
    public function save($order);
    public function update($order);
    public function delete($order);
}

class MySQLOrderSource implements IOrderSource
{
    public function load($orderID){/*...*/}
    public function save($order){/*...*/}
    public function update($order){/*...*/}
    public function delete($order){/*...*/}
}

class ApiOrderSource implements IOrderSource
{
    public function load($orderID){/*...*/}
    public function save($order){/*...*/}
    public function update($order){/*...*/}
    public function delete($order){/*...*/}
}