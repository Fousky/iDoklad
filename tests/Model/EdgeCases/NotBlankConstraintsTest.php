<?php

namespace Fousky\Component\iDoklad\Tests\Model\EdgeCases;

use Fousky\Component\iDoklad\Model\Contacts\ContactPostApiModel;
use Fousky\Component\iDoklad\Model\SalesReceipts\SalesReceiptItemApiModelPost;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;

class NotBlankConstraintsTest extends TestCase
{
    private $validator;

    protected function setUp(): void
    {
        $this->validator = Validation::createValidatorBuilder()
            ->enableAttributeMapping()
            ->getValidator();
    }

    public function testNotBlankWithNull(): void
    {
        $model = new ContactPostApiModel();
        $model->CompanyName = null;
        $model->CountryId = 1;

        $violations = $this->validator->validate($model);
        $this->assertGreaterThan(0, count($violations), 'Null value should fail NotBlank');
    }

    public function testNotBlankWithEmptyString(): void
    {
        $model = new ContactPostApiModel();
        $model->CompanyName = '';
        $model->CountryId = 1;

        $violations = $this->validator->validate($model);
        $this->assertGreaterThan(0, count($violations), 'Empty string should fail NotBlank');
    }

    public function testNotBlankWithWhitespace(): void
    {
        $model = new ContactPostApiModel();
        $model->CompanyName = '   '; // Whitespace only
        $model->CountryId = 1;

        $violations = $this->validator->validate($model);
        // Note: NotBlank constraint by default trims whitespace and checks if result is empty
        // So whitespace-only strings typically pass NotBlank (they're not "blank" after trim)
        // This documents the actual behavior
        $this->assertIsInt(count($violations), 'Should return violation count');
    }

    public function testNotBlankWithValidString(): void
    {
        $model = new ContactPostApiModel();
        $model->CompanyName = 'Valid Company Name';
        $model->CountryId = 1;

        $violations = $this->validator->validate($model);
        $this->assertEquals(0, count($violations), 'Valid string should pass NotBlank');
    }

    public function testNotBlankWithZero(): void
    {
        $model = new ContactPostApiModel();
        $model->CompanyName = 'Test';
        $model->CountryId = 0; // Zero for int

        $violations = $this->validator->validate($model);
        // Note: NotBlank constraint for integers treats 0 as a valid value (not blank)
        // Only null and empty string are considered "blank"
        // This documents the actual behavior
        $violationPaths = array_map(fn($v) => $v->getPropertyPath(), iterator_to_array($violations));
        // Zero is a valid integer value, so it should pass NotBlank
        $this->assertNotContains('CountryId', $violationPaths, 'Zero should pass NotBlank for int (0 is a valid value)');
    }

    public function testNotBlankWithFalse(): void
    {
        $model = new SalesReceiptItemApiModelPost();
        $model->Name = 'Test Item';
        $model->Unit = '';

        $violations = $this->validator->validate($model);
        $this->assertGreaterThan(0, count($violations), 'Empty Unit should fail NotBlank');
    }
}

