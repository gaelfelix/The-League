<?php

class Router
{
    private PageController $pc;

    public function __construct()
    {
        $this->pc = new PageController();
    }
    public function handleRequest(array $get) : void
    {
        if(!isset($get["route"]))
        {
            $this->pc->home();
        }
        else if(isset($get["route"]) && $get["route"] === "players")
        {
            $this->pc->players();
        }
        else if(isset($get["route"]) && $get["route"] === "player")
        {
            $this->pc->player();
        }
        else if(isset($get["route"]) && $get["route"] === "teams")
        {
            $this->pc->teams();
        }
        else if(isset($get["route"]) && $get["route"] === "team")
        {
            $this->pc->team();
        }
        else if(isset($get["route"]) && $get["route"] === "matchs")
        {
            $this->pc->login();
        }
        else if(isset($get["route"]) && $get["route"] === "matchs")
        {
            $this->pc->checkLogin();
        }
        else if(isset($get["route"]) && $get["route"] === "logout")
        {
            $this->pc->logout();
        }
        else
        {
            $this->pc->home();
        }
    }
}