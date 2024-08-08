<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-1 pb-16">
                <div class="bg-white shadow-md rounded my-6 p-5">
                    <form method="POST" action="{{ route('admin.demanderTickets.store') }}">
                        <h3 class="text-gray-700 text-3xl font-medium">
                            {{ auth()->user()->name }}
                            <h4 class="text-green-700 text-3xl font-medium">
                                Trouver votre choix Ticket
                            </h4>
                        </h3>
                        <br />
                        @csrf
                        @method('post')
                        <div class="flex flex-col space-y-2">
                            <label for="type_demande" class="text-gray-700 select-none font-medium">Type demande</label>
                            <select id="type_demande" name="type_demande" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200">
                                <option value="HARD">HARD</option>
                                <option value="SOFT">SOFT</option>
                            </select>
                        </div>

                        <div class="flex flex-col space-y-2">
                            <label for="date_creation" class="text-gray-700 select-none font-medium">Date creation</label>
                            <input id="date_creation" type="date" name="date_creation" value="{{ old('date_creation') }}" placeholder="Enter date_creation" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div>


                        <div class="flex flex-col space-y-2">
                            <label for="description" class="text-gray-700 select-none font-medium">Description </label>
                            <textarea name="description" id="description" placeholder="Enter description" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" rows="5">Decrir votre Ticket</textarea>
                        </div>

                        <div class="flex flex-col space-y-2">
                            <label for="N_ticket" class="text-gray-700 select-none font-medium">N ticket</label>
                            <input id="N_ticket" type="text" name="N_ticket" placeholder="Enter N_ticket" aria-label="disabled input" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" readonly/>
                        </div>

                        <div class="flex flex-col space-y-2">
                            <label for="priorite" class="text-gray-700 select-none font-medium">Priorite</label>
                            <select id="priorite" name="priorite" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200">
                                <option value="Urgente">Urgente</option>
                                <option value="Normale">Normale</option>
                                <option value="Faible">Faible</option>
                            </select>
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label for="matricule_employe" class="text-gray-700 select-none font-medium">Nom employe </label>
                            <input id="matricule_employe" type="text" name="matricule_employe" placeholder="Enter Nom employe" value="{{ auth()->user()->name }}" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" readonly/>
                        </div>
                    
                        <div class="flex flex-col space-y-2">
                            <label for="etat" class="text-gray-700 select-none font-medium">Etat </label>
                            <input id="etat" type="text" aria-label="disabled input" name="etat" placeholder="Enter etat" value="En attente" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" readonly />
                        </div>
                        <div class="text-center mt-16 mb-16">
                            <button type="submit" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors">Confirmer</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <script>
    function generateTicketNumber() {
        const currentDate = new Date();
        const year = currentDate.getFullYear().toString().slice(-2); 
        const month = String(currentDate.getMonth() + 1).padStart(2, '0'); 
        const day = String(currentDate.getDate()).padStart(2, '0'); 
        const randomNumber = Math.floor(Math.random() * 1000);  
        const ticketNumber = `${year}${month}${day}${randomNumber}`;
        return ticketNumber;
    }

    window.onload = function() {
        const ticketNumber = generateTicketNumber();
        document.getElementById('N_ticket').value = ticketNumber;
    }
</script>
</x-app-layout>