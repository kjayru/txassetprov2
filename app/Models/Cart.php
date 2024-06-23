<?php
namespace App\Models;

class Cart{
	
	public $cantidad;
	public $total;
	public $items=null;
	
	public function __construct($oldcart){
		if($oldcart){
			$this->items = $oldcart->items;
			$this->cantidad = $oldcart->cantidad;
			$this->total = $oldcart->total;
		}
	}
	public function add($curso,$precio,$cantidad,$id){

		$store = [
			'id'=>'',
			'curso' =>$curso,
			'precio'=>'',
		];

		$this->cantidad +=$cantidad;
		$this->total +=$precio;
		$store['id']= $id;
		$store['precio']=$precio;
		
		$this->items[$id] = $store;

	}

	public function removeItem($id){
		$this->cantidad -=1;
		$this->total = $this->total - (float) filter_var($this->items[$id]['precio'],FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
		unset($this->items[$id]);
	}

	

}