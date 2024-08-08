<x-app-layout>                         
   <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-2">
              <div class="bg-white shadow-md rounded my-6" >
                <table class="text-left w-full border-collapse">
                  <thead>
                    <tr>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Type de ticket</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">date_creation</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right">N* ticket</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Description</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Priorite</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Nom Employe</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Nom Intervenant</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right">Etat</th>
                    </tr>
                  </thead>
                  <tbody> 
                      @foreach($intervenants as $intervenant)
                      <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">
                        <span class="inline-flex items-center justify-center px-4 py-2 mr-2 text-xs font-bold leading-none text-white bg-gray-700 rounded-full">
                            {{ $intervenant->type_demande }}
                        </span>
                        </td>
                        <td class="py-4 px-6 border-b border-grey-light">{{ $intervenant->date_creation }}</td>
                        <td class="py-4 px-6 border-b border-grey-light">
                        <span class="inline-flex items-center justify-center px-3 py-1 mr-2 text-xs font-bold leading-none text-white bg-purple-400 rounded-full">
                            {{ $intervenant->N_ticket }}
                        </span>
                        </td>
                        <td class="py-4 px-6 border-b border-grey-light">{{ $intervenant->description }}</td>
                        @if($intervenant->priorite == 'Urgente')
                        <td class="py-4 px-6 border-b border-grey-light">
                        <span class="inline-flex items-center justify-center px-3 py-1 mr-2 text-xs font-bold leading-none text-white bg-red-600 rounded-full">Urgente</span>
                        </td>

                        @elseif($intervenant->priorite == 'Normale')
                        <td class="py-4 px-6 border-b border-grey-light">
                        <span class="inline-flex items-center justify-center px-3 py-1 mr-2 text-xs font-bold leading-none text-white bg-blue-400 rounded-full">Normale</span>
                        </td>

                        @elseif($intervenant->priorite == 'Faible')
                        <td class="py-4 px-6 border-b border-grey-light">
                        <span class="inline-flex items-center justify-center px-3 py-1 mr-2 text-xs font-bold leading-none text-white bg-gray-300 rounded-full">Faible</span>
                        </td>
                        @endif
                        <td class="py-4 px-6 border-b border-grey-light">
                        <span class="inline-flex items-center justify-center px-3 py-1 mr-2 text-xs font-bold leading-none text-white bg-green-900 rounded-full">
                            {{ $intervenant->matricule_employe }}
                        </span>
                        </td>
                        <td class="py-4 px-6 border-b border-grey-light">
                        @if($intervenant->etat == 'En attente')
                        <div class="flex items-center">
                        <div class="loader2"></div>
                        </div>
                        @elseif($intervenant->etat == 'Chance' )
                        <div class="flex items-center">
                        <div class="loader"></div>
                            <span>reherche...</span>
                        </div>
                        
                        @elseif(in_array($intervenant->etat, ['En cours', 'Fin', 'Refuser']))
                        <span class="text-white inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-yellow-500 rounded-full">
                        @if (auth()->user()->hasRole('Empolyee'))
                            <span>{{ $intervenant->matricule_intervenant }}</span>
                        @elseif(auth()->user()->hasRole('Intervenant'))
                        <span>{{ auth()->user()->name }}</span>
                        @endif
                        </span>
                        @endif
                        </td>

                        @if($intervenant->etat == 'En attente')
                        <td class="py-4 px-6 border-b border-grey-light">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                          <path fill-rule="evenodd" d="M11.403 5H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-6.403a3.01 3.01 0 0 1-1.743-1.612l-3.025 3.025A3 3 0 1 1 9.99 9.768l3.025-3.025A3.01 3.01 0 0 1 11.403 5Z" clip-rule="evenodd"/>
                          <path fill-rule="evenodd" d="M13.232 4a1 1 0 0 1 1-1H20a1 1 0 0 1 1 1v5.768a1 1 0 1 1-2 0V6.414l-6.182 6.182a1 1 0 0 1-1.414-1.414L17.586 5h-3.354a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                        </svg>

                        </td>
                        @elseif($intervenant->etat == 'En cours')
                        <td class="py-4 px-6 border-b border-grey-light">
                        <svg class="w-6 h-6 text-blue-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16 10 3-3m0 0-3-3m3 3H5v3m3 4-3 3m0 0 3 3m-3-3h14v-3"/>
                        </svg>
                        </td>
                        @elseif($intervenant->etat == 'Fin')
                        <td class="py-4 px-6 border-b border-grey-light">
                        <svg class="w-6 h-6 text-green-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8.032 12 1.984 1.984 4.96-4.96m4.55 5.272.893-.893a1.984 1.984 0 0 0 0-2.806l-.893-.893a1.984 1.984 0 0 1-.581-1.403V7.04a1.984 1.984 0 0 0-1.984-1.984h-1.262a1.983 1.983 0 0 1-1.403-.581l-.893-.893a1.984 1.984 0 0 0-2.806 0l-.893.893a1.984 1.984 0 0 1-1.403.581H7.04A1.984 1.984 0 0 0 5.055 7.04v1.262c0 .527-.209 1.031-.581 1.403l-.893.893a1.984 1.984 0 0 0 0 2.806l.893.893c.372.372.581.876.581 1.403v1.262a1.984 1.984 0 0 0 1.984 1.984h1.262c.527 0 1.031.209 1.403.581l.893.893a1.984 1.984 0 0 0 2.806 0l.893-.893a1.985 1.985 0 0 1 1.403-.581h1.262a1.984 1.984 0 0 0 1.984-1.984V15.7c0-.527.209-1.031.581-1.403Z"/>
                        </svg>
                        </td>
                        @elseif($intervenant->etat == 'Refuser')
                        <td class="py-4 px-6 border-b border-red-light">
                        <a href="{{ route('admin.historiqueDemandes.edit', ['historiqueDemande' => $intervenant->id]) }}">
                            <svg class="w-6 h-6 text-red-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                        </a>
                        </td>
                        @elseif($intervenant->etat == 'Chance')
                        <td class="py-4 px-6 border-b border-red-light">
                        <svg class="w-6 h-6 text-dark-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                          <path d="M13.383 4.076a6.5 6.5 0 0 0-6.887 3.95A5 5 0 0 0 7 18h3v-4a2 2 0 0 1-1.414-3.414l2-2a2 2 0 0 1 2.828 0l2 2A2 2 0 0 1 14 14v4h4a4 4 0 0 0 .988-7.876 6.5 6.5 0 0 0-5.605-6.048Z"/>
                          <path d="M12.707 9.293a1 1 0 0 0-1.414 0l-2 2a1 1 0 1 0 1.414 1.414l.293-.293V19a1 1 0 1 0 2 0v-6.586l.293.293a1 1 0 0 0 1.414-1.414l-2-2Z"/>
                        </svg>
                        </td>
                        @endif
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>  
        </main>
    </div>
</div>
</x-app-layout>
