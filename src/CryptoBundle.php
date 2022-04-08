<?php
    
    namespace ICS\CryptoBundle;
    
    use Symfony\Component\DependencyInjection\ContainerBuilder;
    use Symfony\Component\HttpKernel\Bundle\Bundle;
    
    class CryptoBundle extends Bundle
    {
        public function build(ContainerBuilder $builder)
        {
        }
        
        public function getPath(): string
        {
            return \dirname(__DIR__);    
        }
    }