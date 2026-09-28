<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'description', 'poster_image', 'media_url', 'image'])]
class AboutSection extends Model
{
    /** @use HasFactory<\Database\Factories\AboutSectionFactory> */
    use HasFactory;
}
