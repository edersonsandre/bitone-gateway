<?php
/**
 * Created by PhpStorm.
 * User: edersonsandre
 * Date: 02/07/16
 * Time: 01:44
 */

namespace BitOne\Gateway;



class Sale extends AbstractGateway implements RequestInterface {

    private $_descriptor = 3;

    public function __construct($merchantId, $merchantKey){
        parent::__construct($merchantId, $merchantKey);

        $this->setMethod('POST')
            ->setDescriptor($this->_descriptor)
            ->setReferenceTag("SALES - VIA API");

    }

    public function response()
    {
        // TODO: Implement response() method.
    }

    public function requestTransaction($data)
    {
//        try{
            $this->setData($this->_mount($data));

            $headers = array('Accept' => 'application/json');


            $request = \Requests::post($this->getUri(), $headers, $this->getData());

            exit("<pre>" . print_r($request, 1) . "</pre>"); #debug-ederson
            
//        }catch (\Exception $e){
//            exit("<pre>" . print_r($e->getMessage(), 1) . "</pre>"); #debug-ederson
//        }
        
       
        


        exit("<pre>" . print_r("FIM", 1) . "</pre>"); #debug-ederson
        
    }

    protected  function _mount($data){
        $data['merchantId'] = $this->getMerchantId();
        $data['merchantKey'] = $this->getMerchantKey();
        $data['order']['sale']['options']['saveClient'] = $this->getSaveClient();
        $data['order']['sale']['totalAmount'] = $this->getTotalAmount();
        $data['order']['sale']['shippingAmount'] = $this->getShippingAmount();
        $data['order']['sale']['iataFee'] = $this->getIataFee();
        $data['order']['sale']['descriptor'] = $this->getDescriptor();
        $data['order']['sale']['currency'] = $this->getCurrency();
        $data['order']['sale']['referenceTag'] = $this->getReferenceTag();
        $data['order']['sale']['creditPayment']['creditClientName'] = $this->getCreditClientName();
        $data['order']['sale']['creditPayment']['creditNumber'] = $this->getCreditNumber();
        $data['order']['sale']['creditPayment']['creditExpirationMonth'] = $this->getCreditExpirationMonth();
        $data['order']['sale']['creditPayment']['creditExpirationYear'] = $this->getCreditExpirationYear();
        $data['order']['sale']['creditPayment']['creditCvv'] = $this->getCreditCvv();
        $data['order']['sale']['creditPayment']['creditInstallments'] = $this->getCreditInstallments();
        $data['order']['sale']['creditPayment']['creditChargeInterest'] = $this->getCreditChargeInterest();


        return $data;
    }

}