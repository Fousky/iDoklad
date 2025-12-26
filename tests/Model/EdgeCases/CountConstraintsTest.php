<?php

namespace Fousky\Component\iDoklad\Tests\Model\EdgeCases;

use Doctrine\Common\Collections\ArrayCollection;
use Fousky\Component\iDoklad\Model\PriceListItems\BatchModelOfInt32;
use Fousky\Component\iDoklad\Model\SalesReceipts\SalesReceiptApiModelPost;
use Fousky\Component\iDoklad\Model\SalesReceipts\SalesReceiptItemApiModelPost;
use Fousky\Component\iDoklad\Model\SalesReceipts\SalesReceiptPaymentApiModelPost;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;

class CountConstraintsTest extends TestCase
{
    private $validator;

    protected function setUp(): void
    {
        $this->validator = Validation::createValidatorBuilder()
            ->enableAttributeMapping()
            ->getValidator();
    }

    public function testCountMinWithEmptyArray(): void
    {
        $model = new BatchModelOfInt32();
        $model->Items = [];

        $violations = $this->validator->validate($model);
        $this->assertGreaterThan(0, count($violations), 'Empty array should fail Count(min:1)');
    }

    public function testCountMinWithNull(): void
    {
        $model = new BatchModelOfInt32();
        $model->Items = null;

        $violations = $this->validator->validate($model);
        $this->assertGreaterThan(0, count($violations), 'Null should fail Count(min:1)');
    }

    public function testCountMinWithOneItem(): void
    {
        $model = new BatchModelOfInt32();
        $model->Items = [1];

        $violations = $this->validator->validate($model);
        $this->assertEquals(0, count($violations), 'Array with one item should pass Count(min:1)');
    }

    public function testCountMinWithMultipleItems(): void
    {
        $model = new BatchModelOfInt32();
        $model->Items = [1, 2, 3];

        $violations = $this->validator->validate($model);
        $this->assertEquals(0, count($violations), 'Array with multiple items should pass Count(min:1)');
    }

    public function testSalesReceiptItemsEmptyCollection(): void
    {
        $model = new SalesReceiptApiModelPost();
        $model->ExternalDocumentNumber = 'TEST123';
        $model->SalesReceiptItems = new ArrayCollection([]);
        $model->SalesReceiptPayments = new ArrayCollection([new SalesReceiptPaymentApiModelPost()]);

        $violations = $this->validator->validate($model);
        $this->assertGreaterThan(0, count($violations), 'Empty SalesReceiptItems should fail Count(min:1)');
    }

    public function testSalesReceiptItemsWithOneItem(): void
    {
        $item = new SalesReceiptItemApiModelPost();
        $item->Name = 'Test Item';
        $item->Unit = 'ks';

        $payment = new SalesReceiptPaymentApiModelPost();
        $payment->PaymentOptionId = 1;
        $payment->PaymentTransactionCode = 'TEST123';

        $model = new SalesReceiptApiModelPost();
        $model->ExternalDocumentNumber = 'TEST123';
        $model->SalesReceiptItems = new ArrayCollection([$item]);
        $model->SalesReceiptPayments = new ArrayCollection([$payment]);

        $violations = $this->validator->validate($model);
        $this->assertEquals(0, count($violations), 'SalesReceiptItems with one item should pass');
    }

    public function testSalesReceiptPaymentsEmptyCollection(): void
    {
        $item = new SalesReceiptItemApiModelPost();
        $item->Name = 'Test Item';
        $item->Unit = 'ks';

        $model = new SalesReceiptApiModelPost();
        $model->ExternalDocumentNumber = 'TEST123';
        $model->SalesReceiptItems = new ArrayCollection([$item]);
        $model->SalesReceiptPayments = new ArrayCollection([]);

        $violations = $this->validator->validate($model);
        $this->assertGreaterThan(0, count($violations), 'Empty SalesReceiptPayments should fail Count(min:1)');
    }
}

