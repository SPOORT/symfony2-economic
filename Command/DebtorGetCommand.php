<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class DebtorGetCommand extends ContainerAwareCommand
{
    /**
     * Configure
     */
    protected function configure()
    {
        $this
            ->setName('economic:debtor:read')
            ->setDescription('Read all debtors or those who\'s ID is provided with comma separator')
            ->addArgument(
                'ids',
                InputArgument::OPTIONAL,
                'List of debtor IDs'
            );
    }

    /**
     * Execute
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $ids = $input->getArgument('ids');
        if ($ids) {
            $output->writeln('Fetching debtors for provided IDs: ' . $ids);
        }

        $output->writeln('DONE');
    }
}