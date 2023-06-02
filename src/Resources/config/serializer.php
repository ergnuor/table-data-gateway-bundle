<?php
declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Symfony\Component\Serializer\Serializer;

return static function (ContainerConfigurator $container) {

    $container->services()
        ->set('ergnuor.table_data_gateway.serializer', Serializer::class)
            ->args([[], [service('serializer.encoder.json')]])

        // normalizers

        ->set('ergnuor.table_data_gateway.serializer.denormalizer.unwrapping')
            ->parent('serializer.denormalizer.unwrapping')
            ->tag('ergnuor.table_data_gateway.serializer.normalizer', ['priority' => 2000])

        ->set('ergnuor.table_data_gateway.serializer.normalizer.collection')
            ->parent('ergnuor.serializer.normalizer.collection')
            ->tag('ergnuor.table_data_gateway.serializer.normalizer', ['priority' => 1800])

        ->set('ergnuor.table_data_gateway.serializer.normalizer.doctrine_entity')
            ->parent('ergnuor.serializer.normalizer.doctrine_entity')
            ->tag('ergnuor.table_data_gateway.serializer.normalizer', ['priority' => 1600])

        ->set('ergnuor.table_data_gateway.serializer.normalizer.backed_enum')
            ->parent('serializer.normalizer.backed_enum')
            ->tag('ergnuor.table_data_gateway.serializer.normalizer', ['priority' => 1400])

        ->set('ergnuor.table_data_gateway.serializer.normalizer.json_serializable')
            ->parent('serializer.normalizer.json_serializable')
            ->tag('ergnuor.table_data_gateway.serializer.normalizer', ['priority' => 1200])

        ->set('ergnuor.table_data_gateway.serializer.normalizer.datetime')
            ->parent('ergnuor.serializer.normalizer.datetime')
            ->tag('ergnuor.table_data_gateway.serializer.normalizer', ['priority' => 1000])

        ->set('ergnuor.table_data_gateway.serializer.normalizer.datetimezone')
            ->parent('serializer.normalizer.datetimezone')
            ->tag('ergnuor.table_data_gateway.serializer.normalizer', ['priority' => 800])

        ->set('ergnuor.table_data_gateway.serializer.normalizer.dateinterval')
            ->parent('serializer.normalizer.dateinterval')
            ->tag('ergnuor.table_data_gateway.serializer.normalizer', ['priority' => 600])

        ->set('ergnuor.table_data_gateway.serializer.normalizer.data_uri')
            ->parent('serializer.normalizer.data_uri')
            ->tag('ergnuor.table_data_gateway.serializer.normalizer', ['priority' => 400])

        ->set('ergnuor.table_data_gateway.serializer.denormalizer.array')
            ->parent('serializer.denormalizer.array')
            ->tag('ergnuor.table_data_gateway.serializer.normalizer', ['priority' => 200])

        ->set('ergnuor.table_data_gateway.serializer.normalizer.object')
            ->parent('ergnuor.serializer.normalizer.object')
            ->tag('ergnuor.table_data_gateway.serializer.normalizer', ['priority' => 0])

    ;
};
