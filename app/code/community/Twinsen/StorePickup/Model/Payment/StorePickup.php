<?php

class Twinsen_StorePickup_Model_Payment_StorePickup extends Mage_Payment_Model_Method_Abstract
{
    protected $_code = 'storepickup';

    public function isAvailable($quote = null)
    {

        $shippingMethodCode = $quote->getShippingAddress()->getShippingMethod();
        if ($shippingMethodCode == 'storepickup_storepickup') {
            return true;
        }

        return false;


    }
}

?>