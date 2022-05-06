<?php

namespace Tajveez\CustomerImport\Model\Parser;

use Tajveez\CustomerImport\Api\ParserInterface;
use Magento\Framework\File\Csv;

class CsvParser implements ParserInterface
{
    protected $csv;

    public function __construct(Csv $csv)
    {
        $this->csv = $csv;
    }

    public function parse($filePath): array
    {
        $parsedData = [];

        $this->csv->setDelimiter(",");
        $csvData = $this->csv->getData($filePath);
        if (!empty($csvData)) {
            $header = array_shift($csvData);
            foreach ($csvData as $data) {
                $parsedData[] = array_combine($header, $data);
            }
        }

        return $parsedData;
    }
}
