<?php
declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $container) {

    $container->services()
        ->set('ergnuor.table_data_gateway.registry', \Ergnuor\TableDataGateway\Registry::class)
            ->args([
                service('ergnuor.table_data_gateway.serializer'),
                service('ergnuor.criteria.config_builder'),
                tagged_locator('ergnuor.criteria.field_expression_mapper'),
            ])

        ->alias(\Ergnuor\TableDataGateway\RegistryInterface::class, 'ergnuor.table_data_gateway.registry')

    ;
};
