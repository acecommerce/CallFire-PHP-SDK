<?php

namespace CallFire\Common\Resource;

class CallRecord extends ActionRecord
{

    /**
     * @var dateTime
     */
    protected $originateTime = null;

    /**
     * @var dateTime
     */
    protected $answerTime = null;

    /**
     * @var int
     */
    protected $duration = null;

    public function getOriginateTime()
    {
        return $this->originateTime;
    }

    public function setOriginateTime($originateTime)
    {
        $this->originateTime = $originateTime;

        return $this;
    }

    public function getAnswerTime()
    {
        return $this->answerTime;
    }

    public function setAnswerTime($answerTime)
    {
        $this->answerTime = $answerTime;

        return $this;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

}
