<?php

namespace Tajveez\CustomerImport\Model;

use Tajveez\CustomerImport\Model\Profile\ProfileManager;
use Magento\Framework\Filesystem\Driver\File;
use Magento\Framework\Exception\FileSystemException;
use Magento\Framework\Exception\LocalizedException;

class ImportManager
{
    protected $profileManager;
    private $file;
    protected $importClass;

    public function __construct(File $file, ProfileManager $profileManager)
    {
        $this->file = $file;
        $this->profileManager = $profileManager;
    }

    public function executeImport($profileName, $filePath)
    {
        // checking availibity of profile
        if (!$this->profileManager->profileExist($profileName)) {
            throw new LocalizedException(__("Profile with name: $profileName doesn't exist, please check available profiles by using command: bin/magento customer:import:profiles-list"));
            return;
        }

        // checking if file Exists
        if (!$this->file->isExists($filePath)) {
            throw new LocalizedException(__('Invalid file path or no file found.'));
            return;
        }

        $this->importClass = $this->profileManager->getImportClass($profileName);
        $this->importClass->import($filePath);

        return;
    }
}
