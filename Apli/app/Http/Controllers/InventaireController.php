<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventaireRequest;
use App\Http\Requests\InventaireStoreRequest;
use App\Models\Inventaire;
use Illuminate\Http\Request;

class InventaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $d = date('Y-m');
        $items = Inventaire::where('dates','like',"{$d}%")->orderBy('dates')->paginate(8);
        

        return view('index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('inventaire.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InventaireStoreRequest $request)
    {
        //
       // $request->validate([
        //    "produit" => "required|string|unique:inventaires,produits",
       //     "quantite" => "required|numeric",
       //     "date" => "required|date"
       // ]);

        //$test = Inventaire::where("produits", $request->produit)->first();

       // if ($test != null) {

       //     return back()->with('error', 'Le produit existe déja.');
      //  } else {
            Inventaire::create([
                "produits" => strtolower($request->produit),
                "quantites" => (int)$request->quantite,
                "dates" => $request->date
            ]);
            return redirect('/')->with('success', 'Le produit a bien été ajouté.');
      // }
    }

    public function search(Request $request)
    {
        $q = $request->input('q');
        $items = Inventaire::where('produits', 'like', "%{$q}%")
                                  ->orWhere('quantites', 'like', "%{$q}%")
                                  ->orWhere('dates','like',"%{$q}%")
                                  ->get();
        return view('inventaire.search', compact('items'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventaire $inventaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventaire $inventaire)
    {
        //
       // $items = Inventaire::find($id);

        return view('inventaire.edit', compact('inventaire'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InventaireRequest $request, $id)
    {
        //
       // $request->validate([
       //     "produit" => "required|string",
       //     "quantitées" => "required|numeric",
       //     "date" => "required"
       // ]);

        $items = Inventaire::find($id);

        if (!$items) {
            return back()->with('error', 'L\'inventaire que vous essayez de modifier n\'existe pas.');
        }

        $items->produits = strtolower($request->input('produit'));
        $items->quantites = (int)$request->input('quantitées');
        $items->dates = $request->input('date');

        $result = $items->update();

        if ($result) {
            return redirect('/')->with('success', 'Le produit a bien été modifié');
        } else {
            return back()->with('error', 'Une erreur est survenue lors de la modification du produit');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $item = Inventaire::find($id);

    $item->delete();
    return redirect('/')->with('success','Le produit a bien été suprimé');
    }
    
   // public function liste()
   // {
    //    $item = Inventaire::where('quantites','<', '1')->get() ;
        
   //     return view('inventaire.liste',compact('item'));
  //  }
}
