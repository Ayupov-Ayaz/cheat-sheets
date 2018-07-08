<?php
namespace app\solid;
/**
 * Принцип разделения интерфейса (Interface segregation)
 * «Много специализированных интерфейсов лучше, чем один универсальный»
 * Проверяем, насколько много интерфейс содержит методов и насколько разные
 * функции накладываются на эти методы, и если необходимо — разбиваем интерфейсы.
 */

interface IItem
{
    public function setCondition($condition);
    public function setPrice($price);
}

interface IClothes
{
    public function setColor($color);
    public function setSize($size);
    public function setMaterial($material);
}

interface IDiscountable
{
    public function applyDiscount($discount);
    public function applyPromocode($promocode);
}

class Book implements IItem, IDiscountable
{
    public function setCondition($condition){/*...*/}
    public function setPrice($price){/*...*/}
    public function applyDiscount($discount){/*...*/}
    public function applyPromocode($promocode){/*...*/}
}

class KidsClothes implements IItem, IClothes
{
    public function setCondition($condition){/*...*/}
    public function setPrice($price){/*...*/}
    public function setColor($color){/*...*/}
    public function setSize($size){/*...*/}
    public function setMaterial($material){/*...*/}
}