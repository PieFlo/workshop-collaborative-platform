<?php

require_once ("Item.php");

class Cart
{
    // Id du panier
    private $id;
    // Nos items
    private $items = [];


    /**
     * @param string $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function isEmpty()
    {
        return count($this->items) == 0;
    }

    public function getTotalItem()
    {
        $total = 0;
        foreach ($this->items as $item) {
            ++$total;
        }
        return $total;
    }

    public function getTotalQuantity()
    {
        $quantity = 0;
        foreach ($this->items as $item) {
            $quantity += $item->getQuantity();
        }
        return $quantity;
    }

    public function clear()
    {
        $this->items = [];
        $this->save();
    }

    public function insert($id, $name, $quantity = 1)
    {
        if (isset($this->items[$id])) {
            // L'élément existe déjà
            $this->items[$id]->addQuantity($quantity);
        } else {
            // L'élément n'existe pas
            $this->items[$id] = new Item($id, $name, $quantity);
        }
    }

    public function add($id, $quantity = 1)
    {
        if (isset($this->items[$id])) {
            // L'élément existe déjà
            $this->items[$id]->addQuantity($quantity);

            return $this->items[$id]->getQuantity();
        }
    }

    public function remove($id, $quantity = 1)
    {
        if (isset($this->items[$id])) {
            // L'élément existe déjà
            $this->items[$id]->removeQuantity($quantity);
            $quantity = $this->items[$id]->getQuantity();
            if ($quantity == 0) {
                unset($this->items[$id]);
            }
            return $quantity;
        }
    }
}

