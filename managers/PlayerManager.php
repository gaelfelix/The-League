<?php

class PlayerManager extends AbstractManager
{

    public function __construct()
    {
        parent::__construct();
    }

    public function findAll() : array
    {
        $query = $this->db->prepare('SELECT * FROM players');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $players = [];

        foreach($result as $item)
        {
            $player = new Player($item["nickname"], $item["bio"]);
            $player->setId($item["id"]);
            $mm = new MediaManager();
            $portrait = $mm->findById($player["portrait"]);
            $player->setPortrait($portrait);
            $player->setTeam($item["team"]);
            $players[] = $player;
        }

        return $players;
    }

    public function findOne(int $id) : ? Player
    {
        $query = $this->db->prepare('SELECT * FROM players WHERE id=:id');
        $parameters = [
            "id" => $id
        ];
        $query->execute($parameters);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if($result)
        {
            $player = new Player($result["nickname"], $result["bio"]);
            $player->setId($result["id"]);
            $mm = new MediaManager();
            $portrait = $mm->findById($result["portrait"]);
            $player->setPortrait($portrait);
            $tm = new TeamManager();
            $team = $tm->findById($result["team"]);
            $player->setTeam($team);

            return $player;
        }

        return null;
    }

    public function findByTeam(int $teamId) : array
    {
        $query = $this->db->prepare('SELECT players.id, players.nickname, players.bio, players.portrait, players.team  FROM players 
        JOIN teams ON teams.id=players.team
        WHERE teams.id=:teamId');
        $parameters = [
            "teamId" => $teamId
        ];
        $query->execute($parameters);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $players = [];
        $tag = 0;

        foreach($result as $item){
            $players[]=new Player($item["nickname"], $item["bio"]);
            $players[$tag]->setId($item["id"]);
            $mm = new MediaManager();
            $portrait = $mm->findById($item["portrait"]);
            $players[$tag]->setPortrait($portrait);
            $tm = new TeamManager();
            $team = $tm->findById($item["team"]);
            $players[$tag]->setTeam($team);
        }
        var_dump($players);
        return $players;
    }
}