<?php

namespace App;

class Note
{
    public $items = null;
    public $note = null;
    public $tentuychon = null;

    public function __construct($noteCart){
        if($noteCart){
            $this->items = $noteCart->items;
            $this->note = $noteCart->note;
            $this->tentuychon = $noteCart->tentuychon;
        }
    }

    public function add($item, $id){
        if($item->menu_id == 0){
            $giohang = ['tentuychon' => $item->tentuychon, 'item' => $item];
        }
        else{
            $giohang = ['tentuychon' => $item->tentuychon, 'item' => $item];
        }
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $giohang = $this->items[$id];
            }
        }
        $this->items[$id] = $giohang;
        $this->note++;
        if($item->menu_id == 0){
            $this->note += $item->0;
        }
        else{
            $this->note += $item->tentuychon;
        }

    }
}
