<?php
namespace CodesWholesaleFramework\Postback\ReceivePreOrders;
/**
 *   This file is part of codeswholesale-plugin-framework.
 *
 *   codeswholesale-plugin-framework is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 *   codeswholesale-plugin-framework is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *   along with codeswholesale-plugin-framework; if not, write to the Free Software
 *   Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
use CodesWholesaleFramework\Action;

class UpdateOrderWithPreOrdersAction //implements Action
{


    private $updateOrderWithPreOrders;

    /**
     * @var NewKeys
     */
    private $newKeys;

    /**
     * @param $updateOrderWithPreOrders
     */
    public function __construct($updateOrderWithPreOrders){

        $this->updateOrderWithPreOrders = $updateOrderWithPreOrders;
    }

    public function process(){

        $newKeys = $this->newKeys;

        $textComment = 'PreOrder Codes to send: ' . ($newKeys[0]['total'] - $newKeys[0]['preOrdersLeft'] . '/' . $newKeys[0]['total']);

        $this->updateOrderWithPreOrders->update($newKeys, $textComment);
    }

    /**
     * @param $newKeys
     */
    public function setKeys($newKeys){
        $this->newKeys = $newKeys;
    }


}