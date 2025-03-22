<?php

namespace App\Models;

class Page {

    public int $page_id;
    public string $title;
    public string $slug;
    public string $created_at;
    public string $updated_at;
    public array $sections = []; 

}

