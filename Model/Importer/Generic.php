<?php

namespace Tajveez\CustomerImport\Model\Importer;

use Magento\Framework\Exception\LocalizedException;
use Tajveez\CustomerImport\Api\ImportInterface;
use Tajveez\CustomerImport\Api\MapperInterface;
use Tajveez\CustomerImport\Api\ParserInterface;
use Tajveez\CustomerImport\Model\Customer\Customer;

class Generic implements ImportInterface
{
    protected $columnMap;
    protected $parser;
    protected $mapper;
    protected $customerModel;

    public function __construct(ParserInterface $parser, MapperInterface $mapper, Customer $customerModel)
    {
        $this->parser = $parser;
        $this->mapper = $mapper;
        $this->customerModel = $customerModel;
        $this->columnMap = [
            'fname' => 'firstname',
            'lname' => 'lastname',
            'emailaddress' => 'email'
        ];
    }

    public function import($filePath)
    {
        try {
            $parsedData = $this->parser->parse($filePath);
            $customerData = $this->mapper->map($this->columnMap, $parsedData);
            $this->customerModel->saveCustomers($customerData);
        } catch (\Throwable $th) {
            // throw $th;
            throw new LocalizedException(__('Error while processing import file, Please check the file and try again'));
        }
    }
}
