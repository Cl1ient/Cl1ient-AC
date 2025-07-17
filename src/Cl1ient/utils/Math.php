<?php

namespace Cl1ient\utils;

use pocketmine\entity\effect\VanillaEffects;
use pocketmine\item\enchantment\VanillaEnchantments;
use pocketmine\math\Vector3;
use pocketmine\player\Player;
use function ceil;
use function max;
use function min;
use function sqrt;
class Math
{
    public static function distance(Vector3 $from, Vector3 $to) : float {
        return sqrt((($from->getX() - $to->getX()) ** 2) + (($from->getY() - $to->getY()) ** 2) + (($from->getZ() - $to->getZ()) ** 2));
    }
}