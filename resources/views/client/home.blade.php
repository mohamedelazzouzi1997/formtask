@extends('layouts.main')

@section('title')
  Home |  Le Blokk
@endsection

@section('styles')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
@endsection

@section('content')
<div id="reservation" class="px-5 bg-fixed flex justify-center items-center relative md:px-48 md:h-screen bg-containe bg-top " style="background-image: url('{{ asset('images/image1.png') }}')">
    <div class="absolute bottom-0 right-0 left-0 top-0 bg-black opacity-40">

    </div>
    <div class=" text-white z-10 my-5">
        <div class="px-5 py-5 opacity-90 bg-black" >
            <form action="" class="z-20">
                <h2 class="text-orange-300 font-extrabold text-5xl text-center italic fw-josef">RESERVATION</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 p-5 text-center gap-4">
                    <input class="px-3 py-3 bg-black border border-orange-300" placeholder="Nom Complet" type="text">
                    <input class="px-3 py-3 bg-black border border-orange-300" placeholder="Email" type="email">
                    <input class="px-3 py-3 bg-black border border-orange-300" placeholder="Telephone" type="text">
                    <input class="px-3 py-3 bg-black border border-orange-300" placeholder="Date" type="text" datepicker datepicker-autohide datepicker-buttons>
                    <input class="px-3 py-3 bg-black border border-orange-300" placeholder="Heure" type="text" id="timepicker">
                    <select class="px-3 py-2 bg-black border border-orange-300" name="" id="">
                        <option selected value="">1 Personne</option>
                        <option value="">1 Personne</option>
                        <option value="">2 Personne</option>
                        <option value="">3 Personne</option>
                        <option value="">4 Personne</option>
                        <option value="">5 Personne</option>
                        <option value="">6 Personne</option>
                        <option value="">7 Personne</option>
                        <option value="">8 Personne</option>
                        <option value="">9 Personne</option>
                        <option value="">10 Personne</option>
                        <option value="">11 Personne</option>
                        <option value="">12 Personne</option>
                    </select>
                    <div class="text-orange-200">
                        <div id="message" class="cursor-pointer">Ajoute un Message</div>
                        <textarea name="" class="px-3 w-full py-3 bg-gray-700 border-4 border-orange-300 hidden" ></textarea>
                    </div>
                </div>
                <div class="text-center p-10 text-2xl fw-josef">
                    Toute réservation en ligne sera confirmée par mail dans les plus brefs délais.
                </div>
                <div class="text-center">
                    <button class="px-5 rounded py-3 bg-orange-300 font-extrabold hover:bg-orange-400 text-black">RESERVER</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="px-5 md:px-32 my-16">
    <div class="grid grid-cols-1 md:grid-cols- gap-y-10 gap-x-4">
        <div class="text-center">
            <h2  data-aos="fade-down" class="text-white text-center italic fw-dancing text-2xl">Taste the difference</h2>
            <h3 data-aos="fade-down"  class="text-orange-300 font-semibold text-5xl text-center fw-explora">RESERVATION</h3>
            <img class="mx-auto mb-5 w-[50%]" src="{{ asset('images/line2.png') }}" alt="">

            <div class="grid grid-cols-1 md:grid-cols-2 items-center">
                <img data-aos="fade-right" class="h-full rounded-full" src="{{ asset('images/image2.jpg') }}" class="" alt="image2">
                <div data-aos="fade-left" class="text-center">
                    <div class="text-2xl fw-josef text-white text-center font-extrabold">
                        LE BLOKK, un restaurant LIVE MUSIQUE à expérience unique où se côtoient les plaisirs de la table et l’ambiance feutrée de nos spectacles : d’où notre appellation de restaurant spectacle à Marrakech.
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <h2 data-aos="fade-down" class="text-white text-center italic fw-dancing text-2xl">Composez votre assiette</h2>
            <h3 data-aos="fade-down" class="text-orange-300 font-semibold text-5xl text-center fw-explora">FOOD</h3>
            <img class="mx-auto mb-5 w-[50%]" src="{{ asset('images/line2.png') }}" alt="">

            <div class="grid grid-cols-1 md:grid-cols-2 items-center">
                <img data-aos="fade-right" class="h-full rounded-full" src="{{ asset('images/image3.jpg') }}" class="" alt="image2">
                <div data-aos="fade-left" class="text-center">
                    <div class="text-2xl fw-josef text-white text-center font-extrabold">
                        Riche en histoire musicale et artistique, LE BLOKK propose une cuisine pleine de fraîcheur et un décor cosy. Rien de mieux pour déguster nos plats préparer avec soin et délicatesse par notre talentueuse chef.
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <h2 data-aos="fade-down" class="text-white text-center italic fw-dancing text-2xl">Let the Music Speak!</h2>
            <h3 data-aos="fade-down" class="text-orange-300 font-semibold text-5xl text-center fw-explora">SPECTACLE</h3>
            <img class="mx-auto mb-5 w-[50%]" src="{{ asset('images/line2.png') }}" alt="">
            <div class="grid grid-cols-1 md:grid-cols-2 items-center">
                <img data-aos="fade-right" class="h-full rounded-full" src="{{ asset('images/image4.png') }}" class="" alt="image2">
                <div data-aos="fade-left" class="text-center">
                    <div class="text-2xl fw-josef text-white text-center font-extrabold">
                        Riche en histoire musicale et artistique, LE BLOKK propose une cuisine pleine de fraîcheur et un décor cosy. Rien de mieux pour déguster nos plats préparer avec soin et délicatesse par notre talentueuse chef.
                    </div>
                    <div class="text-center mx-auto my-5">
                        <a href="#" class="border border-orange-300 text-white hover:bg-orange-300 hover:text-black py-3 px-5 rounded">Voir Nos spectacles</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<div class="relative px-5 md:px-10 py-5 bg-fixed bg-center bg-cover flex justify-center items-center" style="background-image: url('{{ asset('images/image1.png') }}')">
    <div class="absolute bottom-0 right-0 left-0 top-0 bg-black opacity-40">

    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 z-10">
        <div class="text-center">
            <img class="mx-auto" src="{{ asset('images/logo.png') }}" alt="logo">
                <div id="about" class="text-2xl fw-josef text-white text-start font-extrabold">
                    Le Blokk est un restaurant bar international, marocain et japonais à thème, musical Live show qui vous propose un dîner spectacle incontournable à la Palmeraie dans un cadre exceptionnel.
                </div>
        </div>
        <div class="text-center mx-auto">
            <h4 class="text-orange-300 font-semibold text-3xl text-center my-5 fw-JOSEF">INFOLINE</h4>
            <ul class="text-start text-white">
                <li class="text-2xl font-extrabold"><i class="fa-solid fa-phone mr-5 text-orange-300"></i><a href="tel:+212674334334">+212 674 334 334</a></li>
                <li class="text-2xl font-extrabold"><i class="fa-solid fa-at mr-5 text-orange-300"></i>booking@leblokk.com</li>
            </ul>
        </div>
        <div class="">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3395.1908945983655!2d-7.992444085512597!3d31.68334894624762!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdafeda4f7d36457%3A0x310239a46feb13e7!2sLe%20Blokk%20(%20Restaurant%20)!5e0!3m2!1sen!2sma!4v1675164805505!5m2!1sen!2sma" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <p class="text-xl text-white text-center mt-5">
                <i class="fa-solid fa-location-dot text-orange-300"></i> Route des Jardins de la Palmeraie, Marrakech, Maroc
            </p>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/datepicker.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script>
$(document).ready(function(){
    $("#message").click(function(){
        $("textarea").toggle();
    });

    $('#timepicker').timepicker({
            timeFormat: 'h:mm p',
        interval: 30,
        minTime: '8',
        maxTime: '2:00pm',
        defaultTime: '11',
        startTime: '08:00',
        dynamic: false,
        dropdown: true,
        scrollbar: true,
    });

});
</script>
@endsection
