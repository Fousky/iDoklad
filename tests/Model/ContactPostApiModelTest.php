<?php

namespace Fousky\Component\iDoklad\Tests\Model;

use Fousky\Component\iDoklad\Model\Contacts\ContactPostApiModel;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;

class ContactPostApiModelTest extends TestCase
{
    public function testAutoloading(): void
    {
        $model = new ContactPostApiModel();
        $this->assertInstanceOf(ContactPostApiModel::class, $model);
    }

    public function testAttributesAreRecognized(): void
    {
        $reflection = new \ReflectionClass(ContactPostApiModel::class);
        $property = $reflection->getProperty('CompanyName');
        $attributes = $property->getAttributes();

        $this->assertGreaterThan(0, count($attributes), 'Attributes should be found on CompanyName property');

        $attributeNames = array_map(fn($attr) => $attr->getName(), $attributes);
        $this->assertContains('Symfony\Component\Validator\Constraints\NotBlank', $attributeNames);
        $this->assertContains('Symfony\Component\Validator\Constraints\Length', $attributeNames);
    }

    public function testValidationWithInvalidData(): void
    {
        $model = new ContactPostApiModel();
        $model->CompanyName = ''; // Should fail NotBlank validation
        $model->CountryId = null; // Should fail NotBlank validation

        $validator = Validation::createValidatorBuilder()
            ->enableAttributeMapping()
            ->getValidator();

        $violations = $validator->validate($model);

        $this->assertGreaterThan(0, count($violations), 'Validation should find violations for invalid data');

        $propertyPaths = [];
        foreach ($violations as $violation) {
            $propertyPaths[] = $violation->getPropertyPath();
        }

        $this->assertContains('CompanyName', $propertyPaths);
        $this->assertContains('CountryId', $propertyPaths);
    }

    public function testValidationWithValidData(): void
    {
        $model = new ContactPostApiModel();
        $model->CompanyName = 'Test Company';
        $model->CountryId = 1;

        $validator = Validation::createValidatorBuilder()
            ->enableAttributeMapping()
            ->getValidator();

        $violations = $validator->validate($model);

        $this->assertEquals(0, count($violations), 'Valid model should pass validation');
    }

    public function testModelValidateMethod(): void
    {
        $model = new ContactPostApiModel();
        $model->CompanyName = ''; // Invalid

        $violations = $model->validate();

        $this->assertGreaterThan(0, count($violations), 'Model validate() method should find violations');
    }
}

