<?php

class Player
{

    private ?int $id = null;
    private Portrait $portrait;
    private Team $team;

    public function __construct(private string $nickname, private string $bio)
    {
        
    }

    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function getPortrait()
    {
        return $this->portrait;
    }

    public function setPortrait($portrait)
    {
        $this->portrait = $portrait;

        return $this;
    }

    public function getTeam()
    {
        return $this->team;
    }

    public function setTeam($team)
    {
        $this->team = $team;

        return $this;
    }

    public function getNickname()
    {
        return $this->nickname;
    }


    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }

    public function getBio()
    {
        return $this->bio;
    }

    public function setBio($bio)
    {
        $this->bio = $bio;

        return $this;
    }



}