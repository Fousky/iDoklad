<?php

namespace Fousky\Component\iDoklad\Tests\Model\EdgeCases;

use Fousky\Component\iDoklad\Model\BankAccounts\BankAccountPostApiModel;
use Fousky\Component\iDoklad\Model\Contacts\ContactPostApiModel;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;

class LengthConstraintsTest extends TestCase
{
    private $validator;

    protected function setUp(): void
    {
        $this->validator = Validation::createValidatorBuilder()
            ->enableAttributeMapping()
            ->getValidator();
    }

    public function testLengthMinBoundary(): void
    {
        $model = new BankAccountPostApiModel();
        $model->AccountNumber = ''; // min: 0, should pass
        $model->CurrencyId = 1;

        $violations = $this->validator->validate($model);
        $this->assertEquals(0, count($violations), 'Empty string should pass min:0 constraint');
    }

    public function testLengthMaxBoundary(): void
    {
        $model = new BankAccountPostApiModel();
        $model->AccountNumber = str_repeat('a', 50); // max: 50, should pass
        $model->CurrencyId = 1;

        $violations = $this->validator->validate($model);
        $this->assertEquals(0, count($violations), 'String of max length should pass');
    }

    public function testLengthExceedsMax(): void
    {
        $model = new BankAccountPostApiModel();
        $model->AccountNumber = str_repeat('a', 51); // max: 50, should fail
        $model->CurrencyId = 1;

        $violations = $this->validator->validate($model);
        $this->assertGreaterThan(0, count($violations), 'String exceeding max length should fail');
    }

    public function testLengthWithNotBlank(): void
    {
        $model = new ContactPostApiModel();
        $model->CompanyName = str_repeat('a', 200); // max: 200, should pass
        $model->CountryId = 1;

        $violations = $this->validator->validate($model);
        $this->assertEquals(0, count($violations), 'String at max length with NotBlank should pass');
    }

    public function testLengthExceedsMaxWithNotBlank(): void
    {
        $model = new ContactPostApiModel();
        $model->CompanyName = str_repeat('a', 201); // max: 200, should fail
        $model->CountryId = 1;

        $violations = $this->validator->validate($model);
        $this->assertGreaterThan(0, count($violations), 'String exceeding max length should fail');
    }

    public function testSwiftMaxLength(): void
    {
        $model = new BankAccountPostApiModel();
        $model->Swift = str_repeat('a', 11); // max: 11, should pass
        $model->CurrencyId = 1;

        $violations = $this->validator->validate($model);
        $this->assertEquals(0, count($violations), 'Swift at max length should pass');
    }

    public function testSwiftExceedsMax(): void
    {
        $model = new BankAccountPostApiModel();
        $model->Swift = str_repeat('a', 12); // max: 11, should fail
        $model->CurrencyId = 1;

        $violations = $this->validator->validate($model);
        $this->assertGreaterThan(0, count($violations), 'Swift exceeding max length should fail');
    }
}

