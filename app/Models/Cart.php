<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $items = [];
    public $totalQty;
    public $totalPrice;

    public function __construct($cart = null){
        if($cart){
            $this->items = $cart->items;
            $this->totalQty = $cart->totalQty;
            $this->totalPrice = $cart->totalPrice;
        }else{
            $this->items = [];
            $this->totalQty = 0;
            $this->totalPrice = 0;
        }

    }

    public function add($product){
        $item = [
            'id' => $product->id,
            'title' => $product->title,
            'price' => $product->price,
            'Qty' => 0,
            'image' => $product->image,
        ];
        if(!array_key_exists($product->id, $this->items)){
            $this->items[$product->id] = $item;
            $this->totalQty +=1;
            $this->totalPrice += $product->price; 
        }else{
            $this->totalQty +=1;
            $this->totalPrice += $product->price; 
        }
        $this->items[$product->id]['Qty'] +=1;
    }
    
    public function remove($id){
        
        if(array_key_exists($id, $this->items)){
            $this->totalQty -= $this->items[$id]['Qty'];
            $this->totalPrice -= $this->items[$id]['Qty'] * $this->items[$id]['price'];
            unset($this->items[$id]);
        }
    }
}
