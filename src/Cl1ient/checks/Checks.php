<?php

namespace Cl1ient\checks;

use Cl1ient\checks\combats\reach\ReachA;
use Cl1ient\listener\CheckListener;
use pocketmine\event\Event;
use pocketmine\plugin\Plugin;

class Checks {


    private $checks = [];
    private $plugin;

    public function __construct(Plugin $plugin) {
        $this->plugin = $plugin;
    }

    public function loadChecks(): void {
        $this->checks[] = new ReachA();
        // Ajoute ici tous tes autres checks si tu veux

        // Enregistre le listener global
        $listener = new CheckListener($this);
        $this->plugin->getServer()->getPluginManager()->registerEvents($listener, $this->plugin);
    }

    public function getChecks(): array {
        return $this->checks;
    }
    public function checkEvent(Event $event): void {

    }




}