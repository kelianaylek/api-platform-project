<?php
// src/Command/CreateUserCommand.php
namespace App\Command;

use App\Entity\Country;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

// the name of the command is what users type after "php bin/console"
#[AsCommand(name:'app:create:countries')]
class CreateCountriesCommand extends Command
{
    private HttpClientInterface $client;
    private EntityManagerInterface $entityManager;

    public function __construct(HttpClientInterface $client, EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->client = $client;
        $this->entityManager = $entityManager;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        $response = $this->client->request(
            'GET',
            'https://date.nager.at/api/v3/AvailableCountries'
        );

        $content = $response->toArray();

        foreach ($content as $countryFromApi){
            $country = new Country();

            $response = $this->client->request(
                'GET',
                'https://date.nager.at/api/v3/CountryInfo/' . $countryFromApi['countryCode']
            );
            $content = $response->toArray();

            $country->setCountryCode($countryFromApi['countryCode']);
            $country->setName($countryFromApi['name']);
            $country->setRegion($content['region']);
            $country->setOfficialName($content['officialName']);

            $this->entityManager->persist($country);
            $this->entityManager->flush();
        }

        $output->writeln('Countries successfully generated!');

        return Command::SUCCESS;

    }
    protected static $defaultDescription = 'Creates countries list.';
}

