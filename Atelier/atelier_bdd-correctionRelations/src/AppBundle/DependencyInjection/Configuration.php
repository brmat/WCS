<?php

namespace AppBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author Laetitia Serre
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('app');

        $rootNode
            ->children()
                ->scalarNode('main_host')->cannotBeEmpty()->end()
                ->scalarNode('mailer_sender_name')->cannotBeEmpty()->end()
                ->scalarNode('mailer_sender_email')->cannotBeEmpty()->end()
                ->scalarNode('default_platform')->defaultNull()->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
