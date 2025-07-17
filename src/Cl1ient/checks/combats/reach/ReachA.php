<?php

namespace Cl1ient\checks\combats\reach;

use Cl1ient\checks\Checks;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\Event;
use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;

use Cl1ient\utils\Math;



class ReachA
{
    public function checkJustEvent(Event $event): void {
        if (!$event instanceof EntityDamageByEntityEvent) return;

        $entity = $event->getEntity();
        $damager = $event->getDamager();

        //if (!$entity instanceof Player || !$damager instanceof Player) return;

        // Ignorer si un joueur n'est pas en survie
        if (!$damager->isSurvival() || !$entity->isSurvival()) return;



        $locEntity = $entity->getLocation();
        $locDamager = $damager->getLocation();

        $deltaY = max(0, $locEntity->getY() - $locDamager->getY());
        $distance = Math::distance($locEntity, $locDamager) - $deltaY;

        if ($distance > 3.2) {
            $damager->sendMessage(TextFormat::RED . "REACH :: CHECK A");
        }
    }



}