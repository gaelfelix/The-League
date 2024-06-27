<?php

class Game{
    private ? int $id = null;
    private Team $team_1;
    private Team $team_2;
    private Team $winner;
    public function __construct(
        private string $name,
        private string $date
    )
    {
        
    }
    public function getId():int{
        return $this->id;
    }

    public function setId(int $id):void{
        $this->id = $id;
    }

    /**
     * Get the value of team_1
     */
    public function getTeam1(): Team
    {
        return $this->team_1;
    }

    /**
     * Set the value of team_1
     */
    public function setTeam1(Team $team_1): void
    {
        $this->team_1 = $team_1;
    }

    /**
     * Get the value of team_2
     */
    public function getTeam2(): Team
    {
        return $this->team_2;
    }

    /**
     * Set the value of team_2
     */
    public function setTeam2(Team $team_2): void
    {
        $this->team_2 = $team_2;
    }

    /**
     * Get the value of winner
     */
    public function getWinner(): Team
    {
        return $this->winner;
    }

    /**
     * Set the value of winner
     */
    public function setWinner(Team $winner): void
    {
        $this->winner = $winner;
    }

    /**
     * Get the value of name
     */
    public function getName(): string
    {
            return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName(string $name): void
    {
            $this->name = $name;
    }

    /**
     * Get the value of date
     */
    public function getDate(): string
    {
            return $this->date;
    }

    /**
     * Set the value of date
     */
    public function setDate(string $date): void
    {
            $this->date = $date;
    }
}