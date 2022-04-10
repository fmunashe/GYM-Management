<?php
/**
 * Author: Farai Zihove
 * Date: 4/4/2022
 * Time: 12:56
 */
?>
<div class="row">
    <div class="col-12">

        <div id="carouselExampleCaption" class="carousel slide text-center" data-bs-ride="carousel">
            <div class="carousel-inner py-2" role="listbox">
                @foreach(\App\Models\Advert::query()->where('publish',true)->latest()->get() as $advert)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img src="{{asset('uploads/adverts/'.$advert->image_name)}}" alt="..." class="" style="height: 300px;width: 400px">
                        <div class="carousel-caption d-none d-md-block">
                            <h3 class="text-white">{{$advert->title}}</h3>
                            <p>{{$advert->description}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaption" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaption" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>
</div>
