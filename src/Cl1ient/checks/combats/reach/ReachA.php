<?php

namespace Cl1ient\checks\combats\reach;

use Cl1ient\checks\Checks;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\Event;
use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;
use pocketmine\network\mcpe\NetworkSession;

use Cl1ient\utils\Math;



class ReachA
{
    public function getCheck() : string
    {
        return "REACH";
    }

    public function getCheckType() : string
    {
        return "A";
    }
    public function checkJustEvent(Event $event): void {

        if (!$event instanceof EntityDamageByEntityEvent) return;

        $entity = $event->getEntity();
        $damager = $event->getDamager();
        $ping = $damager->getNetworkSession()->getPing();
        if (!$entity instanceof Player || !$damager instanceof Player) return;


        if (!$damager->isSurvival() || !$entity->isSurvival()) return;


        $locEntity = $entity->getLocation();
        $locDamager = $damager->getLocation();

        $deltaY = max(0, $locEntity->getY() - $locDamager->getY());
        $distance = Math::distance($locEntity, $locDamager) - $deltaY;
        $tolerance = ($ping / 1000) * 4 + 0.1;

        if ($distance > 3.0 + $tolerance){
            $damager->sendMessage(TextFormat::RED . $this->getCheck() . " ".TextFormat::BLUE . "CHECK " .$this->getCheckType() ." " . TextFormat::RED . $distance . "/3" . "PING : " . $ping );
        }
    }



}