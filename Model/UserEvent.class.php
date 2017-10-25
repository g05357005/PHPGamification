<?php
/**
 * Created by PhpStorm.
 * User: TiagoGouvea
 * Date: 09/08/15
 * Time: 11:13
 */

namespace TiagoGouvea\PHPGamification\Model;

class UserEvent extends Entity
{
    protected $idUser;
    protected $idEvent;
    protected $eventCounter = 0;
    protected $pointsCounter = 0;

    public function __construct($stdClass = null)
    {
        if ($stdClass) {
            $this->fillAtributes($stdClass, $this);
        }
    }

    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    public function setIdEvent($idEvent)
    {
        $this->idEvent = $idEvent;
    }


    public function getEventCounter()
    {
        return $this->eventCounter;
    }

    public function getPointsCounter()
    {
        return $this->pointsCounter;
    }

    public function getIdEvent()
    {
        return $this->idEvent;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }
}
