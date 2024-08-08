
<x-app-layout>
   <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-1 pb-16">
              <div class="bg-white shadow-md rounded my-6 p-5">
              <div class="bg-white shadow-md rounded my-6 p-5">
              @foreach($intervenants as $intervenant)
                <div class="flex flex-col space-y-2">
              <div class="sm:w-1/4 ">
                <img src="https://th.bing.com/th?id=OIP.uHbE73OAQ0k8VLeXujR0vQAAAA&w=318&h=188&c=8&rs=1&qlt=90&o=6&dpr=1.5&pid=3.1&rm=2" alt="Example Image">
              </div>
              <h5 class="text-gray-600 text-3xl font-medium text-right">
                    <span class="inline-flex items-center justify-center px-4 py-4 mr-2 text-xs font-bold leading-none text-white bg-gray-600 rounded-full">
                      {{ $intervenant->id }}
                    </span>
              </h5>
                <h4 class="text-gray-600 text-3xl font-medium text-center">
                      <span class="text-blue-600">Fiche</span> <span class="text-yellow-400">Intervention</span>
                </h4>

                <br>

                    <!-- <p for="paragraph" class="text-gray-700 select-none font-medium">
                    Avec une expérience riche dans la gestion des demandes de tickets, <span class="inline-flex items-center justify-center px-1 py-1 mr-0 text-xs font-bold leading-none text-white bg-gray-500 rounded-full">{{ $intervenant->matricule_intervenant }}</span>   a brillé par ses opérations réussies et sa capacité à résoudre efficacement les problèmes.
                     Fort de ses succès passés, il est motivé à relever de nouveaux défis avec enthousiasme et détermination. En lui fournissant les informations nécessaires et en lui accordant la permission requise,
                     {{ $intervenant->matricule_employe }} sera prêt à aborder avec confiance et efficacité toute nouvelle demande de ticket qui se présentera et voici votre infos.
                     Merci pour votre visite...
                    </p><br> -->
                </div>
                <br/>
                <div class="flex flex-col space-y-2">
                    <label for="type_demande" class="text-gray-700 select-none font-medium">Le type de dmemande :{{ $intervenant->type_demande }}</label>
                </div>
                <br/>
                <div class="flex flex-col space-y-2">
                    <label for="date_creation" class="text-gray-700 select-none font-medium">Date creation :{{ $intervenant->date_creation }}</label>
                </div>
                <br/>
                <div class="flex flex-col space-y-2">
                    <label for="date_modification" class="text-gray-700 select-none font-medium">Date modification :{{ $intervenant->date_modification }}</label>
                </div>
                <br/>
                <div class="flex flex-col space-y-2">
                    <label for="description" class="text-gray-700 select-none font-medium">Description employee :
                        {{ $intervenant->description }}
                    </label>
                </div>
                <br/>
                <div class="flex flex-col space-y-2">
                    <label for="N_ticket" class="text-gray-700 select-none font-medium">Numero du ticket :{{ $intervenant->N_ticket }}</label>
                </div>
                <br/>
                <div class="flex flex-col space-y-2">
                    <label for="priorite" class="text-gray-700 select-none font-medium">Priorite ticket :{{ $intervenant->priorite }}</label>
                </div>
                <br/>
                <div class="flex flex-col space-y-2">
                    <label for="matricule_employe" class="text-gray-700 select-none font-medium">Matricule employe :{{ $intervenant->matricule_employe }}</label>
                </div>
                <br/>
                <div class="flex flex-col space-y-2">
                    <label for="matricule_intervenant" class="text-gray-700 select-none font-medium">Matricule intervenant :{{ $intervenant->matricule_intervenant }}</label>
                </div>
                <br/>
                <div class="flex flex-col space-y-2">
                    <label for="description_resolution" class="text-gray-700 select-none font-medium">Description resolution intervenant :{{ $intervenant->description_resolution }}</label>
                </div>
                <br/>
                <div class="flex flex-col space-y-2">
                    <label for="details_problemes" class="text-gray-700 select-none font-medium">Les details choisis :</label>

                    @if($intervenant->installation_logiciel)
                        <span>Installation Logiciel</span>
                    @endif

                    @if($intervenant->creation_compte)
                        <span>Création Compte</span>
                    @endif

                    @if($intervenant->serveur)
                        <span>Serveur</span>
                    @endif
                    @if($intervenant->depannage_materiles)
                        <span>Depannage materiles</span>
                    @endif
                    @if($intervenant->instalation_ordinateur)
                        <span>Instalation ordinateur</span>
                    @endif
                    @if($intervenant->probleme_acces_a_internet)
                        <span>Probleme d'acces internet</span>
                    @endif
                    @if($intervenant->probleme_acces_au_vpn)
                        <span>Probleme d'acces VPN</span>
                    @endif
                    @if($intervenant->probleme_mot_de_passe)
                        <span>Probleme mot de passe</span>
                    @endif
                    @if($intervenant->probleme_mot_de_passe_confirmation)
                        <span>Probleme mot de passe confirmation</span>
                    @endif
                    @if($intervenant->imprimante)
                        <span>Imprimante</span>
                    @endif
                    @if($intervenant->bi)
                        <span>Bi</span>
                    @endif
                    @if($intervenant->creation_nouvelle_solution_informatique)
                        <span>Creation nouvelle solution informatique</span>
                    @endif
                    @if($intervenant->mise_a_jours_solution_informatique_existante)
                        <span>Mise a jours solution informatique existante</span>
                    @endif
                </div>
                <br>
                <p class="text-gray-600  font-medium text-right text-1xl">
                      Signature:
                </p>
                <br>

                <p class="text-gray-800  font-medium text-left text-2xl">
                      Faire le : .../.../.....
                </p>
                      <!-- <div class="sm:w-1/6 img-right float-right">
                        <img src="data:image/png;base64,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" alt="signature Image">
                      </div> -->

                @endforeach

              </div>
                <div class="text-center mt-16 mb-16">
                  <button onclick="printPage()" type="button" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-white-700 transition-colors ">
                    Imprimer
                  </button>
                  <script>
                    function printPage() {
                        var elements = document.querySelectorAll('label');
                        elements.forEach(element => {
                        element.contentEditable = true;
                        });

                        window.print();

                        elements.forEach(element => {
                        element.contentEditable = false;
                        });
                    }
                   </script>
                </div>
              </div>
            </div>
        </main>
    </div>
</div>
</x-app-layout>
