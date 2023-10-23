<?php

abstract class DTO
{
    public function toJson(): string {
        return json_encode($this, JSON_PRETTY_PRINT);
    }

}