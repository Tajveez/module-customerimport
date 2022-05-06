<?php

namespace Tajveez\CustomerImport\Model\Profile;

use Magento\Framework\ObjectManagerInterface;
use Tajveez\CustomerImport\Model\Profile\Profiles;

class ProfileManager
{
    protected $objectManager;

    public function __construct(
        ObjectManagerInterface $objectManager
    ) {
        $this->objectManager = $objectManager;
    }

    public function getAllProfiles()
    {
        return Profiles::PROFILES_LIST;
    }

    public function profileExist($profileName)
    {
        return !empty(Profiles::PROFILES_LIST[$profileName]);
    }

    public function getImportClass($profileName)
    {
        $importClass = Profiles::PROFILES_LIST[$profileName]['class'];
        return $this->objectManager->get($importClass);
    }
}
