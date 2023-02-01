@extends('layouts.main')

@section('title')
  Contact |  Le Blokk
@endsection

@section('content')
<div id="topdiv" class="px-5 slide_photo flex bg-fixed bg-no-repeat justify-center items-center relative md:px-48 h-[400px] md:h-screen bg-cover bg-center " style="background-image: url('{{ asset('images/image5.jpg') }}')">
    <div class="absolute bottom-0 right-0 left-0 top-0 bg-black opacity-40">

    </div>
    <div class=" text-white z-10 my-5">
            <h1 class="text-2xl md:text-7xl uppercase text-center font-extrabold">un restaurant à expérience UNIque </h1>
            <p class="text-xl font-extrabold text-center"> l’ambiance feutrée de nos spectacles </p>
    </div>
</div>
<div class="px-5 md:px-32 my-16">
<div class="text-center">
    <h2 class="uppercase text-5xl font-semibold fw-explora text-orange-300">devenir notre partenaire</h2>
    <img src="{{ asset('images/line2.png') }}" class="mx-auto my-5 md:w-[60%] md:h-[70px]" alt="">
    <div class="text-white text-center mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="text-center space-y-10 md:text-2xl mb-5">
                <div class="w-full md:block text-start"><i class="fa-solid fa-location-dot mr-5 text-orange-300"></i> Route des Jardins de la Palmeraie,Marrakech, Maroc</div>
                <div class="w-full md:block text-start"><i class="fa-solid fa-at mr-5 text-orange-300"></i> booking@leblokk.com</div>
                <div class="w-full md:block text-start"><i class="fa-solid fa-phone mr-5 text-orange-300"></i> +212 674 334 334</div>
            </div>
            <form action="" class="space-y-5">
                <input placeholder="Votre Nom" class="bg-black w-full border border-orange-300 px-5 py-4 text-white" type="text">
                <input placeholder="Nom D'agence ou D'établissement" class="bg-black w-full border border-orange-300 px-5 py-4 text-white" type="text">
                <input placeholder="Votre E-mail" class="bg-black w-full border border-orange-300 px-5 py-4 text-white" type="text">
                <textarea class="bg-black w-full border border-orange-300 px-5 py-4 text-white w-full" name="" id="" cols="30" rows="10" placeholder="Votre Message"></textarea>
                <button class="border w-full border-orange-300 text-white hover:bg-orange-300 hover:text-black py-3 px-5 rounded">ENVOYER</button>
            </form>

        </div>
    </div>
</div>
</div>

@endsection

@section('scripts')
<script>
    window.onload = function () {

    function changeImage() {
        var BackgroundImg=[
            "{{ asset('images/image1.png') }}",
            "{{ asset('images/image4.png') }}",
            "{{ asset('images/image5.jpg') }}",
        ];
        var i = Math.floor((Math.random() * 3));
        var image = $('#topdiv');
            image.fadeOut(1000, function () {
                image.css("background-image", 'url("' + BackgroundImg[i] + '")');
                image.fadeIn(1000);
            });
    }
    window.setInterval(changeImage, 3000);
}
</script>
@endsection
