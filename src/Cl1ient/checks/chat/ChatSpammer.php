<?php

namespace Cl1ient\checks\chat;


use pocketmine\event\player\PlayerChatEvent;
use pocketmine\utils\TextFormat;

class ChatSpammer {

    private array $cooldowns = [];

    public function chatSpam(PlayerChatEvent $event) : bool  {
        $player = $event->getPlayer();


        $name = $player->getName();
        $currentTime = microtime(true);

        if (isset($this->cooldowns[$name])) {
            $timeLeft = $this->cooldowns[$name] - $currentTime;
            if ($timeLeft > 0) {
                $player->sendMessage(TextFormat::RED . "Vous devez attendre encore " . round($timeLeft, 1) . " secondes avant d'utiliser de nouveau le chat");
                $event->cancel();

                return true;
            }
        }

        $this->cooldowns[$name] = $currentTime + 2;

        return false;
    }
}
