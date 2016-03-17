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
     * @param string $commandLine
     * @param array  $params
     *
     * @return bool|string
     *
     * @throws \Exception
     */
    public static function exec($commandLine, array $params = array())
    {
        if (empty($commandLine)) {
            throw new \Exception('Command line is empty');
        }

        $commandLine = self::bindParams($commandLine, $params);

        exec($commandLine, $output, $code);

        if (count($output) === 0) {
            $output = $code;
        } else {
            $output = implode(PHP_EOL, $output);
        }

        if ($code !== 0) {
            throw new \Exception($output . ' Command line: ' . $commandLine);
        }

        return $output;
    }

    /**
     * Bind params to command.
     *
     * @param string $commandLine
     * @param array  $params
     *
     * @return string
     */
    public static function bindParams($commandLine, array $params)
    {
        if (count($params) > 0) {
            $wrapper = function ($string) {
                return '{' . $string . '}';
            };
            $converter = function ($var) {
                if (is_array($var)) {
                    $var = implode(' ', $var);
                }
                
                return $var;
            };

            $commandLine = str_replace(
                array_map(
                    $wrapper,
                    array_keys($params)
                ),
                array_map(
                    $converter,
                    array_values($params)
                ),
                $commandLine
            );
        }

        return $commandLine;
    }
}
