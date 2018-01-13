<?php

namespace App;



class Cart
{
    public $items;
    public $totalPrice = null;
    public $totalQty = 0;

    public function __construct($oldCart)
    {
        if ($oldCart){
            $this->items = $oldCart->items;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalQty = $oldCart->totalQty;
        }
    }

    public function add($item, $id , $qty = 1)
    {
        $storedItem = ['qty'=>0, 'price'=>$item->price, 'item'=> $item];

        if ($this->items) {
            if (array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }

        $storedItem['qty'] += $qty;
        $storedItem['price'] = $storedItem['qty'] * $item->price;

        $this->items[$id] = $storedItem;


        $this->totalQty     += $qty;
        $this->totalPrice   += $qty * $item->price;
    }



    public function delete($id, $qty)
    {

        if ($this->items) {
            if (array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];

                $qty =  ($storedItem['qty'] < $qty)? $storedItem['qty'] : $qty;

                $storedItem['qty'] -= $qty;
                $storedItem['price'] = $storedItem['qty'] * $storedItem['item']->price;




                $this->totalQty     -= $qty;
                $this->totalPrice   -= $qty * $storedItem['item']->price;

                if ($storedItem['qty'] !== 0) {
                    $this->items[$id] = $storedItem;
                } else {
                    unset($this->items[$id]);
                }


            }
        }

    }


}
