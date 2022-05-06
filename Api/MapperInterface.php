<?php

namespace Tajveez\CustomerImport\Api;

interface MapperInterface
{
    public function map($columnsMap, $parsedData): array;
}
