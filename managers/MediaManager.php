<?php

class MediaManager extends AbstractManager{

  public function __construct(){
    parent::__construct();
  }

  public function findById(int $id) : ? Media{
    $query = $this->db->prepare('SELECT * FROM media WHERE id = :id');
    $parameters = [
      'id' => $id
    ];
    $query->execute($parameters);
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if($result){
      $media = new Media($result['url'], $result['alt']);
      return $media;
    }
    else{
      return null;
    }
  }

}













?>