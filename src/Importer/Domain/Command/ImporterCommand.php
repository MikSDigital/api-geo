<?php
declare(strict_types = 1);

namespace App\Importer\Domain\Command;

use App\Importer\Domain\Service\ImportDataService;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class ImporterCommand extends ContainerAwareCommand
{
    private $importService;

    public function configure()
    {
        $this
            ->setName('app:import')
            ->setDescription('Imports SIMC, TERC, ULIC data');
    }

    public function initialize(InputInterface $input, OutputInterface $output)
    {
        $csvPath = $this->getContainer()->get('kernel')->getRootDir() . '/..' . getenv('CSV_GEO_DATA_PATH');

        $this->importService = new ImportDataService(
            $this->getContainer()->get('doctrine')->getManager(),
            $csvPath,
            $input,
            $output
        );
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        return $this->importService->execute();
    }
}
