<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Intervenant;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DemanderTickets extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        return $this->middleware('role_emp');
    }
    public function index()
    {
    $intervenant = Intervenant::get()->all(); // Exemple de récupération d'un intervenant

    return view('setting.demander.index', ['intervenant' => $intervenant]);
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
//     public function store(Request $request)
// {
//     $validatedData = $request->validate([
//         'type_demande' => 'required',
//         'date_creation' => 'required|date',
//         'N_ticket' => 'required',
//         'priorite' => 'required',
//         'matricule_employe' => 'required',
//         'matricule_intervenant' => 'required',
//         'etat' => 'required',
//     ]);

//     $intervenant = new Intervenant();
//     $intervenant->type_demande = $validatedData['type_demande'];
//     $intervenant->date_creation = $validatedData['date_creation'];
//     $intervenant->N_ticket = $validatedData['N_ticket'];
//     $intervenant->priorite = $validatedData['priorite'];
//     $intervenant->matricule_employe = $validatedData['matricule_employe'];
//     $intervenant->matricule_intervenant = $validatedData['matricule_intervenant'];
//     // Set an empty string as default if description is not provided
//     $intervenant->description = '';
//     $intervenant->etat = $validatedData['etat'];


//     return redirect()->back()->withSuccess('Ticket pret !!!');
// }
public function store(Request $request)
{

    $request->validate([
        'type_demande'=>'required',
        'date_creation' => 'required',
        'description' => 'required',
        'N_ticket' => 'required',
        'priorite' => 'required',
        'matricule_employe' => 'required',
        'description_resolution'=>'',
        'etat'=>'required',
    ]);

    $intervenant = Intervenant::create([
        'type_demande' => $request->type_demande,
        'date_creation' => $request->date_creation,
        'description' => $request->description,
        'N_ticket' => $request->N_ticket,
        'priorite' => $request->priorite,
        'matricule_employe' => $request->matricule_employe,
        'description_resolution' => $request->description_resolution,
        'etat' => $request->etat,
    ]);

    return redirect()->back()->withSuccess('Ticket pret !!!');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
