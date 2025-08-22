<?php

namespace Cl1ient;

use Cl1ient\checks\chat\ChatSpammer;
use Cl1ient\checks\combats\reach\ReachA;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\server\CommandEvent;
use Cl1ient\checks\Checks;


class Cl1ientAC extends PluginBase implements Listener
{
    private ChatSpammer $chatSpammer;

    public function onEnable(): void{
        $this->getLogger()->notice("Enabled Cl1ient AC");
        $this->checks = new Checks($this);
        $this->checks->loadChecks();
        $this->chatSpammer = new ChatSpammer();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    public function onDisable(): void {
        $this->getLogger()->notice("Plugin désactivé");
    }


    public function onPlayerChat(PlayerChatEvent $event): void{
        if($this->chatSpammer->commandSpam($event)){
            return;
        }
    }



}