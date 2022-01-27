@extends('layouts.app')

@section('title', 'Demander lui')

@section('navbar')
    <x-navbar></x-navbar>
@endsection

@section('content')
    <!-- component -->
    <form>
        <div class="bg-white">
            <div class="container mx-auto px-40">

                <h3 class="text-gray-600 text-2xl font-medium pb-2">Ajouter un service</h3>
                <div class="mb-4 h-full flex flex-col bg-white shadow-xl rounded-md">
                    <div class="flex flex-row">
                        <div class="basis-1/2 m-3 mt-6">
                            <p class="text-gray-600 text-2md font-medium pt-3">Type de service</p>
                        </div>
                        <div class="basis-1/2 m-3 mt-6">
                            <select class="form-select appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg
                                transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    aria-label="Default select example" id="select">
                                <option selected>Choisir une catégorie</option>

                            </select>
                        </div>
                    </div>
                    <div class="flex flex-row mb-2">
                        <div class="basis-1/2 m-3 mt-6">
                            <p class="text-gray-600 text-2md font-medium pt-3">Votre demande</p>
                        </div>
                        <div class="basis-1/2 m-3 mt-6">
                            <input class="appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg
                                transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   placeholder="Inserer l'objet de votre demande"/>
                        </div>
                    </div>

                </div>

                <h3 class="text-gray-600 text-2xl font-medium pb-2">Votre position</h3>
                <div class="mb-4 h-full flex flex-col bg-white shadow-xl rounded-md">
                    <div class="flex flex-row">
                        <div class="basis-1/2 m-3 mt-6">
                            <p class="text-gray-600 text-2md font-medium pt-3">Type de service</p>
                        </div>
                        <div class="basis-1/2 m-3 mt-6">
                            <select class="form-select appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg
                                transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    aria-label="Default select example" id="select">
                                <option selected>Choisir une catégorie</option>

                            </select>
                        </div>
                    </div>
                    <div class="flex flex-row mb-2">
                        <div class="basis-1/2 m-3 mt-6">
                            <p class="text-gray-600 text-2md font-medium pt-3">Votre demande</p>
                        </div>
                        <div class="basis-1/2 m-3 mt-6">
                            <input class="appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg
                                transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   placeholder="Inserer l'objet de votre demande"/>
                        </div>
                    </div>
                </div>

                <h3 class="text-gray-600 text-2xl font-medium pb-2">Vos images</h3>
                <!-- -- Envoyer des photos --  -->
                <x-file-upload></x-file-upload>


                <script>
                    fetch("http://cdn.askhim.ctrempe.fr:8080/type/get-types")
                        .then((response) => response.json())
                        .then((types) => {
                            types.forEach((type) => {

                                document.getElementById("select").insertAdjacentHTML(
                                    "beforeend",
                                    `
                                <option value="${type.id}">${type.libelle}</option>
                                `
                                )
                            })
                        })
                </script>
            </div>
        </div>
    </form>



@endsection
















