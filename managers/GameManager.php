<?php

class GameManager extends AbstractManager{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll():array{
        $query = $this->db->prepare(
            "SELECT *
            FROM games"
        );
        $query->execute();
        $games = $query->fetchAll(PDO::FETCH_ASSOC);
        $tag = 0;
        $gamesClass = [];
        foreach($games as $game){
            $gamesClass[]= new Game($game["name"], $game["date"]);
            $gamesClass[$tag]->setId($game["id"]);
        }
        return $gamesClass;
    }

    public function findById(int $id):? Game{
        $query = $this->db->prepare(
            "SELECT *
            FROM games
            WHERE id=:id"
        );
        $parameters=[
            "id"=>$id
        ];
        $query->execute($parameters);
        if($query->rowCount()>=1){
            $game = $query->fetch(PDO::FETCH_ASSOC);
            $gameClass = new Game($game["name"], $game["date"]);
            $gameClass->setId($game["id"]);
            return $gameClass;
        }
        return null;
    }
    
    public function findLast():Game{
        $query = $this->db->prepare(
            "SELECT *
            FROM games
            ORDER BY date DESC
            LIMIT 1"
        );
        $query->execute();
        $game = $query->fetch(PDO::FETCH_ASSOC);
        $gameClass = new Game($game["name"], $game["date"]);
        $gameClass->setId($game["id"]);
        return $gameClass;
    }
}