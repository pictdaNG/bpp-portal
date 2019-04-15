<?php
namespace App\Repositories\Advert;

interface AdvertContract{
    public function createAdvert($request);
    public function getAdvertById($advertId);
    public function listActiveAdverts();
    public function listAllAdverts();
    public function listAdvertsByUserId();
    public function removeAdvert($request);
    public function closingBids();
}