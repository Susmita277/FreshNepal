<?php

namespace App\Filament\Vendor\Resources\Users\Pages;

use App\Filament\Vendor\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
}
