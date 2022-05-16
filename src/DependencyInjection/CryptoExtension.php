<?php

    namespace ICS\CryptoBundle\DependencyInjection;

    use Symfony\Component\Config\FileLocator;
    use Symfony\Component\DependencyInjection\ContainerBuilder;
    use Symfony\Component\DependencyInjection\Extension\Extension;
    use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
    use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

    class CryptoExtension extends Extension implements PrependExtensionInterface
    {
        public function load(array $configs, ContainerBuilder $container)
        {
            $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../../config/'));
            $loader->load('services.yaml');

            $configuration = new Configuration();
            $configs = $this->processConfiguration($configuration,$configs);

            $container->setParameter('crypto',$configs);
        }

        public function prepend(ContainerBuilder $container)
        {
            $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../../config/'));
            // Loading security config
            $loader->load('security.yaml');
            // Loading doctrine config
            $loader->load('doctrine.yaml');
            // Loading specific bundle config
            $bundles = $container->getParameter('kernel.bundles');
            if(isset($bundles['NavigationBundle']))
            {
                $loader->load('navigation.yaml');
            }
            

            // if (isset($bundles['LiipImagineBundle'])) {
            //     $loader->load('liip_imagine.yaml');
            // }

            //$loader->load('api_platform.yaml');

            // if (isset($bundles['DoctrineBundle'])) {
            //     $loader->load('doctrine.yaml');
            // }

            // if (isset($bundles['DashboardBundle'])) {
            //     $loader->load('dashboard.yaml');
            // }
        }
    }
    