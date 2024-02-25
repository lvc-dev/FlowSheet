<?php

namespace App\Http\Controllers;

enum Files : string {
    case Setting = "settings.json";
    case Tag = "tags.json";
}
