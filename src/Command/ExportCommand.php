<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use App\Service\ExportService;
use App\Controller\ExportController;


class ExportCommand extends Command
{
    protected static $defaultName = 'app:export-history';
    
    private $ExportService;

    public function __construct(ExportService $ExportService)
    {
        $this->ExportService = $ExportService;

        parent::__construct();
    }

    protected function configure()
    {
        $this

            ->setDescription('Exports the question history table.')

            ->setHelp('This command allows you to Export the question history table...');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // $export = new ExportController();
        // $export->exportCSVAction();
        $this->ExportService->exportCSVAction();
        $output->write('uou will find the exported file under C:');
        return 0;
    }
}
