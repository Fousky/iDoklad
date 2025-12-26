<?php

namespace Fousky\Component\iDoklad\Tests\Model\EdgeCases;

use Fousky\Component\iDoklad\Model\SalesReceipts\SalesReceiptPaymentApiModelPost;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;

class GreaterThanConstraintsTest extends TestCase
{
    private $validator;

    protected function setUp(): void
    {
        $this->validator = Validation::createValidatorBuilder()
            ->enableAttributeMapping()
            ->getValidator();
    }

    public function testGreaterThanWithZero(): void
    {
        $model = new SalesReceiptPaymentApiModelPost();
        $model->PaymentOptionId = 0; // Should fail GreaterThan(0)
        $model->PaymentTransactionCode = 'TEST123';

        $violations = $this->validator->validate($model);
        $violationPaths = array_map(fn($v) => $v->getPropertyPath(), iterator_to_array($violations));
        $this->assertContains('PaymentOptionId', $violationPaths, 'Zero should fail GreaterThan(0)');
    }

    public function testGreaterThanWithNegative(): void
    {
        $model = new SalesReceiptPaymentApiModelPost();
        $model->PaymentOptionId = -1; // Should fail GreaterThan(0)
        $model->PaymentTransactionCode = 'TEST123';

        $violations = $this->validator->validate($model);
        $violationPaths = array_map(fn($v) => $v->getPropertyPath(), iterator_to_array($violations));
        $this->assertContains('PaymentOptionId', $violationPaths, 'Negative value should fail GreaterThan(0)');
    }

    public function testGreaterThanWithOne(): void
    {
        $model = new SalesReceiptPaymentApiModelPost();
        $model->PaymentOptionId = 1; // Should pass GreaterThan(0)
        $model->PaymentTransactionCode = 'TEST123';

        $violations = $this->validator->validate($model);
        $violationPaths = array_map(fn($v) => $v->getPropertyPath(), iterator_to_array($violations));
        $this->assertNotContains('PaymentOptionId', $violationPaths, 'One should pass GreaterThan(0)');
    }

    public function testGreaterThanWithLargeValue(): void
    {
        $model = new SalesReceiptPaymentApiModelPost();
        $model->PaymentOptionId = 999999; // Should pass GreaterThan(0)
        $model->PaymentTransactionCode = 'TEST123';

        $violations = $this->validator->validate($model);
        $violationPaths = array_map(fn($v) => $v->getPropertyPath(), iterator_to_array($violations));
        $this->assertNotContains('PaymentOptionId', $violationPaths, 'Large value should pass GreaterThan(0)');
    }
}

