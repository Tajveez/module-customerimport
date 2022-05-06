<?php

/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Tajveez\CustomerImport\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Tajveez\CustomerImport\Model\Profile\ProfileManager;

class ProfilesList extends Command
{
    protected $profilesManager;

    public function __construct(ProfileManager $profilesManager)
    {
        parent::__construct();
        $this->profilesManager = $profilesManager;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ) {
        $profilesList = $this->profilesManager->getAllProfiles();
        $output->writeln("\n<info>List of all Import Profiles:</info>\n");

        foreach ($profilesList as $profileName => $profileData) {
            $description = $profileData['description'];
            $output->writeln("<comment>$profileName</comment>: $description");
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName("customer:import:profiles-list");
        $this->setDescription("List of all Available Import Profiles");
        parent::configure();
    }
}
