<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Oms;

use Pyz\Zed\Oms\Communication\Plugin\Command\Demo\PayCommand;
use Pyz\Zed\Oms\Communication\Plugin\Condition\Demo\IsAuthorizedCondition;
use Pyz\Zed\Oms\Communication\Plugin\Oms\InitiationTimeoutProcessorPlugin;
use Spryker\Zed\Availability\Communication\Plugin\AvailabilityHandlerPlugin;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Oms\Communication\Plugin\Oms\Command\SendOrderConfirmationPlugin;
use Spryker\Zed\Oms\Communication\Plugin\Oms\Command\SendOrderShippedPlugin;
use Spryker\Zed\Oms\Dependency\Plugin\Command\CommandCollectionInterface;
use Spryker\Zed\Oms\Dependency\Plugin\Condition\ConditionCollectionInterface;
use Spryker\Zed\Oms\Dependency\Plugin\ReservationHandlerPluginInterface;
use Spryker\Zed\Oms\OmsDependencyProvider as SprykerOmsDependencyProvider;
use Spryker\Zed\OmsExtension\Dependency\Plugin\OmsManualEventGrouperPluginInterface;
use Spryker\Zed\OmsExtension\Dependency\Plugin\OmsOrderMailExpanderPluginInterface;
use Spryker\Zed\OmsExtension\Dependency\Plugin\ReservationAggregationStrategyPluginInterface;
use Spryker\Zed\OmsExtension\Dependency\Plugin\TimeoutProcessorPluginInterface;
use Spryker\Zed\ProductBundle\Communication\Plugin\Oms\ProductBundleAvailabilityHandlerPlugin;
use Spryker\Zed\ProductPackagingUnit\Communication\Plugin\Oms\ProductPackagingUnitReservationAggregationStrategyPlugin;
use Spryker\Zed\ProductPackagingUnit\Communication\Plugin\Reservation\LeadProductReservationHandlerPlugin;
use Spryker\Zed\SalesInvoice\Communication\Plugin\Oms\GenerateOrderInvoiceCommandPlugin;
use Spryker\Zed\SalesReturn\Communication\Plugin\Oms\Command\StartReturnCommandPlugin;
use Spryker\Zed\Shipment\Dependency\Plugin\Oms\ShipmentManualEventGrouperPlugin;
use Spryker\Zed\Shipment\Dependency\Plugin\Oms\ShipmentOrderMailExpanderPlugin;

class OmsDependencyProvider extends SprykerOmsDependencyProvider
{
    public const FACADE_TRANSLATOR = 'FACADE_TRANSLATOR';

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container->extend(self::COMMAND_PLUGINS, function (CommandCollectionInterface $commandCollection) {
            $commandCollection->add(new SendOrderConfirmationPlugin(), 'Oms/SendOrderConfirmation');
            $commandCollection->add(new SendOrderShippedPlugin(), 'Oms/SendOrderShipped');
            $commandCollection->add(new StartReturnCommandPlugin(), 'Return/StartReturn');
            $commandCollection->add(new GenerateOrderInvoiceCommandPlugin(), 'Invoice/Generate');
            $commandCollection->add(new PayCommand(), 'Demo/Pay');

            return $commandCollection;
        });

        $container->extend(self::CONDITION_PLUGINS, function (ConditionCollectionInterface $conditionCollection) {
            $conditionCollection->add(new IsAuthorizedCondition(), 'Demo/IsAuthorized');

            return $conditionCollection;
        });

        return $container;
    }

    /**
     * @param Container $container
     *
     * @return ReservationHandlerPluginInterface[]
     */
    protected function getReservationHandlerPlugins(Container $container): array
    {
        return [
            new AvailabilityHandlerPlugin(),
            new ProductBundleAvailabilityHandlerPlugin(),
            new LeadProductReservationHandlerPlugin(),
        ];
    }

    /**
     * @param Container $container
     *
     * @return OmsOrderMailExpanderPluginInterface[]
     */
    protected function getOmsOrderMailExpanderPlugins(Container $container): array
    {
        return [
            new ShipmentOrderMailExpanderPlugin(),
        ];
    }

    /**
     * @param Container $container
     *
     * @return OmsManualEventGrouperPluginInterface[]
     */
    protected function getOmsManualEventGrouperPlugins(Container $container): array
    {
        return [
            new ShipmentManualEventGrouperPlugin(),
        ];
    }

    /**
     * @return ReservationAggregationStrategyPluginInterface[]
     */
    protected function getReservationAggregationStrategyPlugins(): array
    {
        return [
            new ProductPackagingUnitReservationAggregationStrategyPlugin(),
        ];
    }

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        $container = parent::provideCommunicationLayerDependencies($container);
        $container = $this->addTranslatorFacade($container);

        return $container;
    }

    /**
     * @param Container $container
     *
     * @return Container
     */
    protected function addTranslatorFacade(Container $container): Container
    {
        $container->set(static::FACADE_TRANSLATOR, function (Container $container) {
            return $container->getLocator()->translator()->facade();
        });

        return $container;
    }

    /**
     * @return TimeoutProcessorPluginInterface[]
     */
    protected function getTimeoutProcessorPlugins(): array
    {
        return [
            new InitiationTimeoutProcessorPlugin(),
        ];
    }
}
