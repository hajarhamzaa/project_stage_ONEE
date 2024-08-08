
 <x-app-layout>
   <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200 custom-width">
          <style>
            .custom-width {
            width: 50%; /* Adjust the width percentage as needed */
            max-width: 1400px; /* Set a maximum width if necessary */
            margin: 0 auto; /* Center the element horizontally */
            }
          </style>
            <div class="container mx-auto px-6 py-1 pb-16">
            <div class="relative inline-flex">
                    <select id="redirectSelect" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                        <option>Show</option>
                        <option value="{{ route('admin.intervenants.index')}}">Go back</option>
                        @foreach($intervenants as $intervenant)
                        <option value="{{ route('admin.detailsTickets.show', $intervenant->id) }}">{{ $intervenant->N_ticket }}</option>
                        @endforeach
                    </select>
              </div>
              <script>
              document.getElementById('redirectSelect').onchange = function() {
              var url = this.value;
              if (url) {
              window.location.href = url;
              }
              };
              </script>
              <div class="bg-white shadow-md rounded my-6 p-5">
              @foreach($intervenants as $intervenant)
                  <div class="flex flex-col space-y-2">
                    <label for="id" class="text-gray-700 select-none font-medium">Id</label>
                    <input id="id" type="number" name="id" value="{{ $intervenant->id }}"
                      placeholder="Votre id" class="px-4 py-2 rounded-lg border border-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-300"
                    readonly/>
                </div>
                <br/>
                <div class="flex flex-col space-y-2">
                    <label for="type_demande" class="text-gray-700 select-none font-medium">Type demande</label>
                    <input id="type_demande" type="text" name="type_demande" value="{{ $intervenant->type_demande }}"
                      placeholder="Votre type demande" class="px-4 py-2 rounded-lg border border-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-300"
                    readonly/>
                </div>
        <br/>
                <div class="flex flex-col space-y-2">
                    <label for="date_creation" class="text-gray-700 select-none font-medium">Date creation</label>
                    <input id="date_creation"  name="date_creation" value="{{ $intervenant->date_creation }}"
                      placeholder="Votre date creation" class="px-4 py-2 rounded-lg border border-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-300"
                    readonly/>
                </div>
                <br/>
                <div class="flex flex-col space-y-2">
                    <label for="date_modification" class="text-gray-700 select-none font-medium">La derniere date modification</label>
                    <input id="date_modification" name="date_modification" value="{{ $intervenant->date_modification }}"
                      placeholder="Votre date modification" class="px-4 py-2 rounded-lg border border-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-300"
                    readonly/>
                </div>
                <br/>
                <div class="flex flex-col space-y-2">
                    <label for="description" class="text-gray-700 select-none font-medium">Description </label>
                    <textarea name="description" id="description" placeholder="Votre description" class="px-4 py-2 rounded-lg border border-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-300" rows="5" readonly>
                      {{ $intervenant->description }}
                    </textarea>
                </div>
<br/>
                <div class="flex flex-col space-y-2">
                    <label for="N_ticket" class="text-gray-700 select-none font-medium">N_ticket</label>
                    <input id="N_ticket" type="number" name="N_ticket" value="{{ $intervenant->N_ticket }}"
                      placeholder="Votre N_ticket" class="px-4 py-2 rounded-lg border border-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-300"
                    readonly/>
                </div>
<br/>
                <div class="flex flex-col space-y-2">
                    <label for="priorite" class="text-gray-700 select-none font-medium">Priorite</label>
                    <input id="priorite" type="text" name="priorite" value="{{ $intervenant->priorite }}"
                      placeholder="Votre priorite" class="px-4 py-2 rounded-lg border border-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-300"
                    readonly/>
                </div>
<br/>
                <div class="flex flex-col space-y-2">
                    <label for="matricule_employe" class="text-gray-700 select-none font-medium">Matricule employe</label>
                    <input id="matricule_employe" type="text" name="matricule_employe" value="{{ $intervenant->matricule_employe }}"
                      placeholder="Votre Nom employe" class="px-4 py-2 rounded-lg border border-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-300"
                    readonly/>
                </div>
<br/>
                <div class="flex flex-col space-y-2">
                    <label for="matricule_intervenant" class="text-gray-700 select-none font-medium">Matricule intervenant</label>
                    <input id="matricule_intervenant" type="text" name="matricule_intervenant" value="{{ $intervenant->matricule_intervenant }}"
                      placeholder="Votre Nom intervenant" class="px-4 py-2 rounded-lg border border-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-300"
                    readonly/>
                </div>
<br/>
                <div class="flex flex-col space-y-2">
                    <label for="description_resolution" class="text-gray-700 select-none font-medium">Description resolution </label>
                    <textarea name="description_resolution" id="description_resolution" placeholder="Votre description resolution" class="px-4 py-2 rounded-lg border border-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-300" rows="6" readonly>
                    {{ $intervenant->description_resolution }}
                    </textarea>
                </div>
<br/>
                <div class="flex flex-col space-y-2">
                    <label for="etat" class="text-gray-700 select-none font-medium">Etat</label>
                    <input id="etat" type="text" name="etat" value="{{ $intervenant->etat }}"
                      placeholder="Votre  etat" class="px-4 py-2 rounded-lg border border-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-300"
                    readonly/>
                </div>
                @endforeach
              </div>
            </div>
        </main>
    </div>
</div>
</x-app-layout>
