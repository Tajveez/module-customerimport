<?php

namespace Tajveez\CustomerImport\Api;

interface ParserInterface
{
    public function parse($filePath): array;
}
