<?php

namespace App;

enum RoleEnum: string
{
    case SuperAdmin = 'super_admin';
    case Admin = 'admin';
    case Vendor = 'vendor';
    case User = 'user';
}
