<?php
namespace App\Repositories\Advert;

interface AdvertContract{
    public function createAdvert($request);
    public function listAllAdvertsByStatus($status);
    public function listAllAdverts();
    public function listAdvertsByUserId();
    public function removeAdvert($request);
}