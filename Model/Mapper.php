<?php

namespace Tajveez\CustomerImport\Model;

use Magento\Framework\Exception\LocalizedException;
use Tajveez\CustomerImport\Api\MapperInterface;

class Mapper implements MapperInterface
{
    public function map($columnMap, $parsedData): array
    {
        try {
            $mappedData = [];

            foreach ($parsedData as $rowData) {
                $rowMap = [];
                foreach ($rowData as $key => $val) {
                    $rowMap[$columnMap[$key]] = $val;
                }
                $mappedData[] = $rowMap;
            }

            return $mappedData;
        } catch (\Throwable $th) {
            throw new LocalizedException(__('Error while mapping, please check the ColumnMap and try again'));
        }
    }
}
