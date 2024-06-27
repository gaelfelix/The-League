<?php

class Team{
    private ? int $id = null;
    private Media $logo;
    public function __construct(
        private string $name,
        private string $description
    )
    {
        
    }

    public function getId():? int{
        return $this->id;
    }

    public function setId($id):void{
        $this->id = $id;
    }

    /**
     * Get the value of logo
     */
    public function getLogo(): Media
    {
        return $this->logo;
    }

    /**
     * Set the value of logo
     */
    public function setLogo(Media $logo): void
    {
        $this->logo = $logo;
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
     * Get the value of description
     */
    public function getDescription(): string
    {
            return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription(string $description): void
    {
            $this->description = $description;
    }
}