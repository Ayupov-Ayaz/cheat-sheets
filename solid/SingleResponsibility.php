<?php

namespace app\solid;

/**
 * Принцип единственной ответственности (Single responsibility)
 * «На каждый объект должна быть возложена одна единственная обязанность»
 * Для этого проверяем, сколько у нас есть причин для изменения класса — если больше одной,
 * то следует разбить данный класс.
 */

class Order
{
    public function calculateTotalSum(){/*...*/}
    public function getItems(){/*...*/}
    public function getItemCount(){/*...*/}
    public function addItem($item){/*...*/}
    public function deleteItem($item){/*...*/}
}

class OrderRepository
{
    public function load($orderID){/*...*/}
    public function save($order){/*...*/}
    public function update($order){/*...*/}
    public function delete($order){/*...*/}
}

class OrderViewer
{
    public function printOrder($order){/*...*/}
    public function showOrder($order){/*...*/}
}

