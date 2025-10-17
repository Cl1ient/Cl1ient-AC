<?php

namespace Cl1ient\checks;

use Cl1ient\checks\combats\CombatsFactory;
use Cl1ient\listener\CheckListener;
use pocketmine\plugin\Plugin;


class Checks {


    private CombatsFactory $combatsFactory;
    private Plugin $plugin;

    public function __construct(Plugin $plugin) {
        $this->plugin = $plugin;
    }

    public function loadAllChecks(): void {
       $this->combatsFactory = new CombatsFactory();
       $this->combatsFactory->loadChecks();
       $listener = new CheckListener($this);
        $this->plugin->getServer()->getPluginManager()->registerEvents($listener, $this->plugin);
    }

    public function getChecks(): array {
        return $this->combatsFactory->getChecks();
    }
}
