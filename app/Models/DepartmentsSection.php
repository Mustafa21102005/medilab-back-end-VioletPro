<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'subtitle'])]
class DepartmentsSection extends Model
{
    /** @use HasFactory<\Database\Factories\DepartmentsSectionFactory> */
    use HasFactory;
}
