<?php

namespace festochshop\shop\domaine\dto;

class ShowDTO extends DTO
{

    public int $id;
    public string $title;
    public string $description;
    public string $time;
    public string $video;
    public int $evening_id;

    public function __construct(int $id, string $title, string $description, string $time, string $video, int $evening_id)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->time = $time;
        $this->video = $video;
        $this->evening_id = $evening_id;
    }
}