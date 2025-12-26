<?php

namespace Fousky\Component\iDoklad\Tests\Doctrine;

use Fousky\Component\iDoklad\Doctrine\Traits\iDokladIdTrait;
use PHPUnit\Framework\TestCase;

class iDokladIdTraitTest extends TestCase
{
    public function testDoctrineOrmAttributes(): void
    {
        $trait = new \ReflectionClass(iDokladIdTrait::class);
        $property = $trait->getProperty('idokladId');
        $attributes = $property->getAttributes();

        $this->assertGreaterThan(0, count($attributes), 'Doctrine ORM attributes should be found');

        $attributeNames = array_map(fn($attr) => $attr->getName(), $attributes);
        $this->assertContains('Doctrine\ORM\Mapping\Column', $attributeNames);
    }

    public function testTraitMethods(): void
    {
        $trait = new \ReflectionClass(iDokladIdTrait::class);

        $this->assertTrue($trait->hasMethod('getIdokladId'));
        $this->assertTrue($trait->hasMethod('hasIdokladId'));
        $this->assertTrue($trait->hasMethod('setIdokladId'));
    }
}

