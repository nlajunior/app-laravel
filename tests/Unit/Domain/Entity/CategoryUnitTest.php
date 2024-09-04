<?php
namespace Tests\Unit\Domain\Entity;

use PHPUnit\Framework\TestCase;
use core\Domain\Entity\Category;
use core\Domain\Exception\EntityValidateException;
use Throwable;
use Ramsey\Uuid\Uuid;

class CategoryUnitTest extends TestCase
{
    public function testAttributes()  {

        $category = new Category(
            id: "yuoookk",
            name: 'New Cat',
            description: 'New Desc',
            isActive:  true
        );

        $this->assertEquals('New Cat', $category->name);
        $this->assertEquals('New Desc', $category->description);
        $this->assertEquals(true, $category->isActive);        
    }

    public function testActivated()
    {
        $category = new Category(
            name: 'New Cat',
            isActive: false,
        );

        $this->assertFalse($category->isActive);
        $category->enable();
        $this->assertTrue($category->isActive);
    }

    public function testDisabled()
    {
        $category = new Category(
            name: 'New Cat',
        );

        $this->assertTrue($category->isActive);
        $category->disable();
        $this->assertFalse($category->isActive);
    }

    public function testUpdate()
    {
        $uuid = 'uuid.value';

        $category = new Category(
            id: $uuid,
            name: 'New Cat',
            description: 'New desc',
            isActive: true,
            //createdAt: '2023-01-01 12:12:12'
        );

        $category->update(
            name: 'new_name',
            description: 'new_desc',
        );

        $this->assertEquals($uuid, $category->id);
        $this->assertEquals('new_name', $category->name);
        $this->assertEquals('new_desc', $category->description);
    }
    // public function testExceptionName()
    // {
    //     try {
    //         new Category(
    //             name: 'Na',
    //             description: 'New Desc'
    //         );

    //         $this->assertTrue(false);
    //     } catch (Throwable $th) {
    //         $this->assertInstanceOf(EntityValidateException::class, $th);
    //     }
    // }
}