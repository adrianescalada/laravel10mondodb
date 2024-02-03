<?php

namespace App\Http\Classes;

use App\Models\Character;
use Illuminate\Support\Facades\Log;
use DateTime;
use Throwable;

class CharactersClass
{

    public function saveCharactersInModel($data): void
    {
        try {

            $dateOfBirth = $data['dateOfBirth'] ? DateTime::createFromFormat('d-m-Y', $data['dateOfBirth'])->format('Y-m-d') : now()->format('Y-m-d');

            $formatData = [
                'characterId' => $data['id'],
                'name' => isset($data['name']) ? $data['name'] : "-",
                'alternate_names' => isset($data['alternate_names']) ? json_encode($data['alternate_names']) : null,
                'species' => isset($data['species']) ? $data['species'] : "-",
                'gender' => isset($data['gender']) ? $data['gender'] : "-",
                'house' => isset($data['house']) ? $data['house'] : "-",
                'dateOfBirth' => $dateOfBirth,
                'yearOfBirth' => isset($data['yearOfBirth']) ? $data['yearOfBirth'] : 0,
                'wizard' => isset($data['wizard']) ? $data['wizard'] : 0,
                'ancestry' => isset($data['ancestry']) ? $data['ancestry'] : "-",
                'eyeColour' => isset($data['eyeColour']) ? $data['eyeColour'] : "-",
                'hairColour' => isset($data['hairColour']) ? $data['hairColour'] : "-",
                'wand' => isset($data['wand']) ? json_encode($data['wand']) : null,
                'patronus' => isset($data['patronus']) ? $data['patronus'] : "-",
                'hogwartsStudent' => isset($data['hogwartsStudent']) ? $data['hogwartsStudent'] : 0,
                'hogwartsStaff' => isset($data['hogwartsStaff']) ? $data['hogwartsStaff'] : 0,
                'actor' => isset($data['actor']) ? $data['actor'] : "-",
                'alternate_actors' => isset($data['alternate_actors']) ? json_encode($data['alternate_actors']) : null,
                'alive' => isset($data['alive']) ? $data['alive'] : 0,
                'image' => isset($data['image']) ? $data['image'] : "-",
            ];
            Character::updateOrCreate($formatData);
        } catch (Throwable $th) {
            Log::error($th, ['characters' => $th]);
        }
    }
}
