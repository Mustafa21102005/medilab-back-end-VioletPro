<?php

namespace App\Models;

use App\Traits\HasOrderedPosition;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['icon', 'title', 'description', 'order'])]
class AboutFeature extends Model
{
    /** @use HasFactory<\Database\Factories\AboutFeatureFactory> */
    use HasFactory, HasOrderedPosition;
}
