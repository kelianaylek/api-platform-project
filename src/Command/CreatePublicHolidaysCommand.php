<?php
// src/Command/CreatePublicHolidaysCommand.php
namespace App\Command;

use App\Entity\Country;
use App\Entity\PublicHolidays;
use App\Repository\CountryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

// the name of the command is what users type after "php bin/console"
#[AsCommand(name:'app:create:publicHolidays')]
class CreatePublicHolidaysCommand extends Command
{
    private HttpClientInterface $client;
    private EntityManagerInterface $entityManager;
    private CountryRepository $countryRepository;

    public function __construct(HttpClientInterface $client, EntityManagerInterface $entityManager, CountryRepository $countryRepository)
    {
        parent::__construct();
        $this->client = $client;
        $this->entityManager = $entityManager;
        $this->countryRepository = $countryRepository;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $countries = $this->countryRepository->findAll();

        foreach ($countries as $country){
            $response = $this->client->request(
                'GET',
                'https://date.nager.at/api/v3/NextPublicHolidays/' . $country->getCountryCode()
            );
            $content = $response->toArray();

            $publicHolidays = new PublicHolidays();

            $publicHolidays->setName($content[0]['name']);
            $publicHolidays->setDate(new \DateTime($content[0]['date']));
            $publicHolidays->setLocalName($content[0]['localName']);
            $publicHolidays->setCountry($country);
            $publicHolidays->setGlobal($content[0]['global']);
            $publicHolidays->setFixed($content[0]['fixed']);
            $publicHolidays->setLaunchYear($content[0]['launchYear']);

            $this->entityManager->persist($publicHolidays);
            $this->entityManager->flush();
        }

        $output->writeln('Public holidays successfully generated!');

        return Command::SUCCESS;

    }
    protected static $defaultDescription = 'Creates countries list.';
}

