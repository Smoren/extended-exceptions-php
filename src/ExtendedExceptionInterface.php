<?php

namespace Smoren\ExtendedExceptions;

use Throwable;

/**
 * Interface ExtendedExceptionInterface
 * @package Smoren\ExtendedExceptions
 */
interface ExtendedExceptionInterface
{
    /**
     * @param Throwable $e
     * @param array $debugData
     * @return array
     */
    public static function extendDebugData(Throwable $e, array $debugData = []): array;

    /**
     * ExtendedExceptionInterface constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     * @param array $data
     * @param array $debugData
     */
    public function __construct(string $message, int $code, Throwable $previous = null, array $data = [], array $debugData = []);

    /**
     * @return array
     */
    public function getData(): array;

    /**
     * @return array
     */
    public function getDebugData(): array;
}
