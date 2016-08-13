<?php
namespace pastuhov\Command\Test;

use pastuhov\Command\Command;

/**
 * Class CommandTest.
 */
class CommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Simple exec.
     */
    public function testExec()
    {
        $output = Command::exec(
            'echo {phrase}',
            [
                'phrase' => [
                    'hello',
                    'wor' . 'ld',
                ],
            ]
        );

        $this->assertEquals('hello world', $output);
    }

    /**
     * Test exec exception.
     */
    public function testExecException()
    {
        $this->setExpectedException('pastuhov\Command\CommandException');

        $output = Command::exec(
            'echo111'
        );
    }

    /**
     * Test exec empty command.
     */
    public function testExecEmptyCommand()
    {
        $this->setExpectedException('InvalidArgumentException');

        $output = Command::exec(
            ''
        );
    }

    /**
     * Test that arguments are escaped by default
     */
    public function testArgumentsEscapedByDefault()
    {
        $output = Command::exec(
            'echo {phrase}',
            [
                'phrase' => 'hello $PATH',
            ]
        );

        $this->assertEquals('hello $PATH', $output);
    }

    /**
     * Test that unescaped arguments can be passed
     */
    public function testUnescapedArguments()
    {
        $output = Command::exec(
            'echo {!phrase!}',
            [
                'phrase' => 'hello $PATH',
            ]
        );

        $this->assertRegexp('/\//', $output);
    }
}
