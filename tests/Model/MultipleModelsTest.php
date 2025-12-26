<?php

namespace Fousky\Component\iDoklad\Tests\Model;

use Fousky\Component\iDoklad\Model\BankAccounts\BankAccountPostApiModel;
use Fousky\Component\iDoklad\Model\IssuedInvoices\IssuedInvoiceApiModelInsertV2;
use Fousky\Component\iDoklad\Model\SalesReceipts\SalesReceiptApiModelPost;
use PHPUnit\Framework\TestCase;

class MultipleModelsTest extends TestCase
{
    /**
     * @dataProvider modelClassesProvider
     */
    public function testModelClassesHaveAttributes(string $modelClass): void
    {
        $reflection = new \ReflectionClass($modelClass);
        $properties = $reflection->getProperties();
        $hasAttributes = false;

        foreach ($properties as $property) {
            if (count($property->getAttributes()) > 0) {
                $hasAttributes = true;
                break;
            }
        }

        $this->assertTrue($hasAttributes, "Model class {$modelClass} should have at least one property with attributes");
    }

    public function testModelClassesCanBeInstantiated(): void
    {
        $modelClasses = [
            SalesReceiptApiModelPost::class,
            BankAccountPostApiModel::class,
            IssuedInvoiceApiModelInsertV2::class,
        ];

        foreach ($modelClasses as $modelClass) {
            $model = new $modelClass();
            $this->assertInstanceOf($modelClass, $model);
        }
    }

    public static function modelClassesProvider(): array
    {
        return [
            [SalesReceiptApiModelPost::class],
            [BankAccountPostApiModel::class],
            [IssuedInvoiceApiModelInsertV2::class],
        ];
    }
}

