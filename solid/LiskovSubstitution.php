<?php
namespace app\solid;

/**
 * Принцип подстановки Барбары Лисков (Liskov substitution)
 * «Объекты в программе могут быть заменены их наследниками без изменения свойств программы»
 * Для этого проверяем, не усилили ли мы предусловия и не ослабили ли постусловия. Если это произошло — то принцип не соблюдается
 */

class Rectangle
{
    protected $width;
    protected $height;


    public function setWidth($width){
        $this->width = $width;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function getHeight()
    {
        return $this->height;
    }
}

class Square
{
    protected $size;

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function getSize()
    {
        return $this->size;
    }
}