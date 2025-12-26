<?php

namespace Fousky\Component\iDoklad\Tests\Model\EdgeCases;

use Fousky\Component\iDoklad\Model\BankAccounts\BankAccountPostApiModel;
use Fousky\Component\iDoklad\Model\Contacts\ContactPostApiModel;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;

class NullAndEmptyTest extends TestCase
{
    private $validator;

    protected function setUp(): void
    {
        $this->validator = Validation::createValidatorBuilder()
            ->enableAttributeMapping()
            ->getValidator();
    }

    public function testOptionalFieldsCanBeNull(): void
    {
        $model = new ContactPostApiModel();
        $model->CompanyName = 'Test Company';
        $model->CountryId = 1;
        $model->City = null; // Optional field
        $model->Email = null; // Optional field

        $violations = $this->validator->validate($model);
        $this->assertEquals(0, count($violations), 'Optional fields can be null');
    }

    public function testOptionalFieldsCanBeEmptyString(): void
    {
        $model = new ContactPostApiModel();
        $model->CompanyName = 'Test Company';
        $model->CountryId = 1;
        $model->City = ''; // Optional field
        $model->Email = ''; // Optional field

        $violations = $this->validator->validate($model);
        $this->assertEquals(0, count($violations), 'Optional fields can be empty string');
    }

    public function testLengthConstraintAllowsEmptyString(): void
    {
        $model = new BankAccountPostApiModel();
        $model->AccountNumber = ''; // Has Length(min:0), should pass
        $model->CurrencyId = 1;

        $violations = $this->validator->validate($model);
        $this->assertEquals(0, count($violations), 'Length(min:0) should allow empty string');
    }

    public function testNotBlankDoesNotAllowNull(): void
    {
        $model = new ContactPostApiModel();
        $model->CompanyName = null;
        $model->CountryId = 1;

        $violations = $this->validator->validate($model);
        $this->assertGreaterThan(0, count($violations), 'NotBlank should not allow null');
    }

    public function testNotBlankDoesNotAllowEmptyString(): void
    {
        $model = new ContactPostApiModel();
        $model->CompanyName = '';
        $model->CountryId = 1;

        $violations = $this->validator->validate($model);
        $this->assertGreaterThan(0, count($violations), 'NotBlank should not allow empty string');
    }

    public function testUnsetPropertyIsTreatedAsNull(): void
    {
        $model = new ContactPostApiModel();
        $model->CompanyName = 'Test Company';
        $model->CountryId = 1;
        // City is not set at all

        $violations = $this->validator->validate($model);
        // City is optional, so no violations expected
        $violationPaths = array_map(fn($v) => $v->getPropertyPath(), iterator_to_array($violations));
        $this->assertNotContains('City', $violationPaths, 'Unset optional property should not cause violations');
    }
}

