<?php

class PageController extends AbstractController{
    public function home():void{
        $tm = new TeamManager();
        $pm = new PlayerManager();
        $gm = new GameManager();
        $spotlightTeam = $tm->findById(1);
        $spotlightTeamPlayers = $pm->findByTeam(1);
        $spotlightPlayer1 = $pm->findOne(1);
        $spotlightPlayer2 = $pm->findOne(2);
        $spotlightPlayer3 = $pm->findOne(3);
        $lastMatch = $gm->findLast();
        $this->render("home.html.twig", ["spotlightTeam"=>$spotlightTeam, "spotlightTeamPlayers"=>$spotlightTeamPlayers, "spotlightPlayer1"=>$spotlightPlayer1, "spotlightPlayer2"=>$spotlightPlayer2, "spotlightPlayer3"=>$spotlightPlayer3, "lastMatch"=>$lastMatch]);
    }

    public function players():void{
        $pm = new PlayerManager();
        $mm = new MediaManager();
        $allPlayers = $pm->findAll();
        


        $this->render("players.html.twig", 
        ["allPlayers" => $allPlayers
        ]);
    }
}