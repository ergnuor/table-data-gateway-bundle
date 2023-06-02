<?php

declare(strict_types=1);

namespace Ergnuor\TableDataGatewayBundle\DependencyInjection\Compiler;

use Ergnuor\SerializerBundle\DependencyInjection\Compiler\SerializerTrait;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class SerializerPass implements CompilerPassInterface
{
    use SerializerTrait;

    public function process(ContainerBuilder $container)
    {
        $this->configureDoctrineEntityNormalizer($container);

        $this->setNormalizers(
            $container,
            'ergnuor.table_data_gateway.serializer',
            'ergnuor.table_data_gateway.serializer.normalizer'
        );
    }

    private function configureDoctrineEntityNormalizer(ContainerBuilder $container): void
    {
        $doctrineEntityNormalizer = $container->getDefinition('ergnuor.table_data_gateway.serializer.normalizer.doctrine_entity');

        if (!$container->hasParameter('doctrine.entity_managers')) {
            $doctrineEntityNormalizer
                ->clearTag('ergnuor.table_data_gateway.serializer.normalizer');
        }
    }
}
