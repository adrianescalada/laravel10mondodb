<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Character;
use App\Http\Classes\CharactersClass;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CharacterTest extends TestCase
{
    use RefreshDatabase;

    public function testSaveCharactersInModel()
    {
        $charactersClass = new CharactersClass();

        $data = [
            'id' => 1,
            'name' => 'John Doe',
            'alternate_names' => ['Johnny', 'Doe Jr.'],
            'pecies' => 'Human',
            'gender' => 'Male',
            'house' => 'Gryffindor',
            'dateOfBirth' => '01-01-1990',
            'yearOfBirth' => 1990,
            'wizard' => true,
            'ancestry' => 'Human',
            'eyeColour' => 'Blue',
            'hairColour' => 'Black',
            'wand' => ['Ring', 'Staff'],
            'patronus' => 'Male',
            'hogwartsStudent' => true,
            'hogwartsStaff' => false,
            'actor' => 'John Smith',
            'alternate_actors' => ['Jane Doe', 'Bob Johnson'],
            'alive' => true,
            'image' => 'https://example.com/image.jpg'
        ];

        $this->assertNull(Character::where('characterId', 1)->first());

        $charactersClass->saveCharactersInModel($data);

        $character = Character::where('characterId', 1)->first();
        $this->assertNotNull($character);
        $this->assertEquals('John Doe', $character->name);
        $this->assertEquals('["Johnny","Doe Jr."]', $character->alternate_names);
        $this->assertEquals('Human', $character->species);
        $this->assertEquals('Male', $character->gender);
        $this->assertEquals('Gryffindor', $character->house);
        $this->assertEquals('1990-01-01', $character->dateOfBirth);
        $this->assertEquals(1990, $character->yearOfBirth);
        $this->assertTrue($character->wizard);
        $this->assertEquals('Human', $character->ancestry);
        $this->assertEquals('Blue', $character->eyeColour);
        $this->assertEquals('Black', $character->hairColour);
        $this->assertEquals('["Ring","Staff"]', $character->wand);
        $this->assertEquals('Male', $character->patronus);
        $this->assertTrue($character->hogwartsStudent);
        $this->assertFalse($character->hogwartsStaff);
        $this->assertEquals('John Smith', $character->actor);
        $this->assertEquals('["Jane Doe","Bob Johnson"]', $character->alternate_actors);
        $this->assertTrue($character->alive);
        $this->assertEquals('https://example.com/image.jpg', $character->image);

        // Test updating existing character
        $data['name'] = 'Jane Doe';
        $data['alternate_names'] = ['Janey', 'Doe Jr.'];
        $data['dateOfBirth'] = '02-02-1990';

        $charactersClass->saveCharactersInModel($data);

        $character = Character::where('characterId', 1)->first();
        $this->assertNotNull($character);
        $this->assertEquals('Jane Doe', $character->name);
        $this->assertEquals('["Janey","Doe Jr."]', $character->alternate_names);
        $this->assertEquals('1990-02-02', $character->dateOfBirth);
    }
}
