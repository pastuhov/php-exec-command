<?php
namespace pastuhov\Command;

/**
 * Command.
 */
final class Command
{
    private function __construct()
    {
    }

    /**
     * Execute command with params.
     *
     * @param string $command
     * @param array  $params
     *
     * @return bool|string
     *
     * @throws \Exception
     */
    public static function exec($command, array $params = array(), $mergeStdErr=true)
    {
        if (empty($command)) {
            throw new \InvalidArgumentException('Command line is empty');
        }

        $command = self::bindParams($command, $params);

        if ($mergeStdErr) {
            // Redirect stderr to stdout to include it in $output
            $command .= ' 2>&1';
        }

        exec($command, $output, $code);

        if (count($output) === 0) {
            $output = $code;
        } else {
            $output = implode(PHP_EOL, $output);
        }

        if ($code !== 0) {
            throw new CommandException($command, $output, $code);
        }

        return $output;
    }

    /**
     * Bind params to command.
     *
     * @param string $command
     * @param array  $params
     *
     * @return string
     */
    public static function bindParams($command, array $params)
    {
        $wrappers = array();
        $converters = array();
        foreach ($params as $key => $value) {

            // Escaped
            $wrappers[] = '{' . $key . '}';
            $converters[] = escapeshellarg(is_array($value) ? implode(' ', $value) : $value);

            // Unescaped
            $wrappers[] = '{!' . $key . '!}';
            $converters[] = is_array($value) ? implode(' ', $value) : $value;
        }

        return str_replace($wrappers, $converters, $command);
    }
}
