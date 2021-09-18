<x-dashboard-layout>
    <style>
        .tatu-btn {
            pointer-events: auto;
            cursor: pointer;
            background: #e7e7e7;
            border: none;
            padding: 1.5rem 3rem;
            margin: 0;
            font-family: inherit;
            font-size: inherit;
            position: relative;
            display: inline-block;
            background-color: #0A2558;
            color: #fff;
        }

        .tatu-btn::before,
        .tatu-btn::after {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .tatu-btn--janus {
            font-family: freight-display-pro, serif;
            font-weight: 900;
            width: 175px;
            height: 120px;
            color: #fff;
            background: none;
        }

        .tatu-btn--janus::before {
            content: '';
            background: #e6e6e6;
            -webkit-clip-path: path("M154.5,88.5 C131,113.5 62.5,110 30,89.5 C-2.5,69 -3.5,42 4.5,25.5 C12.5,9 33.5,-6 85,3.5 C136.5,13 178,63.5 154.5,88.5 Z");
            clip-path: path("M154.5,88.5 C131,113.5 62.5,110 30,89.5 C-2.5,69 -3.5,42 4.5,25.5 C12.5,9 33.5,-6 85,3.5 C136.5,13 178,63.5 154.5,88.5 Z");
            transition: clip-path 0.5s cubic-bezier(0.585, 2.5, 0.645, 0.55), -webkit-clip-path 0.5s cubic-bezier(0.585, 2.5, 0.645, 0.55), background 0.5s ease;
        }

        .tatu-btn--janus:hover::before {
            background: #000;
            -webkit-clip-path: path("M143,77 C117,96 74,100.5 45.5,91.5 C17,82.5 -10.5,57 5.5,31.5 C21.5,6 79,-5.5 130.5,4 C182,13.5 169,58 143,77 Z");
            clip-path: path("M143,77 C117,96 74,100.5 45.5,91.5 C17,82.5 -10.5,57 5.5,31.5 C21.5,6 79,-5.5 130.5,4 C182,13.5 169,58 143,77 Z");
        }

        .tatu-btn--janus::after {
            content: '';
            height: 86%;
            width: 97%;
            top: 5%;
            border-radius: 58% 42% 55% 45% / 56% 45% 55% 44%;
            border: 1px solid #000;
            transform: rotate(-20deg);
            z-index: -1;
            transition: transform 0.5s cubic-bezier(0.585, 2.5, 0.645, 0.55);
        }

        .tatu-btn--janus:hover::after {
            transform: translate3d(0, -5px, 0);
        }

        .tatu-btn--janus span {
            display: block;
            transition: transform 0.3s ease;
            mix-blend-mode: difference;
        }

        .tatu-btn--janus:hover span {
            transform: translate3d(0, -10px, 0);
        }
    </style>

    <div class="home-content bg-white border-2 border-gray-300 lg:rounded lg:shadow-md px-96">
        <div style="margin: 0 0 0 8rem;">
            <x-jet-validation-errors class="mb-4" />
        </div>
        <form class="w-3/5 px-4 sm:px-8 md:px-16 lg:px-24 xl:px-32 mx-auto mt-12" style="margin: 3rem 3rem 0 3rem;" action="{{ route('driver.update', $driver->id) }}" method="post">
            @csrf
            {{method_field('PATCH')}}
            <div class="flex flex-wrap -mx-3">
                <div class="w-full md:w-1/2 lg:border-r-2 border-gray-300" style="margin: .5rem 0;">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 px-3" for="name">
                        Name
                    </label>
                    <div class="px-3">
                        <input class="bg-gray-200 focus:bg-gray-100 block w-full text-gray-700 
                                                border-b-2 rounded py-3 px-4 mb-3 leading-tight 
                                                focus:outline-none focus:border-gray-500" id="name" name="name" type="text" value="{{ $driver->user->name }}" placeholder="Name" required>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:border-r-2 border-gray-300" style="margin: .5rem 0;">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 px-3" for="email">
                        Email
                    </label>


                    <div class="px-3">
                        <input class="bg-gray-200 focus:bg-gray-100 block w-full text-gray-700 
                                                border-b-2 rounded py-3 px-4 mb-3 leading-tight 
                                                focus:outline-none focus:border-gray-500" name="email" placeholder="Email" value="{{ $driver->user->email }}" type="email" id="email" required>

                        </input>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap -mx-3">
                <div class="w-full md:w-1/2 lg:border-r-2 border-gray-300" style="margin: .5rem 0;">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 px-3" for="phone_number">
                        Phone Number
                    </label>
                    <div class="px-3">
                        <input class="bg-gray-200 focus:bg-gray-100 block w-full text-gray-700 
                                                border-b-2 rounded py-3 px-4 mb-3 leading-tight 
                                                focus:outline-none focus:border-gray-500" id="phone_number" value="{{ $driver->user->phone_number }}" name="phone_number" type="text" placeholder="Phone Number" required>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:border-r-2 border-gray-300" style="margin: .5rem 0;">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 px-3" for="id_number">
                        ID Number
                    </label>
                    <div class="px-3">
                        <input class="bg-gray-200 focus:bg-gray-100 block w-full text-gray-700 
                                                border-b-2 rounded py-3 px-4 mb-3 leading-tight 
                                                focus:outline-none focus:border-gray-500" type="text" name="id_number" value="{{ $driver->id_number }}" id="id_number" placeholder="ID Number" required>

                        </input>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap -mx-3">
                <div class="w-full md:w-1/2 lg:border-r-2 border-gray-300" style="margin: .5rem 0;">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 px-3" for="registration_number">
                        Registration Number
                    </label>
                    <div class="px-3">
                        <input class="bg-gray-200 focus:bg-gray-100 block w-full text-gray-700 
                                                border-b-2 rounded py-3 px-4 mb-3 leading-tight 
                                                focus:outline-none focus:border-gray-500" id="registration_number" value="{{ $driver->registration_number }}" name="registration_number" type="text" placeholder="Registration Number" required>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:border-r-2 border-gray-300" style="margin: .5rem 0;">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 px-3" for="capacity">
                        Capacity
                    </label>
                    <div class="px-3">
                        <input class="bg-gray-200 focus:bg-gray-100 block w-full text-gray-700 
                                                border-b-2 rounded py-3 px-4 mb-3 leading-tight 
                                                focus:outline-none focus:border-gray-500" type="text" name="capacity" value="{{ $driver->capacity }}" id="capacity" placeholder="Capacity" required>

                        </input>
                    </div>
                </div>
            </div>
            <!-- sticky footer -->
            <footer class="flex justify-center px-8 pb-8 pt-4 mt-4 bg-red-500" style="margin: 1rem 0 3rem 0;">
                <button id="submit" class="tatu-btn rounded-lg">
                    Update Driver
                </button>
            </footer>
        </form>
    </div>

    <script>
        // click the hidden input of type file if the visible button is clicked
        // and capture the selected files
        const hidden = document.getElementById("hidden-input");
        const fileTempl = document.getElementById("file-template"),
            imageTempl = document.getElementById("image-template"),
            empty = document.getElementById("empty");
        // use to store pre selected files
        let FILES = {};
        // check if file is of type image and prepend the initialied
        // template to the target element
        function addFile(target, file) {
            const isImage = file.type.match("image.*"),
                objectURL = URL.createObjectURL(file);
            const clone = isImage ?
                imageTempl.content.cloneNode(true) :
                fileTempl.content.cloneNode(true);
            clone.querySelector("h1").textContent = file.name;
            clone.querySelector("li").id = objectURL;
            clone.querySelector(".delete").dataset.target = objectURL;
            clone.querySelector(".size").textContent =
                file.size > 1024 ?
                file.size > 1048576 ?
                Math.round(file.size / 1048576) + "mb" :
                Math.round(file.size / 1024) + "kb" :
                file.size + "b";
            isImage &&
                Object.assign(clone.querySelector("img"), {
                    src: objectURL,
                    alt: file.name
                });
            empty.classList.add("hidden");
            target.prepend(clone);
            FILES[objectURL] = file;
            console.log(FILES);
            console.log(hidden.files);
        }
        const gallery = document.getElementById("gallery"),
            overlay = document.getElementById("overlay");
        document.getElementById("button").onclick = (e) => {
            e.preventDefault();
            hidden.click();
        };
        hidden.onchange = (e) => {
            for (const file of e.target.files) {
                addFile(gallery, file);
            }

        };
        // use to check if a file is being dragged
        const hasFiles = ({
                dataTransfer: {
                    types = []
                }
            }) =>
            types.indexOf("Files") > -1;
        // use to drag dragenter and dragleave events.
        // this is to know if the outermost parent is dragged over
        // without issues due to drag events on its children
        let counter = 0;
        // reset counter and append file to gallery when file is dropped
        function dropHandler(ev) {
            ev.preventDefault();
            for (const file of ev.dataTransfer.files) {
                addFile(gallery, file);
                overlay.classList.remove("draggedover");
                counter = 0;
            }
        }
        // only react to actual files being dragged
        function dragEnterHandler(e) {
            e.preventDefault();
            if (!hasFiles(e)) {
                return;
            }
            ++counter && overlay.classList.add("draggedover");
        }

        function dragLeaveHandler(e) {
            1 > --counter && overlay.classList.remove("draggedover");
        }

        function dragOverHandler(e) {
            if (hasFiles(e)) {
                e.preventDefault();
            }
        }
        // event delegation to caputre delete events
        // fron the waste buckets in the file preview cards
        gallery.onclick = ({
            target
        }) => {
            if (target.classList.contains("delete")) {
                const ou = target.dataset.target;
                document.getElementById(ou).remove(ou);
                gallery.children.length === 1 && empty.classList.remove("hidden");
                delete FILES[ou];
            }
        };
        // print all selected files
        // document.getElementById("submit").onclick = () => {
        //     alert(`Submitted Files:\n${JSON.stringify(FILES)}`);
        //     console.log(FILES);
        // };
        // clear entire selection
        document.getElementById("cancel").onclick = (e) => {
            e.preventDefault();
            while (gallery.children.length > 0) {
                gallery.lastChild.remove();
            }
            FILES = {};
            empty.classList.remove("hidden");
            gallery.append(empty);
        };
    </script>

    <style>
        .hasImage:hover section {
            background-color: rgba(5, 5, 5, 0.4);
        }

        .hasImage:hover button:hover {
            background: rgba(5, 5, 5, 0.45);
        }

        #overlay p,
        i {

            opacity: 0;
        }

        #overlay.draggedover {
            background-color: rgba(255, 255, 255, 0.7);
        }

        #overlay.draggedover p,
        #overlay.draggedover i {
            opacity: 1;
        }

        .group:hover .group-hover\:text-blue-800 {
            color: #2b6cb0;
        }
    </style>
</x-dashboard-layout>