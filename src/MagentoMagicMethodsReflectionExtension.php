<?php

namespace Fooman\PHPStan;

use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Reflection\MethodsClassReflectionExtension;

class MagentoMagicMethodsReflectionExtension implements MethodsClassReflectionExtension
{

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