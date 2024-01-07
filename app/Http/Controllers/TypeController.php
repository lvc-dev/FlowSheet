<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\View\View;

class TypeController extends Controller
{
    public function index() : View {
        return view('type.index', [
            'types' => Type::paginate(5),
        ]);
    }
}
