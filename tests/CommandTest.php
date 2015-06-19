<?php
namespace pastuhov\Command\Test;

use pastuhov\Command\Command;

/**
 * Class FileStreamTest
 * @package pastuhov\Command\Test
 */
class FileStreamTest extends \PHPUnit_Framework_TestCase
{
    public function testExec()
    {
        $output = Command::exec(
            'echo {phrase}',
            [
                'phrase' => [
                    'hello',
                    'world'
                ]
            ]
        );

        $this->assertEquals('hello world', $output);
    }

    public function testExecException()
    {
        $this->setExpectedException('Exception');

        $output = Command::exec(
            'echo111'
        );

    }

    public function testExecEmptyCommand()
    {
        $this->setExpectedException('Exception');

        $output = Command::exec(
            ''
        );
    }
}
