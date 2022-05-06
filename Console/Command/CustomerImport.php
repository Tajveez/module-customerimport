<?php

/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Tajveez\CustomerImport\Console\Command;

use Magento\Framework\Console\Cli;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Tajveez\CustomerImport\Model\ImportManager;

class CustomerImport extends Command
{

    const PROFILE_NAME = "profile-name";
    const FILE_PATH = "file-path";

    protected $importManager;

    public function __construct(ImportManager $importManager)
    {
        parent::__construct();
        $this->importManager = $importManager;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ) {
        $profileName = $input->getArgument(self::PROFILE_NAME);
        $filePath = $input->getArgument(self::FILE_PATH);

        try {
            $this->importManager->executeImport($profileName, $filePath);

            $output->writeln("<comment>Import process has been done successfully</comment>");
            return Cli::RETURN_SUCCESS;
        } catch (\Throwable $th) {

            $errorMsg = $th->getMessage();
            $output->writeln("<error>$errorMsg</error>");
            return Cli::RETURN_FAILURE;
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName("customer:import");
        $this->setDescription("Import Customers using different Files & Profiles");
        $this->setDefinition([
            new InputArgument(self::PROFILE_NAME, InputArgument::REQUIRED, "Import Profile Type"),
            new InputArgument(self::FILE_PATH, InputArgument::REQUIRED, "Path to Import File")
        ]);
        parent::configure();
    }
}
