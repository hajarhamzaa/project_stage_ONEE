<x-app-layout>
   <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-1 pb-16">
              <div class="bg-white shadow-md rounded my-6 p-5">
                <form method="POST" action="{{ route('admin.intervenants.modife', ['intervenant' => $intervenant->id])}}">
                  @csrf
                  @method('put')
                  <div class="flex flex-col space-y-2">
                    <label for="type_demande" class="text-gray-700 select-none font-medium">Choix Type</label>
                    <select id="type_demande" type="text" name="type_demande" value="{{ old('type_demande',$intervenant->type_demande) }}"
                       class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none"
                    >
                    <option value="{{ $intervenant->type_demande }}">{{ $intervenant->type_demande }}</option>
                    <option value="SOFT">SOFT</option>
                    <option value="HARD">HARD</option>
                    </select>
                    <br/>
                  </div>

                  

                  <div class="flex flex-col space-y-2">
                  <label for="priorite" class="text-gray-700 select-none font-medium">Priorite</label>
                  <select id="priorite" name="priorite" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                  <option value="{{ $intervenant->priorite }}">{{ $intervenant->priorite }}</option>
                    <option value="Urgente">Urgente</option>
                    <option value="Normale">Normale</option>
                    <option value="Faible">Faible</option>
                  </select>
                  </div>
                  <div class="flex flex-col space-y-2">
                    <label for="matricule_intervenant" class="text-gray-700 select-none font-medium">Nom intervenant </label>
                    <input id="matricule_intervenant" type="text" value="{{ auth()->user()->name }}" name="matricule_intervenant" placeholder="Enter Nom intervenant" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    readonly/>
                  </div>
                  <!-- <div class="flex flex-col space-y-2">
                    <label for="type_demande" class="text-gray-700 select-none font-medium">Choix type_demande</label>
                    <select id="type_demande" type="text" name="type_demande" value="{{ old('type_demande',$intervenant->type_demande) }}"
                       class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    >
                    <option value="{{ $intervenant->type_demande }}">{{ $intervenant->type_demande }}</option>
                    <option value="SOFT">SOFT</option>
                    <option value="HARD">HARD</option>
                    </select>
                    <br/>
                  </div> -->

                  <div class="flex flex-col space-y-2">
                    <label for="description_resolution" class="text-gray-700 select-none font-medium">Description resolution</label>
                    <textarea name="description_resolution" id="description_resolution" placeholder="Enter description_resolution" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" rows="5">{{ old('description_resolution',$intervenant->description_resolution) }}</textarea>
                  </div>
                  <br/>

                  <div class="flex flex-col space-y-2">
                    <label for="date_creation" class="text-gray-700 select-none font-medium">Date Creation</label>
                    <input value="{{ old('date_creation',$intervenant->date_creation) }}"  name="date_creation" id="date_creation" placeholder="Enter creation" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" readonly/>
                  </div>
                  <br/>

                  <div class="flex flex-col space-y-2">
                    <label for="date_modification" class="text-gray-700 select-none font-medium">Date modification</label>
                    <input type="date" value="{{ old('date_modification',$intervenant->date_modification) }}"  name="date_modification" id="date_modification" placeholder="Enter date modification" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                  </div>
                  <br/>

                      <div class="flex flex-col justify-cente">
                          <div class="flex flex-col">
                            <label for="">Saisir details</label><br>
                              <label class="inline-flex items-center mt-3">
                                  <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="installation_logiciel" value="false">
                                  <span class="ml-2 text-gray-700">Installation du logiciel</span>
                              </label>
                              <label class="inline-flex items-center mt-3">
                                  <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="creation_compte" value="false">
                                  <span class="ml-2 text-gray-700">Creation de compte</span>
                              </label>
                              <label class="inline-flex items-center mt-3">
                                  <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="serveur" value="false">
                                  <span class="ml-2 text-gray-700">Serveur</span>
                              </label>
                              </label>
                              <label class="inline-flex items-center mt-3">
                                  <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="depannage_materiles" value="false">
                                  <span class="ml-2 text-gray-700">Depannage materiles</span>
                              </label>
                              <label class="inline-flex items-center mt-3">
                                  <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="instalation_ordinateur" value="false">
                                  <span class="ml-2 text-gray-700">Instalation d'ordinateur</span>
                              </label>
                              <label class="inline-flex items-center mt-3">
                                  <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="probleme_acces_a_internet" value="false">
                                  <span class="ml-2 text-gray-700">Probleme d'acces a internet</span>
                              </label>
                              <label class="inline-flex items-center mt-3">
                                  <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="probleme_acces_au_vpn" value="false">
                                  <span class="ml-2 text-gray-700">Probleme d'acces au VPN</span>
                              </label>
                              <label class="inline-flex items-center mt-3">
                                  <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="probleme_mot_de_passe" value="false">
                                  <span class="ml-2 text-gray-700">Probleme mot de passe</span>
                              </label>
                              <label class="inline-flex items-center mt-3">
                                  <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="probleme_mot_de_passe_confirmation" value="false">
                                  <span class="ml-2 text-gray-700">Probleme mot de passe Confrimation</span>
                              </label>
                              <label class="inline-flex items-center mt-3">
                                  <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="imprimante" value="false">
                                  <span class="ml-2 text-gray-700">Imprimante</span>
                              </label>
                              <label class="inline-flex items-center mt-3">
                                  <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="bi" value="false">
                                  <span class="ml-2 text-gray-700">BI</span>
                              </label>
                              <label class="inline-flex items-center mt-3">
                                  <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="creation_nouvelle_solution_informatique" value="false">
                                  <span class="ml-2 text-gray-700">Creation nouvelle solution informatique</span>
                              </label>
                              <label class="inline-flex items-center mt-3">
                                  <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="mise_a_jours_solution_informatique_existante" value="1" @if($intervenant->mise_a_jours_solution_informatique_existante) checked @endif>
                                  <span class="ml-2 text-gray-700">Mis a jours solution informatique existante</span>
                              </label>
                          </div>
                      </div><br>

                      <div class="flex flex-col space-y-2">
                    <label for="etat" class="text-gray-700 select-none font-medium">Choix etat</label>
                    <select id="etat" type="text" name="etat" value="{{ old('etat',$intervenant->etat) }}"
                       class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none"
                    >
                    <option value="{{ $intervenant->etat }}">{{ $intervenant->etat }}</option>
                    <option value="Fin">Fin</option>
                    <option value="Refuser">Refuser</option>
                    </select>
                    <br/>
                  </div>
                  <div class="text-center mt-16 mb-16">
                  <button type="submit" class="bg-green-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-green-400 transition-colors ">
                    Ticketer
                  </button>
                  </div>
                </form>
              </div>
            </div>
        </main>
    </div>
</div>
</x-app-layout>
