<?php

namespace Betsol\Bundle\SimpleApiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Configuration class.
 *
 * @author Slava Fomin II <s.fomin@betsol.ru>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     * @return TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder;

        $rootNode = $treeBuilder->root('simple_api');

        $rootNode
            ->children()
            ->scalarNode('enable_for_all_controllers')
                ->defaultValue(false)
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}