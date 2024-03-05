<?php

namespace App\Console\Commands;

use App\Http\Classes\CharactersClass;
use Illuminate\Console\Command;
use App\Traits\Integrations\Characters as CharactersTrait;

class CharactersApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:characters {--truncate}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update Characters';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CharactersTrait $charactersTrait)
    {
        parent::__construct();
        $this->charactersTrait = $charactersTrait;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $truncate      = $this->option('truncate');

        $character = new CharactersClass();

        if ($truncate) {
            $character->truncate();
        }

        $characters = $this->charactersTrait->getCharacters();

        if (!empty($characters)) {
            foreach ($characters as $characterData) {
                $character->saveCharactersInModel($characterData);
            }
        }
    }
}
