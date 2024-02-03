<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;
use App\Criteria\CriteriaCollection;
use App\Http\Classes\CompareCriteria;
use App\Http\Classes\CompareLikeCriteria;
use Illuminate\Contracts\View\View;

class CharactersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $characters = Character::query();

        $sortBy = $request->input('sort_by', 'name');
        $sortOrder = $request->input('sort_order', 'asc');

        $name = trim($request->get('name'));
        $house = trim($request->get('house'));

        if (!empty($name) || !empty($house)) {
            if (!empty($name)) {
                $characters = $characters->apply(CriteriaCollection::allOf([
                    new CompareCriteria('name', $name),
                ]));
            }
            if (!empty($house)) {
                $characters = $characters->apply(CriteriaCollection::allOf([
                    new CompareCriteria('house', $house),
                ]));
            }
        }

        $characters = $characters->orderBy($sortBy, $sortOrder)->paginate(10);

        return view('index', compact('characters', 'name', 'house', 'sortBy', 'sortOrder'))
            ->with('name', $name)
            ->with('house', $house);
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $id): View
    {
        $character = $id;
        return view('show', compact('character'));
    }

    /**
     * Search By Name.
     */
    public function searchByName(Request $request): array
    {
        return $this->searchByAttribute($request, 'name');
    }

    /**
     * Search By House.
     */
    public function searchByHouse(Request $request): array
    {
        return $this->searchByAttribute($request, 'house');
    }

    /**
     * Search By Attribute.
     */
    protected function searchByAttribute(Request $request, $attribute): array
    {
        $characters = Character::query();
        $term = $request->get('term');

        if (!empty($term)) {
            $characters = $characters->apply(CriteriaCollection::allOf([
                new CompareLikeCriteria($attribute, $term),
            ]));
        }

        $characters = $characters->get();
        $responseData = [];

        foreach ($characters as $result) {
            $responseData[] = [
                'label' => $result->$attribute,
            ];
        }

        return $responseData;
    }
}
