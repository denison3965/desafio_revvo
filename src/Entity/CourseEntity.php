<?php

namespace App\Entity;

class CourseEntity
{
    public function __construct(
        public $title,
        public $description,
        public $image,
        public $url
    ) {}
}