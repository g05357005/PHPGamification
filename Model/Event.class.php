<?php
/**
 * Created by PhpStorm.
 * User: TiagoGouvea
 * Date: 13/06/15
 * Time: 09:45
 */

namespace TiagoGouvea\PHPGamification\Model;

use Exception;

class Event extends Entity
{
    protected $id = null;
    protected $alias = null;              /* Event alias */
    protected $description = null;        /* Event description */

    protected $reachRequiredRepetitions = null;        /* Trigger counter (null = triggers every execution. $allowRepetitions must be true, otherwise triggers once) */
    protected $allowRepetitions = true;  /* Allows reachRequiredRepetitions (Default: YES) */
    protected $maxPoints = null;          /* Max points granted for this event */

    protected $idEachBadge = null;        /* Badge granted when triggers */
    protected $idReachBadge = null;       /* Badge granted when triggers */
    protected $eachPoints = null;         /* Points granted every time event called */
    protected $reachPoints = null;        /* Points granted when reachRequiredRepetitions are reached */
    protected $eachCallback = null;
    protected $reachCallback = null;

    protected $combinable = null;

    // Added By AWIE
    // save and array to have multiple reach of repetion with the same event
    /*
        in database this will save an array()
        key     : required repetition
        value   : idBadges
    */

    protected $multipleReachRequiredRepetitions = null;        /* Trigger counter (null = triggers every execution. $allowRepetitions must be true, otherwise triggers once) */

    function __construct($stdClass = null)
    {
        if ($stdClass)
            $this->fillAtributes($stdClass, $this);
    }

    public function getBadge()
    {
        return $this->badge;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getAlias()
    {
        return $this->alias;
    }

    public function getEachCallback()
    {
        return $this->eachCallback;
    }

    public function getReachCallback()
    {
        return $this->reachCallback;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getMaxPoints()
    {
        return $this->maxPoints;
    }

    public function getEachPoints()
    {
        return $this->eachPoints;
    }

    public function getReachPoints()
    {
        return $this->reachPoints;
    }

    public function getRequiredRepetitions()
    {
        return $this->reachRequiredRepetitions;
    }

    public function getIdEachBadge()
    {
        return $this->idEachBadge;
    }

    public function getIdReachBadge()
    {
        return $this->idReachBadge;
    }

    public function getAllowRepetitions()
    {
        return $this->allowRepetitions;
    }

    public function getReachMultipleRequiredRepetition()
    {
        return $this->multipleReachRequiredRepetitions;
    }

    public function getCombinable()
    {
        return $this->combinable;
    }

     /**
     * @param  array $array
     * @return Event
     * @throws Exception
     */

    public function setReachMultipleRequiredRepetition( $array )
    {
        // print( $array );die();
        if (!is_array($array)) throw new Exception(__METHOD__ . ': Invalid format');
        $this->multipleReachRequiredRepetitions = serialize( $array );
        return $this;
    }

    /**
     * @param $bool
     * @return Event
     * @throws Exception
     */
    public function setAllowRepetitions($bool)
    {
        if (!is_bool($bool)) throw new Exception(__METHOD__ . ': Invalid AllowRepetitions');
        $this->allowRepetitions = $bool;
        return $this;
    }

    /**
     * @param Badge $badge
     * @return Event
     */
    public function setEachBadgeGranted(Badge $badge)
    {
        $this->idEachBadge = $badge->getId();
        return $this;
    }

    /**
     * @param Badge $badge
     * @return Event
     */
    public function setReachBadgeGranted(Badge $badge)
    {
        $this->idReachBadge = $badge->getId();
        return $this;
    }

    /**
     * @param int $id_badge
     * @return Event
     */
    public function setIdBadgeGranted($id_badge)
    {
        $this->idEachBadge = $id_badge;
        return $this;
    }

    /**
     * @param $str
     * @return Event
     */
    public function setDescription($str)
    {
        $this->description = $str;
        return $this;
    }

    /**
     * @param $str
     * @return Event
     */
    public function setAlias($str)
    {
        $this->alias = $str;
        return $this;
    }

    /**
     * @param $callback
     * @return Event
     * @throws Exception
     */
    public function setEachCallback($callback)
    {
        if (!is_callable($callback))
            throw new Exception(__METHOD__ . ': Invalid EachCallback function: '.print_r($callback,true));
        $this->eachCallback = ($callback);
        return $this;
    }

    /**
     * @param $callback
     * @return Event
     * @throws Exception
     */
    public function setReachCallback($callback)
    {
        if (!is_callable($callback))
            throw new Exception(__METHOD__ . ': Invalid EventCallback function: '.print_r($callback,true));
        $this->reachCallback = ($callback);
        return $this;
    }

    /**
     * @param $f
     * @return Event
     * @throws Exception
     */
    public function setId($f)
    {
        if (!is_numeric($f)) throw new Exception(__METHOD__ . ': Invalid id');

        $this->id = $f;

        return $this;
    }

    /**
     * @param $n
     * @return Event
     * @throws Exception
     */
    public function setMaxPointsGranted($n)
    {
        if (!is_numeric($n)) throw new Exception(__METHOD__ . ': Invalid points');
        $this->maxPoints = $n;
        return $this;
    }

    /**
     * @param $n
     * @return Event
     * @throws Exception
     */
    public function setEachPointsGranted($n)
    {
        if (!is_numeric($n)) throw new Exception(__METHOD__ . ': Invalid points');
        $this->eachPoints = $n;
        return $this;
    }

    public function setReachPointsGranted($n)
    {
        if (!is_numeric($n)) throw new Exception(__METHOD__ . ': Invalid points');
        $this->reachPoints = $n;
        return $this;
    }

    /**
     * @param $n
     * @return Event
     * @throws Exception
     */
    public function setReachRequiredRepetitions($n)
    {
        if (!is_numeric($n)) throw new Exception(__METHOD__ . ': Invalid reachRequiredRepetitions');
        $this->reachRequiredRepetitions = $n;
        return $this;
    }

    /**
     * @param $n
     * @return Event
     * @throws Exception
     */
    public function setCombinable($n)
    {
        if (!is_numeric($n)) throw new Exception(__METHOD__ . ': Invalid combinable value');
        $this->combinable = $n;
        return $this;
    }

}