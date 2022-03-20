<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class UserData extends Data
{
    public function __construct(
        public ?string $name,
        public ?string $email,
        // public ?string $nickname,
        // public ?carbon $DOB,
        // public ?string $phone,
        // // #[Nullable, StringType, In(['Male', 'Female', 'Others'])]
        // public ?Gender $gender
    ) {
    }

    public static function fromModel(User $user)
    {
    //    
    }
}