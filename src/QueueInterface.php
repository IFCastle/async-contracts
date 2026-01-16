<?php

declare(strict_types=1);

namespace IfCastle\Async;

/**
 * @template T
 */
interface QueueInterface
{
    /**
     * @param T $value
     */
    public function pushAsync(mixed $value): void;

    /**
     * @param T $value
     * @return FutureInterface<null>
     */
    public function pushWithPromise(mixed $value): FutureInterface;

    /**
     * @param T $value
     */
    public function push(mixed $value): void;

    /**
     * @return ConcurrentIteratorInterface<T>
     */
    public function getIterator(): ConcurrentIteratorInterface;

    /**
     * @return bool True if the queue has been completed or errored.
     */
    public function isComplete(): bool;

    /**
     * @return bool True if the queue has been disposed.
     */
    public function isDisposed(): bool;

    /**
     * Completes the queue.
     */
    public function complete(): void;

    /**
     * Errors the queue with the given reason.
     */
    public function error(\Throwable $reason): void;
}
