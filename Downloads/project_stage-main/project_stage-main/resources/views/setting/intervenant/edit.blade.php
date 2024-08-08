<x-app-layout>
   <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-1 pb-16">
              <div class="bg-white shadow-md rounded my-6 p-5">
                <form method="POST" action="{{ route('admin.intervenants.update', ['intervenant' => $intervenant->id])}}">
                  @csrf
                  @method('put')
                  <div class="flex flex-col space-y-2">
                    <label for="etat" class="text-gray-700 select-none font-medium">Etat a reagir</label>
                    <select id="etat" type="text" name="etat" value="{{ old('etat',$intervenant->etat) }}"
                       class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none"
                    >
                    <option value="{{ $intervenant->etat }}">{{ $intervenant->etat }}</option>
                    <option value="En cours">En cours</option>
                    <!-- <option value="Fin">Fin</option>
                    <option value="Refuser">Refuser</option> -->
                    </select>
                    <br/>
                  </div>

                  <div class="flex flex-col space-y-2">
                    <label for="description" class="text-gray-700 select-none font-medium">Description </label>
                    <textarea name="description" id="description" placeholder="Enter description" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" rows="5">{{ old('description',$intervenant->description) }}</textarea>
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

                  <div class="text-center mt-16 mb-16">
                  <button type="submit" class="bg-red-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-red-500 transition-colors ">
                    Réagir
                  </button>
                  </div>
                </form>
              </div>
            </div>
        </main>
    </div>
</div>
</x-app-layout>
