<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Opal Home</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->

    <link rel="stylesheet" href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" />
    <link rel="stylesheet" href="/css/main.css">
    <style>
        input[type='number']::-webkit-inner-spin-button,
        input[type='number']::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .custom-number-input input:focus {
            outline: none !important;
        }

        .custom-number-input button:focus {
            outline: none !important;
        }
    </style>
    <script src="https://js.stripe.com/v3/"></script>
</head>

<body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">

    @include('navbar')

    <!--Right Col-->
    <div class="w-full md:w-3/5 py-6 text-center">

    </div>
    </div>
    <div class="relative -mt-12 lg:-mt-24">
        <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
                    <path d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z" opacity="0.100000001"></path>
                    <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.200000003"></path>
                </g>
                <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <path d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"></path>
                </g>
            </g>
        </svg>
    </div>
    <section class="bg-white border-b py-8">
        <div class="container mx-auto flex flex-wrap pt-4 pb-12">
            <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                Panier
            </h1>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>

            <div class="w-full p-6">
                <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow text-gray-800">

                    @if (count($items))
                    <table class="min-w-full table-auto">
                        <thead class="justify-between">
                            <tr class="bg-gray-800 text-gray-800">
                                <th class="px-8 py-2">

                                </th>
                                <th class="px-8 py-2">
                                    <span class="text-gray-300">Nom</span>
                                </th>
                                <th class="px-8 py-2">
                                    <span class="text-gray-300">Couleur</span>
                                </th>
                                <th class="px-8 py-2">
                                    <span class="text-gray-300">Genre</span>
                                </th>
                                <th class="px-8 py-2">
                                    <span class="text-gray-300">Marque</span>
                                </th>
                                <th class="px-8 py-2">
                                    <span class="text-gray-300">quantité</span>
                                </th>
                                <th class="px-8 py-2">
                                    <span class="text-gray-300">prix unitaire</span>
                                </th>

                                <th class="px-8 py-2">
                                    <span class="text-gray-300"></span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-200">

                            @foreach($items as $item)
                            <tr class="bg-white border-b border-gray-200">
                                <td>
                                    <img class="w-16" src="{{ $item->attributes[3] }}" alt="">
                                </td>
                                <td>
                                    <span class="text-center ml-2 font-semibold">{{ $item->name }}</span>
                                </td>
                                <td class="px-8 py-2">
                                    <span class="text-center ml-2 font-semibold">{{ $item->attributes[0] }}</span>
                                </td>
                                <td class="px-8 py-2">
                                    <span>{{ $item->attributes[2] }}</span>
                                </td>
                                <td class="px-8 py-2">
                                    <span>{{ $item->attributes[1] }}</span>
                                </td>

                                <td class="px-8 py-2">
                                    <span>{{ $item->quantity }}</span>
                                </td>

                                <td class="px-8 py-2">
                                    <span>{{ $item->attributes[4] }}€</span>
                                </td>

                                <td class="px-8 py-2">
                                    <form action="{{ route('panier.destroy') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-red-500 hover:text-black ">
                                            supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <tr class="bg-white border-b border-gray-200">
                                <td>
                                   
                                </td>
                                <td>
                                    <span class="text-center ml-2 font-semibold">Total</span>
                                </td>
                                <td class="px-8 py-2">

                                </td>
                                <td class="px-8 py-2">

                                </td>
                                <td class="px-8 py-2">

                                </td>

                                <td class="px-8 py-2">
                                    <span>TVA 20%</span>
                                </td>

                                <td class="px-8 py-2">
                                    <span>HT {{ $finallyPrice - (($finallyPrice/100)*20) }}€</span>
                                </td>

                                <td class="px-8 py-2">
                                    <span>TTC {{ $finallyPrice }}€</span>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                @auth
                <h2 class="w-full my-2 text-5md font-bold leading-tight text-center text-gray-800 mt-6">
                    Mes informations de livraison
                </h2>
                <div>
                    @csrf
                    <div class="grid grid-cols-6 gap-6 mt-2">
                        <input type="hidden" id="articlesOrder" name="articles" value="">
                        <div class="col-span-8">
                            <label class="block font-medium text-sm text-gray-700" for="firstname">
                                Prénom
                            </label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full text-gray-800" type="text" name="firstname" id="firstname">
                        </div>

                        <div class="col-span-8">
                            <label class="block font-medium text-sm text-gray-700" for="lastname">
                                Nom
                            </label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full text-gray-800" type="text" name="lastname" id="lastname">
                        </div>

                        <div class="col-span-8">
                            <label class="block font-medium text-sm text-gray-700" for="address">
                                adresse
                            </label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full text-gray-800" type="text" name="address" id="address">
                        </div>

                        <div class="col-span-8">
                            <label class="block font-medium text-sm text-gray-700" for="city">
                                Ville
                            </label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full text-gray-800" type="text" name="city" id="city">
                        </div>

                        <div class="col-span-8">
                            <label class="block font-medium text-sm text-gray-700" for="zip">
                                code postal
                            </label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full text-gray-800" type="text" name="zip" id="zip">
                        </div>

                        <div class="col-span-8">
                            <label class="block font-medium text-sm text-gray-700" for="country">
                                Pays
                            </label>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full text-gray-800" type="text" name="country" id="country">
                        </div>

                        <button id="checkout-button" type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Payer
                        </button>

                    </div>
                </div>
                @else
                <center>
                    <p class="text-gray-700 mt-5">Vous devez etre connecter pour pouvoir commander </p>
                </center>
                @endif
                @else
                <center>
                    <p>Vous n'avez ajouter aucun produit dans votre panier</p>
                </center>
                @endif


            </div>


        </div>
    </section>

    <!-- Change the colour #f8fafc to match the previous section colour -->
    <svg class="wave-top" viewBox="0 0 1439 147" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g transform="translate(-1.000000, -14.000000)" fill-rule="nonzero">
                <g class="wave" fill="#f8fafc">
                    <path d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z"></path>
                </g>
                <g transform="translate(1.000000, 15.000000)" fill="#FFFFFF">
                    <g transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) ">
                        <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
                        <path d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z" opacity="0.100000001"></path>
                        <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" opacity="0.200000003"></path>
                    </g>
                </g>
            </g>
        </g>
    </svg>

    <!--Footer-->
    @include('footer')

    <script>
        var scrollpos = window.scrollY;
        var header = document.getElementById("header");
        var navcontent = document.getElementById("nav-content");
        var navaction = document.getElementById("navAction");
        var brandname = document.getElementById("brandname");
        var toToggle = document.querySelectorAll(".toggleColour");

        document.addEventListener("scroll", function() {
            /*Apply classes for slide in bar*/
            scrollpos = window.scrollY;

            if (scrollpos > 10) {
                header.classList.add("bg-white");
                navaction.classList.remove("bg-white");
                navaction.classList.add("gradient");
                navaction.classList.remove("text-gray-800");
                navaction.classList.add("text-white");
                //Use to switch toggleColour colours
                for (var i = 0; i < toToggle.length; i++) {
                    toToggle[i].classList.add("text-gray-800");
                    toToggle[i].classList.remove("text-white");
                }
                header.classList.add("shadow");
                navcontent.classList.remove("bg-gray-100");
                navcontent.classList.add("bg-white");
            } else {
                header.classList.remove("bg-white");
                navaction.classList.remove("gradient");
                navaction.classList.add("bg-white");
                navaction.classList.remove("text-white");
                navaction.classList.add("text-gray-800");
                //Use to switch toggleColour colours
                for (var i = 0; i < toToggle.length; i++) {
                    toToggle[i].classList.add("text-white");
                    toToggle[i].classList.remove("text-gray-800");
                }

                header.classList.remove("shadow");
                navcontent.classList.remove("bg-white");
                navcontent.classList.add("bg-gray-100");
            }
        });
    </script>
    <script>
        /*Toggle dropdown list*/
        /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

        var navMenuDiv = document.getElementById("nav-content");
        var navMenu = document.getElementById("nav-toggle");

        document.onclick = check;

        function check(e) {
            var target = (e && e.target) || (event && event.srcElement);

            //Nav Menu
            if (!checkParent(target, navMenuDiv)) {
                // click NOT on the menu
                if (checkParent(target, navMenu)) {
                    // click on the link
                    if (navMenuDiv.classList.contains("hidden")) {
                        navMenuDiv.classList.remove("hidden");
                    } else {
                        navMenuDiv.classList.add("hidden");
                    }
                } else {
                    // click both outside link and outside menu, hide menu
                    navMenuDiv.classList.add("hidden");
                }
            }
        }

        function checkParent(t, elm) {
            while (t.parentNode) {
                if (t == elm) {
                    return true;
                }
                t = t.parentNode;
            }
            return false;
        }
    </script>
    <script>
        const allArticles = `@foreach($items as $item){{ $item->id }}*{{ $item->quantity }}-@endforeach`

        const articlesOrder = document.getElementById('articlesOrder').value = allArticles;
    </script>
    <script type="text/javascript">
        var stripe = Stripe("pk_test_D4eqTbqTbXHUCPtqrLGdH0aa");
        var checkoutButton = document.getElementById("checkout-button");
        checkoutButton.addEventListener("click", function() {
            const firstname = document.getElementById("firstname").value;
            const lastname = document.getElementById("lastname").value;
            const address = document.getElementById("address").value;
            const city = document.getElementById("city").value;
            const zip = document.getElementById("zip").value;
            const country = document.getElementById("country").value;
            const articlesOrder = document.getElementById("articlesOrder").value;
            if (!firstname || !lastname || !address || !city || !zip || !country)
            {
                alert('Vous devez remplir toutes les informations de livraison');
                return false;
            }
            fetch(`/paiement?firstname=${firstname}&lastname=${lastname}&address=${address}&city=${city}&zip=${zip}&country=${country}&articles=${articlesOrder}`, {
                    method: "GET",
                })
                .then(function(response) {
                    console.log(response.json)
                    return response.json();
                })
                .then(function(session) {
                    console.log(session)
                    return stripe.redirectToCheckout({
                        sessionId: session.id
                    });
                })
                .then(function(result) {
                    if (result.error) {
                        alert(result.error.message);
                    }
                })
                .catch(function(error) {
                    console.error("Error:", error);
                });
        });
    </script>

</body>

</html>