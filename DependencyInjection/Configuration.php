<?php

namespace Opensoft\RolloutBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        if (method_exists('\Symfony\Component\Config\Definition\Builder\TreeBuilder', 'getRootNode')) {
            $treeBuilder = new TreeBuilder('opensoft_rollout');
            $rootNode = $treeBuilder->getRootNode();
        } else {
            $treeBuilder = new TreeBuilder();
            $rootNode = $treeBuilder->root('opensoft_rollout');
        }

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        $rootNode
            ->children()
                ->scalarNode('user_provider_service')->isRequired()->end()
                ->scalarNode('storage_service')->defaultValue('Opensoft\Rollout\Storage\ArrayStorage')->end()
            ->end();

        return $treeBuilder;
    }
}
