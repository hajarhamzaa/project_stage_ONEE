<x-app-layout>                         
   <div>
    
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-2">
            <div class="relative inline-flex">
            @foreach($intervenants as $intervenant)
              @if($intervenant->etat == 'Chance')
              <div class="flex flex-col space-y-2">
                <select id="etat" type="text" name="etat" value="{{ old('etat',$intervenant->etat) }}" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                    <option value="{{ $intervenant->etat }}">-01 {{ $intervenant->etat }}</option>
                </select>
                <br/>
              </div>
              @endif
              @endforeach
              <div class="grid grid-cols-3 gap-4">
                  <div class="relative inline-flex">
                    <select id="redirectSelect" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                        <option value="">Afficher details</option>
                        @foreach($intervenants as $intervenant)
                        <option value="{{ route('admin.detailsTickets.show', $intervenant->id) }}">{{ $intervenant->N_ticket }}</option>
                        @endforeach
                    </select>
                  </div>
              </div>
              <script>
              document.getElementById('redirectSelect').onchange = function() {
              var url = this.value;
              if (url) {
              window.location.href = url;
              }
              };
              setTimeout(function() {
                      document.getElementById('successMessage').style.display = 'none';
                  }, 3000);
              </script>            
              </div>
              <div class="bg-white shadow-md rounded my-6">
                <table class="text-left w-full border-collapse">
                  <thead>
                    <tr>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Type de ticket</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Description</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right">N_ticket</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Priorite</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Nom Intervenant</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right">Etat</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right">Date de creation</th>
                    </tr>
                  </thead>
                  <tbody> 
                      @foreach($intervenants as $intervenant)
                      <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">{{ $intervenant->type_demande }}</td>
                        <td class="py-4 px-6 border-b border-grey-light">{{ $intervenant->description }}</td>
                        <td class="py-4 px-6 border-b border-grey-light">
                        <span class="inline-flex items-center justify-center px-3 py-3 mr-0 text-xs font-bold leading-none text-white bg-gray-600 rounded-full">
                        {{ $intervenant->N_ticket }}
                        </span>
                        </td>
                        <td class="py-4 px-6 border-b border-grey-light">{{ $intervenant->priorite }}</td>
                        <td class="py-4 px-6 border-b border-grey-light">
                        @if($intervenant->etat == 'En attente')
                        <div class="loader1"></div>
                        @elseif($intervenant->etat == 'Chance')
                        @unless($intervenant->hasErrors)
                        <div class="loader1"></div>
                        @endunless
                        @foreach ($intervenantsWithErrors as $intervenant)
                        @if($intervenant->hasErrors)
                        <a href="#" title="Systeme occupes">
                        <svg class="w-7 h-7 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                          <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9-3a1 1 0 1 0-2 0v6a1 1 0 1 0 2 0V9Zm4 0a1 1 0 1 0-2 0v6a1 1 0 1 0 2 0V9Z" clip-rule="evenodd"/>
                        </svg>
                        </a>
                        @endif
                        @endforeach
                        @elseif(in_array($intervenant->etat, ['En cours', 'Fin', 'Refuser']))
                        <span class="text-white inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-yellow-500 rounded-full">{{ auth()->user()->name }}</span>
                        @endif
                        </td>
                        @if($intervenant->etat == 'En attente')
                        <td class="py-4 px-6 border-b border-grey-light">
                        <a href="{{route('admin.intervenants.edit',['intervenant' => $intervenant->id])}}">
                        <svg class="w-6 h-6 text-black-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 14v4.833A1.166 1.166 0 0 1 16.833 20H5.167A1.167 1.167 0 0 1 4 18.833V7.167A1.166 1.166 0 0 1 5.167 6h4.618m4.447-2H20v5.768m-7.889 2.121 7.778-7.778"/>
                        </svg>
                        </a>
                        </td>
                        @elseif($intervenant->etat == 'En cours')
                        <td class="py-4 px-6 border-b border-grey-light">
                        <a href="{{route('admin.intervenants.show',['intervenant' => $intervenant->id])}}">
                        <svg class="w-6 h-6 text-blue-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16 10 3-3m0 0-3-3m3 3H5v3m3 4-3 3m0 0 3 3m-3-3h14v-3"/>
                        </svg>
                        </a>
                        </td>
                        @elseif($intervenant->etat == 'Fin')
                        <td class="py-4 px-6 border-b border-grey-light">
                        <a href="{{route('admin.finaliserTicket.show',$intervenant->id)}}">
                        <svg class="w-6 h-6 text-green-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                           <path fill-rule="evenodd" d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm13.7-1.3a1 1 0 0 0-1.4-1.4L11 12.6l-1.8-1.8a1 1 0 0 0-1.4 1.4l2.5 2.5c.4.4 1 .4 1.4 0l4-4Z" clip-rule="evenodd"/>
                        </svg>
                        </a>
                        </td>
                        @elseif($intervenant->etat == 'Chance')
                        @foreach ($intervenantsWithErrors as $intervenant)
                        @if($intervenant->hasErrors)
                        <td class="py-4 px-6 border-b border-red-light">
                        <a href="#" id="openDialogBtn" title="La ticket contient des erreurs">
                        <svg class="w-7 h-7 text-red-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                          <path d="M18 17h-.09c.058-.33.088-.665.09-1v-1h1a1 1 0 0 0 0-2h-1.09a5.97 5.97 0 0 0-.26-1H17a2 2 0 0 0 2-2V8a1 1 0 1 0-2 0v2h-.54a6.239 6.239 0 0 0-.46-.46V8a3.963 3.963 0 0 0-.986-2.6l.693-.693A1 1 0 0 0 16 4V3a1 1 0 1 0-2 0v.586l-.661.661a3.753 3.753 0 0 0-2.678 0L10 3.586V3a1 1 0 1 0-2 0v1a1 1 0 0 0 .293.707l.693.693A3.963 3.963 0 0 0 8 8v1.54a6.239 6.239 0 0 0-.46.46H7V8a1 1 0 0 0-2 0v2a2 2 0 0 0 2 2h-.65a5.97 5.97 0 0 0-.26 1H5a1 1 0 0 0 0 2h1v1a6 6 0 0 0 .09 1H6a2 2 0 0 0-2 2v2a1 1 0 1 0 2 0v-2h.812A6.012 6.012 0 0 0 11 21.907V12a1 1 0 0 1 2 0v9.907A6.011 6.011 0 0 0 17.188 19H18v2a1 1 0 0 0 2 0v-2a2 2 0 0 0-2-2Zm-4-8.65a5.922 5.922 0 0 0-.941-.251l-.111-.017a5.52 5.52 0 0 0-1.9 0l-.111.017A5.925 5.925 0 0 0 10 8.35V8a2 2 0 1 1 4 0v.35Z"/>
                        </svg>
                        </a>
                        <div id="CustomDialog" class="custom-modal">
                            <div class="custom-modal-content">
                                <div class="custom-modal-header">
                                <svg class="w-7 h-7 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.529 9.988a2.502 2.502 0 1 1 5 .191A2.441 2.441 0 0 1 12 12.582V14m-.01 3.008H12M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                                <p>La boite d'informer</p>
                                    <button id="closeDialogBtn" class="custom-close-btn">
                                    <svg class="w-7 h-7 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                                    </svg>
                                    </button>
                                </div>
                                <div class="custom-modal-body">
                                    <p>Tu peux supprimer ce ticket, il contient des erreurs opérationnelles.</p>
                                </div>
                                <div class="custom-modal-footer">
                                  <form method="POST" action="{{ route('admin.intervenants.destroy', $intervenant->id) }}">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="bg-green-600 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-green-400 transition-colors flex items-center">
                                          <svg class="w-7 h-7 text-white-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                              <path d="m4 15.6 3.055-3.056A4.913 4.913 0 0 1 7 12.012a5.006 5.006 0 0 1 5-5c.178.009.356.027.532.054l1.744-1.744A8.973 8.973 0 0 0 12 5.012c-5.388 0-10 5.336-10 7A6.49 6.49 0 0 0 4 15.6Z" />
                                              <path d="m14.7 10.726 4.995-5.007A.998.998 0 0 0 18.99 4a1 1 0 0 0-.71.305l-4.995 5.007a2.98 2.98 0 0 0-.588-.21l-.035-.01a2.981 2.981 0 0 0-3.584 3.583c0 .012.008.022.01.033.05.204.12.402.211.59l-4.995 4.983a1 1 0 1 0 1.414 1.414l4.995-4.983c.189.091.386.162.59.211.011 0 .021.007.033.01a2.982 2.982 0 0 0 3.584-3.584c0-.012-.008-.023-.011-.035a3.05 3.05 0 0 0-.21-.588Z" />
                                              <path d="m19.821 8.605-2.857 2.857a4.952 4.952 0 0 1-5.514 5.514l-1.785 1.785c.767.166 1.55.25 2.335.251 6.453 0 10-5.258 10-7 0-1.166-1.637-2.874-2.179-3.407Z" />
                                          </svg>
                                          Invisibler
                                      </button>
                                  </form>
                              </div>
                            </div>
                        </div>

                        <script>
                            const openDialogBtn = document.getElementById('openDialogBtn');
                            const customDialog = document.getElementById('CustomDialog');
                            const closeDialogBtn = document.getElementById('closeDialogBtn');
                            const deleteTicketBtn = document.getElementById('deleteTicketBtn');

                            openDialogBtn.addEventListener('click', function() {
                                customDialog.style.display = "block";
                            });

                            closeDialogBtn.addEventListener('click', function() {
                                customDialog.style.display = "none";
                            });

                            deleteTicketBtn.addEventListener('click', function() {
                                console.log("Ticket deleted.");
                                customDialog.style.display = "none";
                            });
                        </script>
                        </td>
                        @elseif($intervenant->etat == 'Chance')
                        <td class="py-4 px-6 border-b border-grey-light">
                        <a href="#" id="openModal">
                        <svg class="w-6 h-6 text-dark-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h3a3 3 0 0 0 0-6h-.025a5.56 5.56 0 0 0 .025-.5A5.5 5.5 0 0 0 7.207 9.021C7.137 9.017 7.071 9 7 9a4 4 0 1 0 0 8h2.167M12 19v-9m0 0-2 2m2-2 2 2"/>
                        </svg>
                        </a>
                        <div id="modal" class="modal">
                          <!-- Modal content -->
                          <div class="modal-content">
                            <span class="close">&times;</span>
                            <h2>Change l'etat</h2>
                            <form method="POST" action="{{ route('admin.intervenants.update', ['intervenant' => $intervenant->id])}}">
                              @csrf
                              @method('put')
                              <div class="flex flex-col space-y-2">
                                <label for="etat" class="text-gray-700 select-none font-medium">Les etas disponibles</label>
                                <select id="etat" name="etat" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                                  <option value="{{ $intervenant->etat }}">{{ $intervenant->etat }}</option>
                                  <option value="En cours">En cours</option>
                                </select>
                              </div>
                              <div class="text-center mt-4">
                                <button type="submit" class="bg-green-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-green-400 transition-colors">Change</button>
                              </div>
                            </form>
                          </div>
                        </div>
                        <script>
                        var modal = document.getElementById("modal");
                        var btn = document.getElementById("openModal");
                        var span = document.getElementsByClassName("close")[0];
                        btn.onclick = function() {
                          modal.style.display = "block";
                        }
                        span.onclick = function() {
                          modal.style.display = "none";
                        }
                        window.onclick = function(event) {
                          if (event.target == modal) {
                            modal.style.display = "none";
                          }
                        }
                        </script>
                        </td>
                        @endif
                        @endforeach
                        
                        @elseif($intervenant->etat == 'Refuser')
                        <td class="py-4 px-6 border-b border-red-light">
                        <form  method="POST" action="{{ route('admin.intervenants.destroy',$intervenant->id)}}">
                            @csrf
                              @method('DELETE')
                            <button type="submit">
                            <svg class="w-6 h-6 text-red-800 red:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                              <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z" clip-rule="evenodd"/>
                            </svg>
                            </button>
                        </form>
                        </td>
                        @endif
                        <td class="py-4 px-6 border-b border-grey-light">
                          {{$intervenant->date_creation}}
                        </td>
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
