<?php

namespace Cl1ient;

use Cl1ient\checks\combats\reach\ReachA;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use Cl1ient\checks\Checks;

class Cl1ientAC extends PluginBase implements Listener
{


    public function onEnable(): void{
        $this->getLogger()->notice("Enabled Cl1ient AC");
        $this->checks = new Checks($this);
        $this->checks->loadChecks();
    }
    public function onDisable(): void {
        $this->getLogger()->notice("Plugin désactivé");
    }



}