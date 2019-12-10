<?php
declare(strict_types=1);

namespace Fooman\PHPStan;

use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\ClassMemberReflection;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Reflection\TrivialParametersAcceptor;
use PHPStan\Type\MixedType;
use PHPStan\Type\Type;

/**
 * Class MagentoMagicMethodReflection
 * @package Fooman\PHPStan
 */
class MagentoMagicMethodReflection implements MethodReflection
{
    /** @var string */
    private $name;

    /** @var \PHPStan\Reflection\ClassReflection */
    private $dataObject;

    /**
     * MagentoMagicMethodReflection constructor.
     *
     * @param ClassReflection $dataObj
     * @param string $name
     */
    public function __construct(ClassReflection $dataObj, string $name)
    {
        $this->dataObject = $dataObj;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return ClassReflection
     */
    public function getDeclaringClass(): ClassReflection
    {
        return $this->dataObject;
    }

    /**
     * @return ClassMemberReflection
     */
    public function getPrototype(): ClassMemberReflection
    {
        return $this;
    }

    /**
     * @return bool
     */
    public function isStatic(): bool
    {
        return false;
    }

    /**
     * @return \PHPStan\Reflection\ParameterReflection[]
     */
    public function getParameters(): array
    {
        return [];
    }

    /**
     * @return bool
     */
    public function isVariadic(): bool
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isPrivate(): bool
    {
        return false;
    }

    /**
     * @return bool
     */
    public function isPublic(): bool
    {
        return true;
    }

    /**
     * @return Type
     */
    public function getReturnType(): Type
    {
        return new MixedType(true);
    }

    /**
     * @return array
     */
    public function getVariants(): array
    {
        return [
            new TrivialParametersAcceptor(),
        ];
    }

    public function getDocComment(): ?string
    {
        return $this->dataObject->getMethod($this->getName())->getDocComment();
    }

    public function isDeprecated(): \PHPStan\TrinaryLogic
    {
        return $this->dataObject->getMethod($this->getName())->isDeprecated();
    }

    public function getDeprecatedDescription(): ?string
    {
        return $this->dataObject->getMethod($this->getName())->getDeprecatedDescription();
    }

    public function isFinal(): \PHPStan\TrinaryLogic
    {
        return \PHPStan\TrinaryLogic::createNo();
    }

    public function isInternal(): \PHPStan\TrinaryLogic
    {
        return \PHPStan\TrinaryLogic::createNo();
    }

    public function getThrowType(): ?\PHPStan\Type\Type
    {
        return $this->dataObject->getMethod($this->getName())->getThrowType();
    }

    public function hasSideEffects(): \PHPStan\TrinaryLogic
    {
        return \PHPStan\TrinaryLogic::createYes();
    }
}
