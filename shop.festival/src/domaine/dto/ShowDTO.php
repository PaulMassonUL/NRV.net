<?php

namespace festochshop\shop\domaine\dto;

class ShowDTO extends DTO
{

    public int $id;
    public string $title;
    public string $description;
    public string $time;
    public string $video;

    public function __construct(int $id, string $title, string $description, string $time, string $video)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->time = $time;
        $this->video = $video;
    }
}