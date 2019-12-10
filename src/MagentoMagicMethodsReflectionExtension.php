<?php
declare(strict_types=1);

namespace Fooman\PHPStan;

use Magento\Framework\DataObject;
use Magento\Framework\Session\SessionManager;
use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Reflection\MethodsClassReflectionExtension;

/**
 * Class MagentoMagicMethodsReflectionExtension
 * @package Fooman\PHPStan
 */
class MagentoMagicMethodsReflectionExtension implements MethodsClassReflectionExtension
{
    /**
     * @param ClassReflection $classReflection
     * @param string $methodName
     * @return bool
     */
    public function hasMethod(ClassReflection $classReflection, string $methodName): bool
    {
        if( $classReflection->getName() == DataObject::class || $classReflection->isSubclassOf(DataObject::class)){
            $magentoMagicMethods = ['get', 'set', 'uns', 'has'];
            return in_array(substr($methodName, 0, 3), $magentoMagicMethods);
        }

        if( $classReflection->getName() == SessionManager::class || $classReflection->isSubclassOf(SessionManager::class)){
            $magentoMagicMethods = ['get', 'set', 'uns', 'has'];
            return in_array(substr($methodName, 0, 3), $magentoMagicMethods);
        }
        return false;
    }

    /**
     * @param ClassReflection $classReflection
     * @param string $methodName
     * @return MethodReflection
     */
    public function getMethod(ClassReflection $classReflection, string $methodName): MethodReflection
    {
        return new MagentoMagicMethodReflection($classReflection, $methodName);
    }
}
