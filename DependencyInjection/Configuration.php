<?php
namespace Spoort\Bundle\Symfony2EconomicBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('symfony2_economic');
        $rootNode
            ->children()
                ->scalarNode('agreement')->defaultValue(null)->end()
                ->scalarNode('username')->defaultValue(null)->end()
                ->scalarNode('password')->defaultValue(null)->end()
                ->scalarNode('url')->defaultValue(null)->end()
            ->end();

        return $treeBuilder;
    }
}