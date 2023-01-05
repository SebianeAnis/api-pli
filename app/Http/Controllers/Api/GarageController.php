<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Garage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class GarageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $garages = Garage::orderBy('name')->get();
        return response()->json($garages, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'pic_name' => 'required',
            'adress' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
            'country' => 'required',
            'number' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([ 'Message ' => 'Vérifiez les données insérées.'], 400);
        }
        
        else{

            $garage = new Garage;
        
            $garage->name = $request->name;
            $garage->pic_name = $request->pic_name;
            $garage->adress = $request->adress;
            $garage->postal_code = $request->postal_code;
            $garage->city = $request->city;
            $garage->country = $request->country;
            $garage->number = $request->number;

            $garage->save();

            return response()->json(['message' => 'Création du garage !'], 201); 
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Garage  $garage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $garage = Garage::find($id);

        if($garage){
            return response()->json($garage);
        }
        else{
            return response()->json(['Message' => 'Garage inexistant.'], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Garage  $garage
     * @return \Illuminate\Http\Response
     */
    public function edit(Garage $garage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Garage  $garage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Garage::find($id)){
            
        

            $validator = Validator::make($request->all(),[
                'name' => 'required',
                'pic_name' => 'required',
                'adress' => 'required',
                'postal_code' => 'required',
                'city' => 'required',
                'country' => 'required',
                'number' => 'required',
            ]);
            
            
            
            if ($validator->fails()) {
        
                return response()->json([ 'message ' => 'Vérifiez les donnees.'], 400);
            }
            
            else {
    
                $garage = Garage::where('id', $id)
                ->update([
                    'name' => $request->name,
                    'pic_name' => $request->pic_name,
                    'adress' => $request->adress,
                    'postal_code' => $request->postal_code,
                    'city' => $request->city,
                    'country' => $request->country,
                    'number' => $request->number,
                ]);
    
                return response()->json([ 'Message ' => 'Garage modifié avec succès.'], 200);
            }
        }
    
        else {
             
            return response()->json([ 'Message ' => 'Garage introuvable.'], 400);
    
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Garage  $garage
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $garage=Garage::find($id);

        if($garage){
            $garage->delete();
            return response()->json([$garage], 200);
        }
        else{
            return response()->json([ 'message ' => 'Vérifiez que le garage existe déjà.'], 400);
        }
    }
}
