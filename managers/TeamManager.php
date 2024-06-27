<?php

class TeamManager extends AbstractManager{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll():array{
        $query = $this->db->prepare(
            "SELECT 
                *
            FROM teams
            "
        );
        $query->execute();
        $teams = $query->fetchAll(PDO::FETCH_ASSOC);
        $teamsClass = [];
        $tag = 0;
        foreach($teams as $team){
            $teamsClass[] = new Team($team["name"], $team["description"]);
            $teamsClass[$tag]->setID($team["id"]);
            $mm = new MediaManager();
            $logo = $mm->findById($team["logo"]);
            $teamsClass[$tag]->setLogo($logo);
        }
        return $teamsClass;
    }

    public function findById(int $id):? Team{
        $query = $this->db->prepare(
            "SELECT
                *
            FROM teams
            WHERE $id = :id"
        );
        $parameters = [
            "id"=>$id
        ];
        $query->execute($parameters);
        if($query->rowCount() >=1){
            $team = $query->fetch(PDO::FETCH_ASSOC);
            $teamClass = new Team($team["name"], $team["description"]);
            $team->setId($team["id"]);
            $mm = new MediaManager();
            $logo = $mm->findById($team["logo"]);
            $teamClass->setLogo($logo);
            return $teamClass;
        }else{
            return null;
        }
    }
}