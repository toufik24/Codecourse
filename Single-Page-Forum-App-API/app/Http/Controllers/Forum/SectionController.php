<?php

namespace App\Http\Controllers\Forum;

use App\Http\Requests;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\SectionTransformer;

class SectionController extends Controller
{
    public function index(Section $section)
    {
        return fractal()
            ->collection($section->get())
            ->transformWith(new SectionTransformer)
            ->toArray();
    }
}
