<?php

namespace Fake\ChasterObjects\Objects\Interfaces;

interface SessionInterface extends LockSessionInterface
{
    public function getSessionId(): ?string;

    public function setSessionId(?string $sessionId);

    public static function normalizeToSessionId(SessionInterface|string|null $session): ?string;
}
