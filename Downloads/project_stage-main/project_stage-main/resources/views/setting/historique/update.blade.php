<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-1 pb-16">
                <div class="bg-white shadow-md rounded my-6 p-5">
                    <form method="POST" action="{{ route('admin.historiqueDemandes.update', ['historiqueDemande' => $intervenant->id])}}">
                        <h3 class="text-gray-700 text-3xl font-medium">
                            {{ auth()->user()->name }}
                            <h4 class="text-green-600 text-3xl font-medium">
                                Votre chance Ticket reste
                            </h4>
                        </h3>
                        <br />
                        @csrf
                        @method('put')
                        <div class="flex flex-col space-y-2">
                            <label for="N_ticket" class="text-gray-700 select-none font-medium">N ticket</label>
                            <input id="N_ticket" type="number" name="N_ticket" placeholder="Enter N_ticket" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" readonly/>
                        </div>
                        <br>
                        <div class="flex flex-col space-y-2">
                            <label for="etat" class="text-gray-700 select-none font-medium">Etat Ticket</label>
                            <input id="etat" type="text" name="etat" placeholder="Enter etat" value="Chance" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" readonly /><br>
                        </div>
                        <br>
                        <div class="flex flex-col space-y-2">
                            <label for="date_modification" class="text-gray-700 select-none font-medium">Date chance</label>
                            <input id="date_modification" type="date" name="date_modification" placeholder="Enter date_modification"  class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"  /><br>
                        </div>
                        <br>
                        <div class="text-center mt-16 mb-16">
                            <button type="submit" class="bg-green-600 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-green-500 transition-colors">Confirmer</button>
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