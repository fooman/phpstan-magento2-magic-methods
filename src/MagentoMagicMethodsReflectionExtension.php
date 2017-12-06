<?php

namespace Fooman\PHPStan;

use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Reflection\MethodsClassReflectionExtension;
use PHPStan\Reflection\BrokerAwareClassReflectionExtension;

class MagentoMagicMethodsReflectionExtension implements MethodsClassReflectionExtension, BrokerAwareClassReflectionExtension
{

    /** @var \PHPStan\Broker\Broker */
    private $broker;

    public function setBroker(\PHPStan\Broker\Broker $broker)
    {
        $this->broker = $broker;
    }

    public function hasMethod(ClassReflection $classReflection, string $methodName): bool
    {
        $magentoMagicMethods = ['get', 'set', 'uns', 'has'];
        return $classReflection->isSubclassOf(\Magento\Framework\DataObject::class)
            && in_array(substr($methodName, 0, 3), $magentoMagicMethods);
    }

    public function getMethod(ClassReflection $classReflection, string $methodName): MethodReflection
    {
        return new MagentoMagicMethodReflection($classReflection, $methodName);
    }

}