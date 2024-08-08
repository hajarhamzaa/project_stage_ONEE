<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Intervenant;
use App\Http\Requests\IntervenantUpdateRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class TicketController extends Controller
{
    public function __construct()
    {
        return $this->middleware('role');
    }
    public function index()
    {
    $intervenants = Intervenant::orderBy('etat', 'asc')->get();
    $booleanFields = [
        'installation_logiciel',
        'creation_compte',
        'serveur',
        'depannage_materiles',
        'instalation_ordinateur',
        'probleme_acces_a_internet',
        'probleme_acces_au_vpn',
        'probleme_mot_de_passe',
        'probleme_mot_de_passe_confirmation',
        'imprimante',
        'bi',
        'creation_nouvelle_solution_informatique',
        'mise_a_jours_solution_informatique_existante',
    ];

    $intervenantsWithErrors = $intervenants->map(function ($intervenant) use ($booleanFields) {
        $hasErrors = collect($intervenant)
            ->only($booleanFields)
            ->filter(function ($value) {
                return $value > 1;
            })
            ->isNotEmpty();

        $intervenant->hasErrors = $hasErrors;

        return $intervenant;
    });
    return view('setting.intervenant.index', ['intervenants' => $intervenants],compact('intervenantsWithErrors'));
    }



    public function edit(Intervenant $intervenant)
    {
    return view('setting.intervenant.edit', ['intervenant' => $intervenant]);
    }

    // public function show(Intervenant $intervenant)
    // {
    //     return view('setting.intervenant.edit1', ['intervenant' => $intervenant]);
    // }



    public function update(Request $request, Intervenant $intervenant)
{
    $validated = $request->validate([
        'etat' => 'required',
        'description' => '',
        'date_modification' => '',
    ]);

    $intervenant->update($validated);
    return redirect()->route('admin.intervenants.index')->withSuccess('Bien modifie !!! Votre ticket a été modifié avec succès. Vous recevrez une réponse sous peu.');
}



    // public function store(Request $request)
    // {
    //     //
    // }

    public function show(Intervenant $intervenant)
    {
        return view('setting.intervenant.edit1', ['intervenant' => $intervenant]);
    }

    public function modife(IntervenantUpdateRequest $request, Intervenant $intervenant)
{
    $miseAJourSolutionInformatique = $request->input('mise_a_jours_solution_informatique_existante', false);

    if ($miseAJourSolutionInformatique) {
        $intervenant->mise_a_jours_solution_informatique_existante = ($intervenant->mise_a_jours_solution_informatique_existante ?? 0) + 1;
    } else {
        $intervenant->mise_a_jours_solution_informatique_existante = 0;
    }

    $intervenant->update($request->except('mise_a_jours_solution_informatique_existante'));

    return redirect()->route('admin.intervenants.index')->withSuccess('Bien modifie !!! Votre ticket a été modifié avec succès. Vous recevrez une réponse sous peu.');
}


    // public function store()
    // {

    // }

    // public function show()
    // {

    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
}





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function destroy(Intervenant $intervenant)
    {
    $intervenant->delete();
    return redirect()->back()->withSuccess('Ticket supprimer justement en la page.');
    }
}
