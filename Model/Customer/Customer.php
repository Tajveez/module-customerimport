<?php

namespace Tajveez\CustomerImport\Model\Customer;

use Magento\Store\Model\StoreManagerInterface;
use Magento\Customer\Model\CustomerFactory;
use Magento\Framework\Exception\LocalizedException;

class Customer
{
    protected $storeManager;
    protected $customerFactory;
    protected $customerRepository;

    public function __construct(
        StoreManagerInterface $storeManager,
        CustomerFactory $customerFactory
    ) {
        $this->storeManager = $storeManager;
        $this->customerFactory = $customerFactory;
    }

    public function saveCustomers($customerData)
    {
        foreach ($customerData as $customer) {
            $newCustomerData = array_merge(
                $this->getDefaultData(),
                $customer
            );

            if (!$newCustomerData['firstname'] || !$newCustomerData['lastname'] || !$newCustomerData['email']) {
                throw new LocalizedException(__('Required customer Data, i.e. firstname,lastname or email is missing.'));
                continue;
            }
            $this->save($newCustomerData);
        }
    }

    public function save($customerData)
    {
        $websiteId = $customerData['website_id'];
        $email = $customerData['email'];

        $customer = $this->customerFactory->create();
        $customer->setWebsiteId($websiteId)->loadByEmail($email);

        $id = $customer->getId();
        if ($id) {
            $customerData['entity_id'] = $id;
        }

        $customer->setData($customerData)->save();
    }

    public function getDefaultData()
    {
        $storeId = $this->storeManager->getStore()->getId();
        $websiteId = $this->storeManager->getStore($storeId)->getWebsiteId();

        return [
            'firstname'     => '',
            'lastname'      => '',
            'email'         => '',
            '_website'      => 'base',
            '_store'        => 'default',
            'store_id'      => $storeId,
            'website_id'    => $websiteId,
        ];
    }
}
