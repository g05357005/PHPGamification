<?php
/**
 * Created by PhpStorm.
 * User: TiagoGouvea
 * Date: 09/08/15
 * Time: 11:13
 */

namespace TiagoGouvea\PHPGamification\Model;

use TiagoGouvea\PHPGamification;

class UserAlert extends Entity
{
    protected $idUser;
    protected $idBadge;
    protected $idLevel;

    public function __construct($stdClass = null)
    {
        if ($stdClass) {
            $this->fillAtributes($stdClass, $this);
        }
    }

    public function getIdLevel()
    {
        return $this->idLevel;
    }

    /**
     * @return Event
     * @throws \Exception
     */
    public function getEvent()
    {
        return PHPGamification::getInstance()->getEventById($this->idEvent);
    }

    public function getIdBadge()
    {
        return $this->idBadge;
    }

    /**
     * @return Badge
     * @throws \Exception
     */
    public function getBadge()
    {
        return PHPGamification::getInstance()->getBadge($this->idBadge);
    }
}
