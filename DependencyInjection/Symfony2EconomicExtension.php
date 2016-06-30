<?php
namespace Spoort\Bundle\Symfony2EconomicBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class ClubAccountEconomicExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        $loader->load('services.yml');

        $container->setParameter('symfony2_economic.enabled', $config['enabled']);
        $container->setParameter('symfony2_economic.agreement', $config['agreement']);
        $container->setParameter('symfony2_economic.username', $config['username']);
        $container->setParameter('symfony2_economic.password', $config['password']);
        $container->setParameter('symfony2_economic.url', $config['url']);
    }
}