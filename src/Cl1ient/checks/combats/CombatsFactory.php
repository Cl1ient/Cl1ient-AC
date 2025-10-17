<?php

namespace Cl1ient\checks\combats;

use Cl1ient\checks\combats\reach\ReachA;


class CombatsFactory
{
    private array $checks = [];
    public function loadChecks(): void {
        $this->checks[] = new ReachA();
    }

    public function getChecks(): array {
        return $this->checks;
    }
}