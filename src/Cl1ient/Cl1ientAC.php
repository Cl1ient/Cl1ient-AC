<?php

namespace Cl1ient;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use Cl1ient\checks\Checks;

class Cl1ientAC extends PluginBase implements Listener
{
    private Checks $checks;

    public function onEnable(): void {
        $this->getLogger()->notice("Enabled Cl1ient AC !");

        $this->checks = new Checks($this);
        $this->checks->loadAllChecks();

        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("Cl1ient AC enabled !");
    }


    public function onDisable(): void {
        $this->getLogger()->notice("Plugin désactivé");
    }
}
