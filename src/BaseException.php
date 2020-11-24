<?php


namespace Smoren\ExtendedExceptions;


use Exception;
use Throwable;

/**
 * Class BaseException
 * @package Smoren\ExtendedExceptions
 */
class BaseException extends Exception implements ExtendedExceptionInterface
{
    /**
     * @var array Exception extended data
     */
    protected $data;
    /**
     * @var array Exception debug data
     */
    protected $debugData;

    /**
     * @param Throwable $e
     * @param array $debugData
     * @return array
     */
    public static function extendDebugData(Throwable $e, array $debugData = []): array
    {
        $debugData['class'] = get_class($e);
        $debugData['message'] = $e->getMessage();
        $debugData['line'] = $e->getLine();
        $debugData['code'] = $e->getCode();
        $debugData['file'] = $e->getFile();
        $debugData['trace'] = explode("\n", $e->getTraceAsString());

        return $debugData;
    }

    /**
     * ExtendedExceptionInterface constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     * @param array $data
     * @param array $debugData
     */
    public function __construct(string $message, int $code, Throwable $previous = null, array $data = [], array $debugData = [])
    {
        parent::__construct($message, $code, $previous);
        $this->data = $data;
        $this->debugData = $debugData;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return array
     */
    public function getDebugData(): array
    {
        return static::extendDebugData($this, $this->debugData);
    }
}