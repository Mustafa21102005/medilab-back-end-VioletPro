<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['main_title', 'subtitle', 'why_choose_title', 'why_choose_text', 'background_image'])]
class HeroSection extends Model
{
    /** @use HasFactory<\Database\Factories\HeroSectionFactory> */
    use HasFactory;
}
