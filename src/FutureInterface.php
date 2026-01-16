<?php

declare(strict_types=1);

namespace IfCastle\Async;

/**
 * @template T
 */
interface FutureInterface
{
    public function isComplete(): bool;

    public function ignore(): void;

    /**
     * @return T
     */
    public function await(?CancellationInterface $cancellation = null): mixed;

    /**
     * Attaches a callback that is invoked if this future completes. The returned future is completed with the return
     * value of the callback, or errors with an exception thrown from the callback.
     *
     * @template TReturn
     * @param callable(T): TReturn $mapper
     * @return FutureInterface<TReturn>
     */
    public function map(callable $mapper): FutureInterface;

    /**
     * Attaches a callback that is invoked if this future errors.
     *
     * @template TReturn
     * @param callable(\Throwable): TReturn $onRejected
     * @return FutureInterface<TReturn>
     */
    public function catch(callable $onRejected): static;

    /**
     * Attaches a callback that is always invoked when the future is completed.
     *
     * @return FutureInterface<T>
     */
    public function finally(callable $onFinally): static;
}
