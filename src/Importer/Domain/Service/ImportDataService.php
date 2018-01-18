<?php
declare(strict_types = 1);

namespace App\Importer\Domain\Service;

use App\Common\Domain\Model\StringHelper;
use App\Importer\Domain\Dictionary\ImporterDictionary;
use App\Province\Domain\Entity\Province;
use Doctrine\ORM\EntityManager;
use League\Csv\Reader;
use League\Csv\Statement;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

final class ImportDataService
{
    const TERC_FILE_NAME = 'TERC_Urzedowy_2018-01-18.csv';

    private $entityManager;
    private $input;
    private $output;
    private $csvPaths;
    private $symfonyStyle;

    public function __construct(
        EntityManager $entityManager,
        string $csvPaths,
        InputInterface $input,
        OutputInterface $output
    ) {
        $this->entityManager = $entityManager;
        $this->csvPaths = $csvPaths;
        $this->input = $input;
        $this->output = $output;
        $this->symfonyStyle = new SymfonyStyle($input, $output);
    }

    public function execute()
    {
        $this->symfonyStyle->title(ImporterDictionary::TITLE);

        $terc = Reader::createFromPath($this->csvPaths . self::TERC_FILE_NAME, 'r');
        $terc->setDelimiter(';');

        $records = (new Statement())
            ->offset(1)
            ->process($terc, [
                'terc_province',
                'terc_county',
                'terc_commune',
                'type',
                'name',
                'unit',
                'state_by_day'
            ]);
        foreach ($records as $record) {
            if (empty($record['terc_county']) && empty($record['terc_commune'])) {
                $province = new Province();
                $province->setTerc($record['terc_province'] . '00000');
                $province->setName(StringHelper::mb_ucfirst((mb_strtolower($record['name']))));
                $province->setType((int) $record['type']);
                $province->setUnit($record['unit']);
                $province->setStateByDay(date_create_from_format('Y-m-d', $record['state_by_day']));

                $this->entityManager->persist($province);
                $this->entityManager->flush();
            } elseif (empty($record['terc_commune'])) {

            }
        }
    }
}
