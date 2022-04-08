<?php

    namespace ICS\CryptoBundle\DependencyInjection;

    use Symfony\Component\Config\Definition\ConfigurationInterface;
    use Symfony\Component\Config\Definition\Builder\TreeBuilder;

    class Configuration implements ConfigurationInterface
    {

        public function getConfigTreeBuilder()
        {
            $treeBuilder = new TreeBuilder('crypto');
            //$treeBuilder->getRootNode()->children()
            //    ->scalarNode('path')->defaultValue('medias')->end()
            //;
            return $treeBuilder;
        }
    }
    