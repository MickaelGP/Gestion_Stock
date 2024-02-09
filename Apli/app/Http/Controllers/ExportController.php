<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventaire;


class ExportController extends Controller
{
    //
    public function export()
    {
        $data = Inventaire::where('quantites', '<', 1)->get();
        $text = $this->generateText($data);

        return response($text)->header('Content-Type', 'text/plain');
    }

    private function generateText($data)
    {
        $text = "Liste de Course\n\n";
        foreach ($data as $item) {
            $text .= "- {$item->produits}\n";
        }

        return $text;
    }
}
