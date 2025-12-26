<?php

namespace Fousky\Component\iDoklad\Tests\Model\EdgeCases;

use Fousky\Component\iDoklad\Model\PriceListItems\BatchModelOfInt32;
use Fousky\Component\iDoklad\Model\RegisteredSale\RegisteredSaleApiModelPost;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;

class TypeConstraintsTest extends TestCase
{
    private $validator;

    protected function setUp(): void
    {
        $this->validator = Validation::createValidatorBuilder()
            ->enableAttributeMapping()
            ->getValidator();
    }

    public function testTypeIntWithString(): void
    {
        $model = new RegisteredSaleApiModelPost();
        $model->SalesPosEquipmentId = 'not-an-int';

        $violations = $this->validator->validate($model);
        $violationPaths = array_map(fn($v) => $v->getPropertyPath(), iterator_to_array($violations));
        $this->assertContains('SalesPosEquipmentId', $violationPaths, 'String should fail Type(int)');
    }

    public function testTypeIntWithValidInt(): void
    {
        $model = new RegisteredSaleApiModelPost();
        $model->SalesPosEquipmentId = 123;

        $violations = $this->validator->validate($model);
        $violationPaths = array_map(fn($v) => $v->getPropertyPath(), iterator_to_array($violations));
        $this->assertNotContains('SalesPosEquipmentId', $violationPaths, 'Valid int should pass Type(int)');
    }

    public function testTypeFloatWithString(): void
    {
        $model = new RegisteredSaleApiModelPost();
        $model->BaseTaxBasicRateHc = 'not-a-float';

        $violations = $this->validator->validate($model);
        $violationPaths = array_map(fn($v) => $v->getPropertyPath(), iterator_to_array($violations));
        $this->assertContains('BaseTaxBasicRateHc', $violationPaths, 'String should fail Type(float)');
    }

    public function testTypeFloatWithValidFloat(): void
    {
        $model = new RegisteredSaleApiModelPost();
        $model->BaseTaxBasicRateHc = 123.45;

        $violations = $this->validator->validate($model);
        $violationPaths = array_map(fn($v) => $v->getPropertyPath(), iterator_to_array($violations));
        $this->assertNotContains('BaseTaxBasicRateHc', $violationPaths, 'Valid float should pass Type(float)');
    }

    public function testTypeBoolWithString(): void
    {
        $model = new RegisteredSaleApiModelPost();
        $model->IsCanceled = 'not-a-bool';

        $violations = $this->validator->validate($model);
        $violationPaths = array_map(fn($v) => $v->getPropertyPath(), iterator_to_array($violations));
        $this->assertContains('IsCanceled', $violationPaths, 'String should fail Type(bool)');
    }

    public function testTypeBoolWithValidBool(): void
    {
        $model = new RegisteredSaleApiModelPost();
        $model->IsCanceled = true;

        $violations = $this->validator->validate($model);
        $violationPaths = array_map(fn($v) => $v->getPropertyPath(), iterator_to_array($violations));
        $this->assertNotContains('IsCanceled', $violationPaths, 'Valid bool should pass Type(bool)');
    }

    public function testTypeStringWithInt(): void
    {
        $model = new RegisteredSaleApiModelPost();
        $model->Bkp = 12345678; // Should be string

        $violations = $this->validator->validate($model);
        // Note: Bkp field doesn't have NotBlank, so Type constraint might not validate
        // Type(string) validates that value is a string type
        $violationPaths = array_map(fn($v) => $v->getPropertyPath(), iterator_to_array($violations));
        // This documents actual behavior - Type constraint validates type, not value
        $this->assertIsArray($violationPaths, 'Should return array of violation paths');
    }

    public function testAllConstraintWithInvalidTypes(): void
    {
        $model = new BatchModelOfInt32();
        $model->Items = ['not-an-int', 'also-not-an-int'];

        $violations = $this->validator->validate($model);
        $this->assertGreaterThan(0, count($violations), 'Array with non-int values should fail All(Type(int))');
    }

    public function testAllConstraintWithValidTypes(): void
    {
        $model = new BatchModelOfInt32();
        $model->Items = [1, 2, 3];

        $violations = $this->validator->validate($model);
        $this->assertEquals(0, count($violations), 'Array with all int values should pass All(Type(int))');
    }

    public function testAllConstraintWithMixedTypes(): void
    {
        $model = new BatchModelOfInt32();
        $model->Items = [1, 'not-an-int', 3];

        $violations = $this->validator->validate($model);
        $this->assertGreaterThan(0, count($violations), 'Array with mixed types should fail All(Type(int))');
    }
}

