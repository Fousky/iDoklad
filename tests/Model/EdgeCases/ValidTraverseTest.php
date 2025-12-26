<?php

namespace Fousky\Component\iDoklad\Tests\Model\EdgeCases;

use Doctrine\Common\Collections\ArrayCollection;
use Fousky\Component\iDoklad\Model\SalesReceipts\SalesReceiptApiModelPost;
use Fousky\Component\iDoklad\Model\SalesReceipts\SalesReceiptItemApiModelPost;
use Fousky\Component\iDoklad\Model\SalesReceipts\SalesReceiptPaymentApiModelPost;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;

class ValidTraverseTest extends TestCase
{
    private $validator;

    protected function setUp(): void
    {
        $this->validator = Validation::createValidatorBuilder()
            ->enableAttributeMapping()
            ->getValidator();
    }

    public function testValidTraverseWithInvalidNestedObject(): void
    {
        $item = new SalesReceiptItemApiModelPost();
        $item->Name = ''; // Invalid - should fail NotBlank
        $item->Unit = 'ks';

        $payment = new SalesReceiptPaymentApiModelPost();
        $payment->PaymentOptionId = 1;
        $payment->PaymentTransactionCode = 'TEST123';

        $model = new SalesReceiptApiModelPost();
        $model->ExternalDocumentNumber = 'TEST123';
        $model->SalesReceiptItems = new ArrayCollection([$item]);
        $model->SalesReceiptPayments = new ArrayCollection([$payment]);

        $violations = $this->validator->validate($model);
        $this->assertGreaterThan(0, count($violations), 'Invalid nested object should be caught by Valid(traverse:true)');
    }

    public function testValidTraverseWithValidNestedObjects(): void
    {
        $item = new SalesReceiptItemApiModelPost();
        $item->Name = 'Valid Item';
        $item->Unit = 'ks';

        $payment = new SalesReceiptPaymentApiModelPost();
        $payment->PaymentOptionId = 1;
        $payment->PaymentTransactionCode = 'TEST123';

        $model = new SalesReceiptApiModelPost();
        $model->ExternalDocumentNumber = 'TEST123';
        $model->SalesReceiptItems = new ArrayCollection([$item]);
        $model->SalesReceiptPayments = new ArrayCollection([$payment]);

        $violations = $this->validator->validate($model);
        $this->assertEquals(0, count($violations), 'Valid nested objects should pass Valid(traverse:true)');
    }

    public function testValidTraverseWithMultipleInvalidNestedObjects(): void
    {
        $item1 = new SalesReceiptItemApiModelPost();
        $item1->Name = ''; // Invalid
        $item1->Unit = 'ks';

        $item2 = new SalesReceiptItemApiModelPost();
        $item2->Name = 'Valid Item';
        $item2->Unit = ''; // Invalid

        $payment = new SalesReceiptPaymentApiModelPost();
        $payment->PaymentOptionId = 0; // Invalid - should be > 0
        $payment->PaymentTransactionCode = 'TEST123';

        $model = new SalesReceiptApiModelPost();
        $model->ExternalDocumentNumber = 'TEST123';
        $model->SalesReceiptItems = new ArrayCollection([$item1, $item2]);
        $model->SalesReceiptPayments = new ArrayCollection([$payment]);

        $violations = $this->validator->validate($model);
        $this->assertGreaterThan(0, count($violations), 'Multiple invalid nested objects should be caught');
    }
}

