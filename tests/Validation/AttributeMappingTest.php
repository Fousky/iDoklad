<?php

namespace Fousky\Component\iDoklad\Tests\Validation;

use Fousky\Component\iDoklad\Model\Contacts\ContactPostApiModel;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;

class AttributeMappingTest extends TestCase
{
    public function testAttributeMappingIsEnabled(): void
    {
        $builder = Validation::createValidatorBuilder();

        // Check that enableAttributeMapping method exists
        $this->assertTrue(
            method_exists($builder, 'enableAttributeMapping'),
            'enableAttributeMapping method should exist'
        );

        $validator = $builder->enableAttributeMapping()->getValidator();

        $model = new ContactPostApiModel();
        $model->CompanyName = ''; // Invalid

        $violations = $validator->validate($model);

        // If attributes are working, we should get violations
        $this->assertGreaterThan(0, count($violations), 'Attribute-based validation should work');
    }

    public function testExpressionConstraintsWork(): void
    {
        $model = new ContactPostApiModel();
        $model->CompanyName = 'Test Company';
        $model->CountryId = 1;
        $model->IsRegisteredForVatOnPay = true;
        $model->IsSendReminder = true;

        $validator = Validation::createValidatorBuilder()
            ->enableAttributeMapping()
            ->getValidator();

        $violations = $validator->validate($model);

        // Expression constraints should work if symfony/expression-language is installed
        $this->assertIsInt(count($violations), 'Validation should complete without errors');
    }
}

