<?php
namespace Cl1ient\ac;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener {

    public function onEnable(): void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN . "AC plugin activated");
    }

    public function onDisable(): void {
        $this->getLogger()->info(TextFormat::RED ."AC plugin disabled");
    }


    public function onJoin(PlayerJoinEvent $event): void {
        $player = $event->getPlayer();
        $message = "Bienvenue sur le serveur !";
        $player->sendMessage(TextFormat::RED . $message);
        $this->getLogger()->info((TextFormat::BLUE . "Message envoyé à ") . $player->getName());
    }
}