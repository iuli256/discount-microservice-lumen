<?php
/**
 * Created by PhpStorm.
 * User: iuli
 * Date: 5/28/2018
 * Time: 10:51 AM
 */

namespace App\Discount;

use App;
use App\Discount\Interfaces\IDiscount;
class DiscountAll implements IDiscount
{
    /**
     * Return the name of the discount in order to be sent in api risponse
     * @return string name of the discount
     */
    public static function getName(){
        return "All";
    }

    /**
     * Check if order meet the condition for applying discount
     * if customer have revenue > 1000 then it has discount and return
     * All if not will return None
     * @param array $data order json decoded
     * @return string ('All' if has discount / 'None' if it hasn't)
     */
    public static function isDisountApplicable($data)
    {
        $customerId = $data->{'customer-id'};
        $customer = new App\Customer();
        $revenue = $customer->getRevenue($customerId);
        if ((int)$revenue > 1000) {
            return True;
        }
        return False;
    }

    /**
     * Compute discount value by getting 10% from the value of the entire order
     * @param array $data order json decoded
     * @return float (discount value)
     */
    public static function applyDiscount($data){
        $total = floatval($data->total);
        return $total * 0.1;
    }
}