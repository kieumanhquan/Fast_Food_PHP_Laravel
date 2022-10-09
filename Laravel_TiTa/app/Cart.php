<?php

namespace App;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    public $note = null;
    public $tentuychon = null;

    public function __construct($oldCart){
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
            $this->note = $oldCart->note;
            $this->tentuychon = $oldCart->tentuychon;
        }
    }

    public function add($item, $id){
        if($item->gianew == 0){
            $giohang = ['qty'=>0, 'price' => $item->giaold, 'item' => $item];
        }
        else{
            $giohang = ['qty'=>0, 'price' => $item->gianew, 'item' => $item];
        }
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $giohang = $this->items[$id];
            }
        }
        $giohang['qty']++;
        if($item->promotion_price == 0){
            $giohang['price'] = $item->giaold * $giohang['qty'];
        }
        else{
            $giohang['price'] = $item->gianew * $giohang['qty'];
        }
        $this->items[$id] = $giohang;
        $this->totalQty++;
        if($item->gianew == 0){
            $this->totalPrice += $item->giaold;
        }
        else{
            $this->totalPrice += $item->gianew;
        }

        //

        // $this->note[$id] = $giohang;
        // $this->tentuychon;
        // if($note->tentuychon == 0){
        //     $this->tentuychon += $item->tentuychon;
        // }
        // else{
        //     $this->tentuychon += $item->tentuychon;
        // }

    }
    //xóa 1
    public function reduceByOne($id){
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];
        if($this->items[$id]['qty']<=0){
            unset($this->items[$id]);
        }
    }
    //xóa nhiều
    public function removeItem($id){
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }
}
