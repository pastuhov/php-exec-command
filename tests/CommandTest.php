<?php
namespace pastuhov\Command\Test;

use pastuhov\Command\Command;

/**
 * Class FileStreamTest
 * @package pastuhov\Command\Test
 */
class FileStreamTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Simple exec
     */
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

    /**
     * Test exec exception
     */
    public function testExecException()
    {
        $this->setExpectedException('Exception');

        $output = Command::exec(
            'echo111'
        );

    }

    /**
     * Test exec empty command
     */
    public function testExecEmptyCommand()
    {
        $this->setExpectedException('Exception');

        $output = Command::exec(
            ''
        );
    }
}
