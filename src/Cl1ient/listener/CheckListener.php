<?php
namespace Cl1ient\listener;

use pocketmine\event\Listener;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\plugin\Plugin;
use Cl1ient\checks\Checks;
use pocketmine\event\Event;

class CheckListener implements Listener {

    private $checks;

    public function __construct(Checks $checks) {
    $this->checks = $checks;
    }

    public function onDamage(EntityDamageByEntityEvent $event): void {
        foreach ($this->checks->getChecks() as $check) {
            $check->checkJustEvent($event); // Appelle les checks

        }
    }

}