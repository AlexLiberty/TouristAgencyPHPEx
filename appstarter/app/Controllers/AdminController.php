<?php
namespace App\Controllers;

use App\Models\CountryModel;
use App\Models\CityModel;
use App\Models\HotelModel;
use App\Models\PhotoModel;
use CodeIgniter\Controller;

class AdminController extends Controller
{
    public function countries()
    {
        $countryModel = new CountryModel();
        $data['countries'] = $countryModel->findAll();
        return view('admin/countries', $data);
    }

    public function addCountry()
    {
        $countryModel = new CountryModel();
        $countryModel->insert(['name' => $this->request->getPost('name')]);
        return redirect()->to('/admin/countries');
    }

    public function editCountry($id)
    {
        $countryModel = new CountryModel();
        $data['country'] = $countryModel->find($id);
        return view('admin/edit-country', $data);
    }

    public function updateCountry($id)
    {
        $countryModel = new CountryModel();
        $countryModel->update($id, ['name' => $this->request->getPost('name')]);
        return redirect()->to('/admin/countries');
    }

    public function deleteCountry($id)
    {
        $countryModel = new CountryModel();
        $countryModel->delete($id);
        return redirect()->to('/admin/countries');
    }

    public function cities()
    {
        $cityModel = new CityModel();
        $data['cities'] = $cityModel->findAll();
        return view('admin/cities', $data);
    }

    public function addCity()
    {
        $cityModel = new CityModel();
        $cityModel->insert([
            'name' => $this->request->getPost('name'),
            'country_id' => $this->request->getPost('country_id')
        ]);
        return redirect()->to('/admin/cities');
    }

    public function editCity($id)
    {
        $cityModel = new CityModel();
        $data['city'] = $cityModel->find($id);
        return view('admin/edit-city', $data);
    }

    public function updateCity($id)
    {
        $cityModel = new CityModel();
        $cityModel->update($id, [
            'name' => $this->request->getPost('name'),
            'country_id' => $this->request->getPost('country_id')
        ]);
        return redirect()->to('/admin/cities');
    }

    public function deleteCity($id)
    {
        $cityModel = new CityModel();
        $cityModel->delete($id);
        return redirect()->to('/admin/cities');
    }

    public function hotels()
    {
        $hotelModel = new HotelModel();
        $data['hotels'] = $hotelModel->findAll();
        return view('admin/hotels', $data);
    }

    public function addHotel()
    {
        $hotelModel = new HotelModel();
        $hotelModel->insert([
            'name' => $this->request->getPost('name'),
            'city_id' => $this->request->getPost('city_id'),
            'description' => $this->request->getPost('description')
        ]);
        return redirect()->to('/admin/hotels');
    }

    public function editHotel($id)
    {
        $hotelModel = new HotelModel();
        $data['hotel'] = $hotelModel->find($id);
        return view('admin/edit-hotel', $data);
    }

    public function updateHotel($id)
    {
        $hotelModel = new HotelModel();
        $hotelModel->update($id, [
            'name' => $this->request->getPost('name'),
            'city_id' => $this->request->getPost('city_id'),
            'description' => $this->request->getPost('description')
        ]);
        return redirect()->to('/admin/hotels');
    }

    public function deleteHotel($id)
    {
        $hotelModel = new HotelModel();
        $hotelModel->delete($id);
        return redirect()->to('/admin/hotels');
    }

    public function uploadPhoto($hotelId)
    {
        $file = $this->request->getFile('photo');
        if ($file->isValid() && !$file->hasMoved()) {
            $path = $file->store('uploads');
            $photoModel = new PhotoModel();
            $photoModel->insert(['hotel_id' => $hotelId, 'photo_path' => $path]);
        }
        return redirect()->to('/admin/hotels');
    }
}
