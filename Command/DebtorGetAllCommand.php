<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Command;

use Spoort\Bundle\Symfony2EconomicBundle\Service\Debtor as DebtorService;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DebtorGetAllCommand extends ContainerAwareCommand
{
    /**
     * Configure
     */
    protected function configure()
    {
        $this
            ->setName('economic:debtor:get-all')
            ->setDescription('Read all debtors');
    }

    /**
     * Execute
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var DebtorService $debtorService */
        $debtorService = $this->getContainer()->get('symfony2_economic.debtor_service');

        $output->writeln('Start reading all debtors');

        $collection = $debtorService->findAllDebtors();

        foreach ($collection as $c) {
            var_dump($debtorService->getData($c));
        }
    }
}