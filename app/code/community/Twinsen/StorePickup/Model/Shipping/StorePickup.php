<?php

class Twinsen_StorePickup_Model_Shipping_StorePickup  extends Mage_Shipping_Model_Carrier_Abstract implements Mage_Shipping_Model_Carrier_Interface
{
    protected $_code = 'storepickup';


    /**
     * collect shipping rates
     *
     * @param Mage_Shipping_Model_Rate_Request $request
     * @return Mage_Shipping_Model_Rate_Result
     */
    public function collectRates(Mage_Shipping_Model_Rate_Request $request)
    {
        if(!$this->getConfigFlag('active')) {
            return false;
        }


        $result = Mage::getModel('shipping/rate_result');


        $method = Mage::getModel('shipping/rate_result_method');
        $method->setCarrier($this->_code);
        $method->setCarrierTitle($this->getConfigData('title'));
        $method->setMethod('storepickup');
        $method->setMethodTitle($this->getConfigData('methodtitle'));
        $method->setPrice($this->getConfigData('price'));
        $method->setCost(0);
        $result->append($method);



        return $result;
    }



    /**
     * Returns Allowed shipping methods
     *
     * @return array
     */
    public function getAllowedMethods()
    {
        return array(
            'standard' => $this->getConfigData('methodtitle'),
        );
    }
    }
