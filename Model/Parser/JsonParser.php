<?php

namespace Tajveez\CustomerImport\Model\Parser;

use Tajveez\CustomerImport\Api\ParserInterface;
use Magento\Framework\Filesystem\Driver\File;
use Magento\Framework\Serialize\Serializer\Json;

class JsonParser implements ParserInterface
{
    protected $file;
    protected $json;

    public function __construct(File $file, Json $json)
    {
        $this->file = $file;
        $this->json = $json;
    }

    public function parse($filePath): array
    {
        $contents =  $this->file->fileGetContents($filePath);
        $parsedData = $this->json->unserialize($contents);
        return $parsedData;
    }
}
