<?php

namespace App\Enums;

enum UserLevel:string
{
    case admin = "2";
    case tentor = "1";
    case siswa = "0";
}
