<?php
namespace TelegramBot\Api\Test;

use PHPUnit\Framework\TestCase;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\Types\File;

class FileTest extends TestCase
{
    public function testGetFileId()
    {
        $item = new File();
        $item->setFileId('testfileId');
        $this->assertSame('testfileId', $item->getFileId());
    }

    public function testGetFileSize()
    {
        $item = new File();
        $item->setFileSize(6);
        $this->assertSame(6, $item->getFileSize());
    }

    public function testGetFilePath()
    {
        $item = new File();
        $item->setFilePath('testfilepath');
        $this->assertSame('testfilepath', $item->getFilePath());
    }

    public function testFromResponse()
    {
        $item = File::fromResponse([
            'file_id' => 'testFileId1',
            'file_size' => 3,
            'file_path' => 'testfilepath'
        ]);

        $this->assertInstanceOf(File::class, $item);
        $this->assertSame('testFileId1', $item->getFileId());
        $this->assertSame(3, $item->getFileSize());
        $this->assertSame('testfilepath', $item->getFilePath());
    }

    public function testFromResponseException()
    {
        $this->expectException(InvalidArgumentException::class);

        File::fromResponse([
            'file_size' => 3,
            'file_path' => 'testfilepath'
        ]);
    }

    public function testSetFileSizeException()
    {
        $this->expectException(InvalidArgumentException::class);

        $item = new File();
        $item->setFileSize('s');
    }
}
