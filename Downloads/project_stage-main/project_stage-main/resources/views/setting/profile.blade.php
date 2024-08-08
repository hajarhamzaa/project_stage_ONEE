<x-app-layout>
   <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-8">
                <h3 class="text-gray-700 text-3xl font-medium">Welcome : {{ auth()->user()->name }}</h3>
                  <div class="bg-white shadow-md rounded my-6 p-5">
                        <form method="POST" action="{{ route('admin.profile.update')}}" enctype="multipart/form-data">
                          @csrf
                          @method('put')
                          <div class="flex flex-col space-y-2">
                            <label for="name" class="text-gray-700 select-none font-medium">Nom</label>
                            <input id="name" type="text" name="name" value="{{ old('name',$user->name) }}"
                              placeholder="Enter name" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                            />
                        </div>

                        <div class="flex flex-col space-y-2">
                            <label for="email" class="text-gray-700 select-none font-medium">Email</label>
                            <input id="email" type="text" name="email" value="{{ old('email',$user->email) }}"
                              placeholder="Enter email" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                            />
                        </div>

                        <div class="flex text-gray-500 mt-5">
                            <div class="bg-white rounded-lg">
                              <div class="" x-data="imageData()">
                                <div x-show="previewUrl == '' && imgurl == ''">
                                  <p class="text-center uppercase text-bold">
                                    <label for="thumbnailprev" class="cursor-pointer">
                                      <svg class="w-8 h-8 text-green-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 8H4m8 3.5v5M9.5 14h5M4 6v13c0 .6.4 1 1 1h14c.6 0 1-.4 1-1V9c0-.6-.4-1-1-1h-5a1 1 0 0 1-.8-.4l-1.9-2.2a1 1 0 0 0-.8-.4H5a1 1 0 0 0-1 1Z"/>
                                      </svg>
                                    </label>
                                    <input type="file" name="profile" id="thumbnailprev"
                                        class="hidden thumbnailprev" @change="updatePreview()">
                                  </p>
                                </div>
                                <div x-show="previewUrl !== ''" class="relative w-24 h-24">
                                  <img :src="previewUrl" alt="" class="shadow-lg rounded-full max-w-full h-auto align-middle border-none h-full w-full object-cover">
                                  <div class="ml-5">
                                    <button type="button" class="" @click="clearPreview()">Change</button>
                                  </div>
                                </div>

                                <div x-show="imgurl !== ''" class="relative w-24 h-24">
                                  <img :src="imgurl" alt="" class="shadow-lg rounded-full max-w-full h-auto align-middle border-none h-full w-full object-cover">
                                  <div class="ml-5">
                                    <button type="button" class="" @click="clearPreview()">Change</button>
                                  </div>
                                </div>

                              </div>
                            </div>
                        </div>

                        <div class="text-center mt-16 mb-16">
                          <button type="submit" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">Modfier</button>
                        </div>
                  </div>
            </div>
        </main>
    </div>
</div>


<script>
    function imageData() {
        var files = document.getElementById("thumbnailprev").files;
        if(files.length == 0){
            var url = '/images/'+{!! json_encode($user->profile) !!};
        }else{
            url = '';
        }
      return {
        previewUrl: "",
        imgurl: url,
        updatePreview() {
          var reader, files = document.getElementById("thumbnailprev").files;
          reader = new FileReader();
          reader.onload = e => {
            this.previewUrl = e.target.result;
          };
          reader.readAsDataURL(files[0]);
        },
        clearPreview() {
          document.getElementById("thumbnailprev").value = null;
          this.previewUrl = "";
          this.imgurl     = "";
        }
      };
    }

</script>
</x-app-layout>
