<?php

namespace Cl1ient;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

class Cl1ientAC extends PluginBase implements Listener
{
    public function onEnable(): void {
        $this->getLogger()->notice("Plugin activé");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onDisable(): void {
        $this->getLogger()->notice("Plugin désactivé");
    }
}