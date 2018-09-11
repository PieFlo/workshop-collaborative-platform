<?php
/**
 * Created by PhpStorm.
 * User: jeanlucbompard
 * Date: 04/01/18
 * Time: 15:12
 */

class Item
{
    private $id;
    private $name;
    private $quantity;

    /**
     * @param integer $id
     * @param string $name
     * @param integer $quantity
     */
    public function __construct($id, $name, $quantity)
    {
        $this->id = $id;
        $this->name = $name;
        $this->quantity = $quantity;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param integer $quantity
     */
    public function addQuantity($quantity)
    {
        $this->quantity += $quantity;
    }
    /**
     * @param integer $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }


    /**
     * @param integer $quantity
     */
    public function removeQuantity($quantity)
    {
        $this->quantity -= $quantity;
    }
}