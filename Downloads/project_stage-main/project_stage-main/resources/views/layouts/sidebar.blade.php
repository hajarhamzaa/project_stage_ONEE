<div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-blue-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
            <div class="flex items-center justify-center mt-8">
                <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40">
                   <circle cx="12" cy="10" r="8" fill="blue-700"/>
                   <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-.5-11h1V14h-1v-5zm1-.5c-.28 0-.5.22-.5.5v3c0 .28.22.5.5.5s.5-.22.5-.5v-3c0-.28-.22-.5-.5-.5z" fill="black"/>
                </svg>
                    <a href="{{ route('admin.dashboard') }}">
                        <span class="text-white text-2xl mx-2 font-semibold">ONEE</span>
                    </a>
                </div>
            </div>

            <nav class="mt-10">
                <a class="flex items-center mt-4 py-2 px-6 text-white-500 hover:bg-white-700 hover:bg-opacity-25 hover:text-white-100 {{ Route::currentRouteNamed('admin.dashboard') ? 'active' : '' }} " href="{{ route('admin.dashboard')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                       <path d="M12 2L3 9v13h6v-9h6v9h6V9z"/>
                    </svg>

                    <span class="mx-3">Acceuil</span>
                </a>
                @canany('User access','User add','User edit','User delete')
                <a class="flex items-center mt-4 py-2 px-6 text-white-500 hover:bg-white-700 hover:bg-opacity-25 hover:text-white-100 {{ Route::currentRouteNamed('admin.users.index') ? 'active' : '' }}"
                    href="{{ route('admin.users.index')}}">
                    <span class="inline-flex justify-center items-center">
                    <svg class="w-6 h-6 text-black-800 dark:text-black " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
    <path fill-rule="evenodd" d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1c0-.6.4-1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
  </svg>

                </span>

                    <span class="mx-3">Utilisateur</span>
                </a>
                @endcanany

                @foreach(auth()->user()->roles as $role)
                @if($role->name==='Intervenant')
                <a class="flex items-center mt-4 py-2 px-6 text-white-500 hover:bg-white-700 hover:bg-opacity-25 hover:text-white-100 {{ Route::currentRouteNamed('admin.intervenants.index') ? 'active' : '' }}"
                    href="{{ route('admin.intervenants.index')}}">
                <span class="inline-flex justify-center items-center">
                <svg class="w-6 h-6 text-dark-800 dark:dark-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v15c0 .6.4 1 1 1h15M8 16l2.5-5.5 3 3L17.3 7 20 9.7"/>
                </svg>
                </span>
                    <span class="mx-3">Reagire Tickets</span>
                </a>
                @endif
                @endforeach

                @foreach(auth()->user()->roles as $role)
                @if($role->name==='Empolyee')
                <a class="flex items-center mt-4 py-2 px-6 text-white-500 hover:bg-white-700 hover:bg-opacity-25 hover:text-white-100 {{ Route::currentRouteNamed('admin.demanderTickets.index') ? 'active' : '' }}"
                    href="{{ route('admin.demanderTickets.index')}}">
                <span class="inline-flex justify-center items-center">
                <svg class="w-6 h-6 text-black-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                   <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z" clip-rule="evenodd"/>
                </svg>
                </span>

                    <span class="mx-3">Demander Tickets</span>
                </a>


                <a class="flex items-center mt-4 py-2 px-6 text-white-500 hover:bg-white-700 hover:bg-opacity-25 hover:text-white-100 {{ Route::currentRouteNamed('admin.historiqueDemandes.index') ? 'active' : '' }}"
                    href="{{ route('admin.historiqueDemandes.index')}}">
                <span class="inline-flex justify-center items-center">
                <svg class="w-6 h-6 text-black-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                   <path fill-rule="evenodd" d="M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0 1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829 6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0 0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z" clip-rule="evenodd"/>
                </svg>
                <span class="mx-3">Historique </span>
                </a>

                @endif
                @endforeach




                @canany('Role access','Role add','Role edit','Role delete')
                <a class="flex items-center mt-4 py-2 px-6 text-white-500 hover:bg-white-700 hover:bg-opacity-25 hover:text-white-100 {{ Route::currentRouteNamed('admin.roles.index') ? 'active' : '' }}"
                    href="{{ route('admin.roles.index') }}">
                    <svg class="w-6 h-6 text-dark-800 dark:text-dark" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M10.8 5a3 3 0 0 0-5.6 0H4a1 1 0 1 0 0 2h1.2a3 3 0 0 0 5.6 0H20a1 1 0 1 0 0-2h-9.2ZM4 11h9.2a3 3 0 0 1 5.6 0H20a1 1 0 1 1 0 2h-1.2a3 3 0 0 1-5.6 0H4a1 1 0 1 1 0-2Zm1.2 6H4a1 1 0 1 0 0 2h1.2a3 3 0 0 0 5.6 0H20a1 1 0 1 0 0-2h-9.2a3 3 0 0 0-5.6 0Z"/>
                    </svg>


                    <span class="mx-3">Role</span>
                </a>
                @endcanany

                @canany('Permission access','Permission add','Permission edit','Permission delete')
                 <a class="flex items-center mt-4 py-2 px-6 text-white-500 hover:bg-white-700 hover:bg-opacity-25 hover:text-white-100 {{ Route::currentRouteNamed('admin.permissions.index') ? 'active' : '' }}"
                    href="{{ route('admin.permissions.index') }}">
                    <svg class="w-6 h-6 text-dark-800 dark:text-dark" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M8 3c0-.6.4-1 1-1h6c.6 0 1 .4 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-6 8c0-.6.4-1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1 3a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"/>
                    </svg>



                    <span class="mx-3">Service</span>
                </a>
                @endcanany

                <!-- @canany('Service access','Service add','Service edit','Service delete')
                 <a class="flex items-center mt-4 py-2 px-6 text-white-500 hover:bg-white-700 hover:bg-opacity-25 hover:text-white-100 {{ Route::currentRouteNamed('admin.services.index') ? 'active' : '' }}"
                    href="{{ route('admin.services.index') }}">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z">
                        </path>
                    </svg>

                    <span class="mx-3">Services</span>
                </a>
                @endcanany -->

                 @canany('Post access','Post add','Post edit','Post delete')
                 <a class="flex items-center mt-4 py-2 px-6 text-white-500 hover:bg-white-700 hover:bg-opacity-25 hover:text-white-100 {{ Route::currentRouteNamed('admin.posts.index') ? 'active' : '' }}"
                    href="{{ route('admin.posts.index')}}">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="24" height="24">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C6.48 2 2 6.48 2 12c0 3.86 2.23 7.25 5.44 9.03-.04-.77-.44-1.47-1.06-1.99-.64-.53-1.51-.78-2.39-.67C2.89 18.29 2 15.76 2 12c0-5.52 4.48-10 10-10s10 4.48 10 10-4.48 10-10 10c-1.95 0-3.76-.57-5.29-1.54-.88-.11-1.75.14-2.39.67-.62.52-1.02 1.22-1.06 1.99C9.77 19.25 12 15.86 12 12c0-1 .12-1.97.35-2.91C11.13 8.38 9.69 7 8 7c-.55 0-1 .45-1 1s .45 1,1,1c .55,0, .99, .45, .99,1s -.45,1,-1,1c -.55,0,- .99,.45,- .99,1s,.45,1,1,1c .55,0,.99,.45,.99,1s -.45,.99,- .99, .99c -3 ,0,-5 ,2 ,-5 ,5s2 ,5 ,5 ,5c3 ,0 ,5 ,-2 ,5 ,-5c0 ,- .34,- .03 ,- .68,- .09 ,-1H17c - .55 ,0 ,-1 ,- .45 ,-1 ,-1V11h -4 c - .55 ,0 ,-1 ,- .45 ,-1 ,-1V4 c0 ,- .55 , - .45 ,-1 ,- - .45S12 ,3 ,12 ,3s -4 , -3 ,-4 , -3S7 ,2 ,7 ,3v6 c0 , .55 ,- .45 ,1 ,- - .45S6 ,11 ,6 ,11H2 c - .55 ,0,-1,.45,-1,1v8 c0,.55,.45,1,1,1h4 c,.55,0,1,- .45,1,- - .45S8,15,8,14V13h4 c,.55,0,1,- .45,1,- - .45S13,12,13,11V7 c0,- .55,.45,- - -.01,- -.91C13,.97,,12,.97,,12,.97ZM14,,14,,14,,14,,14ZM16,,16,,16,,16,,16Z"/>
                    </svg>


                    <span class="mx-3">Post US</span>
                </a>
                @endcanany

                @foreach(auth()->user()->roles as $role)
                @if($role->name==='admin')
                <a class="flex items-center mt-4 py-2 px-6 text-white-500 hover:bg-white-700 hover:bg-opacity-25 hover:text-white-100 {{ Route::currentRouteNamed('admin.mail.index') ? 'active' : '' }}"
                    href="{{ route('admin.mail.index')}}">
                    <svg class="w-6 h-6 text-black-800 dark:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                      <path fill-rule="evenodd" d="M9.6 2.6A2 2 0 0 1 11 2h2a2 2 0 0 1 2 2l.5.3a2 2 0 0 1 2.9 0l1.4 1.3a2 2 0 0 1 0 2.9l.1.5h.1a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2l-.3.5a2 2 0 0 1 0 2.9l-1.3 1.4a2 2 0 0 1-2.9 0l-.5.1v.1a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2l-.5-.3a2 2 0 0 1-2.9 0l-1.4-1.3a2 2 0 0 1 0-2.9l-.1-.5H4a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2l.3-.5a2 2 0 0 1 0-2.9l1.3-1.4a2 2 0 0 1 2.9 0l.5-.1V4c0-.5.2-1 .6-1.4ZM8 12a4 4 0 1 1 8 0 4 4 0 0 1-8 0Z" clip-rule="evenodd"/>
                    </svg>

                    <span class="mx-3">Parametres</span>
                </a>
                @endif
                @endforeach



            </nav>
        </div>
