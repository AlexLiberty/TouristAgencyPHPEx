<?php
namespace App\Controllers;

use App\Models\CountryModel;
use App\Models\CityModel;
use App\Models\HotelModel;
use App\Models\ReviewModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    public function countries()
    {
        $countryModel = new CountryModel();
        $data['countries'] = $countryModel->findAll();
        return view('user/countries', $data);
    }

    public function cities($countryId)
    {
        $cityModel = new CityModel();
        $data['cities'] = $cityModel->where('country_id', $countryId)->findAll();
        return view('user/cities', $data);
    }

    public function hotels($cityId)
    {
        $hotelModel = new HotelModel();
        $data['hotels'] = $hotelModel->where('city_id', $cityId)->findAll();
        return view('user/hotels', $data);
    }

    public function hotel($hotelId)
    {
        $hotelModel = new HotelModel();
        $reviewModel = new ReviewModel();
        $data['hotel'] = $hotelModel->find($hotelId);
        $data['reviews'] = $reviewModel->where('hotel_id', $hotelId)->findAll();
        return view('user/hotel', $data);
    }

    public function leaveReview()
    {
        $reviewModel = new ReviewModel();
        $reviewModel->insert([
            'hotel_id' => $this->request->getPost('hotel_id'),
            'user_id' => session()->get('user_id'),
            'content' => $this->request->getPost('content')
        ]);
        return redirect()->back();
    }
}
