<?php
namespace pastuhov\Command;

class CommandException extends \RuntimeException
{
    protected $command;
    protected $output;
    protected $returnCode;

    public function __construct($command, $output, $returnCode)
    {
        $this->command = $command;
        $this->output = $output;
        $this->returnCode = $returnCode;

        if ($this->returnCode == 127) {
            $message = 'Command not found: "' . $this->getCommand() . '"';
        } else {
            $message = 'Command "' . $this->getCommand() . '" exited with code ' . $this->getReturnCode() . ': ' . $this->getOutput();
        }

        parent::__construct($message);
    }

    public function getCommand()
    {
        return $this->command;
    }

    public function getOutput()
    {
        return $this->output;
    }

    public function getReturnCode()
    {
        return $this->returnCode;
    }
}
