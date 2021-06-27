<?php
/**
 * Created by PhpStorm.
 * Company: ittown.by
 * Project: TestTomas
 * User: Andrey Leo
 * Date: 6/26/21
 * Time: 9:32 PM
 * All rights reserved
 */

namespace App\Data;


use App\Models\Customer;
use Illuminate\Database\Eloquent\Collection;

class Registry
{
    protected $data = [
        [
            "id" => 1,
            "name" => "Ms. Akshayakeerti Desai",
            'location' => "Bratislava, Slovakia",
            'points' => 1400,
            'redeems' => 20,
            "gender" => "Male",
            "status" => "Active",
            "created_at" => "2021-06-24T03:50:04.205+05:30",
            "updated_at" => "2021-06-24T03:50:04.205+05:30"
        ],
        [
            "id" => 2,
            "name" => "Daevi Joshi",
            'location' => "Bratislava, Slovakia",
            'points' => 1200,
            'redeems' => 20,
            "gender" => "Female",
            "status" => "Inactive",
            "created_at" => "2021-06-24T03:50:04.254+05:30",
            "updated_at" => "2021-06-24T03:50:04.254+05:30"
        ],
        [
            "id" => 3,
            "name" => "Chandraayan Gill I",
            'location' => "Bratislava, Slovakia",
            'points' => 1100,
            'redeems' => 60,
            "gender" => "Male",
            "status" => "Inactive",
            "created_at" => "2021-06-24T03:50:04.274+05:30",
            "updated_at" => "2021-06-24T03:50:04.274+05:30"
        ],
        [
            "id" => 4,
            "name" => "Aditya Banerjee",
            'location' => "Bratislava, Slovakia",
            'points' => 100,
            'redeems' => 50,
            "gender" => "Male",
            "status" => "Inactive",
            "created_at" => "2021-06-24T03:50:04.293+05:30",
            "updated_at" => "2021-06-24T03:50:04.293+05:30"
        ],
        [
            "id" => 5,
            "name" => "Fr. Param Gill",
            'location' => "Bratislava, Slovakia",
            'points' => 100,
            'redeems' => 40,
            "gender" => "Female",
            "status" => "Active",
            "created_at" => "2021-06-24T03:50:04.300+05:30",
            "updated_at" => "2021-06-24T03:50:04.300+05:30"
        ],
        [
            "id" => 6,
            "name" => "Adhrit Rana",
            'location' => "Bratislava, Slovakia",
            'points' => 400,
            'redeems' => 30,
            "gender" => "Female",
            "status" => "Active",
            "created_at" => "2021-06-24T03:50:04.309+05:30",
            "updated_at" => "2021-06-24T03:50:04.309+05:30"
        ],
        [
            "id" => 7,
            "name" => "Kirti Embranthiri JD",
            'location' => "Bratislava, Slovakia",
            'points' => 140,
            'redeems' => 20,
            "gender" => "Female",
            "status" => "Active",
            "created_at" => "2021-06-24T03:50:04.326+05:30",
            "updated_at" => "2021-06-24T03:50:04.326+05:30"
        ],
        [
            "id" => 8,
            "name" => "Chidaakaash Khanna",
            'location' => "Bratislava, Slovakia",
            'points' => 450,
            'redeems' => 10,
            "gender" => "Male",
            "status" => "Active",
            "created_at" => "2021-06-24T03:50:04.331+05:30",
            "updated_at" => "2021-06-24T03:50:04.331+05:30"
        ],
        [
            "id" => 9,
            "name" => "Devvrat Gupta",
            'location' => "Bratislava, Slovakia",
            'points' => 600,
            'redeems' => 20,
            "gender" => "Female",
            "status" => "Inactive",
            "created_at" => "2021-06-24T03:50:04.334+05:30",
            "updated_at" => "2021-06-24T03:50:04.334+05:30"
        ],
        [
            "id" => 10,
            "name" => "Shakuntala Adiga",
            'location' => "Bratislava, Slovakia",
            'points' => 750,
            'redeems' => 20,
            "gender" => "Female",
            "status" => "Inactive",
            "created_at" => "2021-06-24T03:50:04.355+05:30",
            "updated_at" => "2021-06-24T03:50:04.355+05:30"
        ],
        [
            "id" => 11,
            "name" => "Ms. Agnimitra Ahuja",
            'location' => "Bratislava, Slovakia",
            'points' => 760,
            'redeems' => 20,
            "gender" => "Male",
            "status" => "Active",
            "created_at" => "2021-06-24T03:50:04.372+05:30",
            "updated_at" => "2021-06-24T03:50:04.372+05:30"
        ],
        [
            "id" => 12,
            "name" => "Kanti Dhawan",
            'location' => "Bratislava, Slovakia",
            'points' => 0,
            'redeems' => 0,
            "gender" => "Female",
            "status" => "Inactive",
            "created_at" => "2021-06-24T03:50:04.391+05:30",
            "updated_at" => "2021-06-24T03:50:04.391+05:30"
        ],
        [
            "id" => 13,
            "name" => "Buddhana Guha",
            'location' => "Bratislava, Slovakia",
            'points' => 0,
            'redeems' => 0,
            "gender" => "Male",
            "status" => "Inactive",
            "created_at" => "2021-06-24T03:50:04.410+05:30",
            "updated_at" => "2021-06-24T03:50:04.410+05:30"
        ],
        [
            "id" => 14,
            "name" => "Chandrabhaga Menon",
            'location' => "Bratislava, Slovakia",
            'points' => 1500,
            'redeems' => 60,
            "gender" => "Male",
            "status" => "Inactive",
            "created_at" => "2021-06-24T03:50:04.426+05:30",
            "updated_at" => "2021-06-24T03:50:04.426+05:30"
        ],
        [
            "id" => 15,
            "name" => "Aamod Menon",
            'location' => "Cyprus, Nicosia",
            'points' => 100,
            'redeems' => 0,
            "gender" => "Female",
            "status" => "Active",
            "created_at" => "2021-06-24T03:50:04.450+05:30",
            "updated_at" => "2021-06-24T03:50:04.450+05:30"
        ],
        [
            "id" => 16,
            "name" => "Pres. Baalagopaal Talwar",
            'location' => "Cyprus, Nicosia",
            'points' => 1400,
            'redeems' => 30,
            "gender" => "Female",
            "status" => "Active",
            "created_at" => "2021-06-24T03:50:04.463+05:30",
            "updated_at" => "2021-06-24T03:50:04.463+05:30"
        ],
        [
            "id" => 17,
            "name" => "Chandra Tagore",
            'location' => "Cyprus, Nicosia",
            'points' => 1300,
            'redeems' => 10,
            "gender" => "Female",
            "status" => "Inactive",
            "created_at" => "2021-06-24T03:50:04.470+05:30",
            "updated_at" => "2021-06-24T03:50:04.470+05:30"
        ],
        [
            "id" => 18,
            "name" => "Vasudeva Gupta",
            'location' => "Cyprus, Nicosia",
            'points' => 800,
            'redeems' => 0,
            "gender" => "Male",
            "status" => "Active",
            "created_at" => "2021-06-24T03:50:04.506+05:30",
            "updated_at" => "2021-06-24T03:50:04.506+05:30"
        ],
        [
            "id" => 19,
            "name" => "Balaaditya Adiga",
            'location' => "Cyprus, Nicosia",
            'points' => 1200,
            'redeems' => 10,
            "gender" => "Female",
            "status" => "Active",
            "created_at" => "2021-06-24T03:50:04.509+05:30",
            "updated_at" => "2021-06-24T03:50:04.509+05:30"
        ],
        [
            "id" => 20,
            "name" => "Ghanaanand Namboothiri",
            'location' => "Bratislava, Slovakia",
            'points' => 0,
            'redeems' => 0,
            "gender" => "Female",
            "status" => "Active",
            "created_at" => "2021-06-24T03:50:04.518+05:30",
            "updated_at" => "2021-06-24T03:50:04.518+05:30"
        ],
        [
            "id" => 39,
            "name" => "Krishnadas Bandopadhyay LLD",
            'location' => "Bratislava, Slovakia",
            'points' => 1400,
            'redeems' => 20,
            "gender" => "Male",
            "status" => "Active",
            "created_at" => "2021-06-26T03:50:04.273+05:30",
            "updated_at" => "2021-06-26T03:50:04.273+05:30"
        ],
        [
            "id" => 40,
            "name" => "Sammy Bahringer",
            'location' => "Cyprus, Nicosia",
            'points' => 100,
            'redeems' => 0,
            "gender" => "Female",
            "status" => "Active",
            "created_at" => "2021-06-26T03:50:04.279+05:30",
            "updated_at" => "2021-06-26T08:36:49.172+05:30"
        ],
        [
            "id" => 41,
            "name" => "Chandraprabha Achari",
            'location' => "Croatia, Zagreb",
            'points' => 400,
            'redeems' => 20,
            "gender" => "Male",
            "status" => "Inactive",
            "created_at" => "2021-06-26T03:50:04.291+05:30",
            "updated_at" => "2021-06-26T03:50:04.291+05:30"
        ],
        [
            "id" => 42,
            "name" => "Shankar Patel",
            'location' => "Bratislava, Slovakia",
            'points' => 600,
            'redeems' => 10,
            "gender" => "Male",
            "status" => "Active",
            "created_at" => "2021-06-26T03:50:04.325+05:30",
            "updated_at" => "2021-06-26T03:50:04.325+05:30"
        ],
        [
            "id" => 43,
            "name" => "Swapnil Somayaji",
            'location' => "Bratislava, Slovakia",
            'points' => 500,
            'redeems' => 20,
            "gender" => "Male",
            "status" => "Inactive",
            "created_at" => "2021-06-26T03:50:04.336+05:30",
            "updated_at" => "2021-06-26T03:50:04.336+05:30"
        ],
        [
            "id" => 44,
            "name" => "Brajesh Chopra",
            'location' => "Croatia, Zagreb",
            'points' => 1000,
            'redeems' => 10,
            "gender" => "Female",
            "status" => "Inactive",
            "created_at" => "2021-06-26T03:50:04.340+05:30",
            "updated_at" => "2021-06-26T03:50:04.340+05:30"
        ],
        [
            "id" => 46,
            "name" => "Dr. Manikya Varrier",
            'location' => "Bratislava, Slovakia",
            'points' => 1400,
            'redeems' => 0,
            "gender" => "Male",
            "status" => "Inactive",
            "created_at" => "2021-06-26T03:50:04.388+05:30",
            "updated_at" => "2021-06-26T03:50:04.388+05:30"
        ],
        [
            "id" => 47,
            "name" => "Anala Saini",
            'location' => "Bratislava, Slovakia",
            'points' => 1400,
            'redeems' => 20,
            "gender" => "Female",
            "status" => "Active",
            "created_at" => "2021-06-26T03:50:04.428+05:30",
            "updated_at" => "2021-06-26T03:50:04.428+05:30"
        ],
        [
            "id" => 48,
            "name" => "Naveen Tandon",
            'location' => "Bratislava, Slovakia",
            'points' => 1400,
            'redeems' => 20,
            "gender" => "Male",
            "status" => "Inactive",
            "created_at" => "2021-06-26T03:50:04.460+05:30",
            "updated_at" => "2021-06-26T03:50:04.460+05:30"
        ],
        [
            "id" => 49,
            "name" => "Satish Chaturvedi",
            'location' => "Bratislava, Slovakia",
            'points' => 1400,
            'redeems' => 20,
            "gender" => "Female",
            "status" => "Active",
            "created_at" => "2021-06-26T03:50:04.481+05:30",
            "updated_at" => "2021-06-26T03:50:04.481+05:30"
        ],
        [
            "id" => 50,
            "name" => "Rita Guneta",
            'location' => "Czech Republic, Prague",
            'points' => 1400,
            'redeems' => 20,
            "gender" => "Female",
            "status" => "Active",
            "created_at" => "2021-06-26T03:50:04.520+05:30",
            "updated_at" => "2021-06-26T03:50:04.520+05:30"
        ],
        [
            "id" => 51,
            "name" => "Javas Varma",
            'location' => "Bratislava, Slovakia",
            'points' => 0,
            'redeems' => 20,
            "gender" => "Male",
            "status" => "Inactive",
            "created_at" => "2021-06-26T03:50:04.527+05:30",
            "updated_at" => "2021-06-26T03:50:04.527+05:30"
        ],
        [
            "id" => 53,
            "name" => "Paramartha Naik",
            'location' => "Croatia, Zagreb",
            'points' => 100,
            'redeems' => 20,
            "gender" => "Female",
            "status" => "Active",
            "created_at" => "2021-06-26T03:50:04.572+05:30",
            "updated_at" => "2021-06-26T03:50:04.572+05:30"
        ],
        [
            "id" => 54,
            "name" => "Akshata Mehrotra",
            'location' => "Czech Republic, Prague",
            'points' => 150,
            'redeems' => 0,
            "gender" => "Female",
            "status" => "Inactive",
            "created_at" => "2021-06-26T03:50:04.591+05:30",
            "updated_at" => "2021-06-26T03:50:04.591+05:30"
        ],
        [
            "id" => 56,
            "name" => "Kamala Iyer",
            'location' => "Czech Republic, Prague",
            'points' => 300,
            'redeems' => 20,
            "gender" => "Male",
            "status" => "Active",
            "created_at" => "2021-06-26T03:50:04.628+05:30",
            "updated_at" => "2021-06-26T03:50:04.628+05:30"
        ],
        [
            "id" => 57,
            "name" => "Mrs. Shwet Trivedi",
            'location' => "Czech Republic, Prague",
            'points' => 1400,
            'redeems' => 20,
            "gender" => "Female",
            "status" => "Active",
            "created_at" => "2021-06-26T03:50:04.666+05:30",
            "updated_at" => "2021-06-26T03:50:04.666+05:30"
        ],
        [
            "id" => 58,
            "name" => "Trilokanath Ganaka",
            'location' => "Bratislava, Slovakia",
            'points' => 800,
            'redeems' => 20,
            "gender" => "Female",
            "status" => "Inactive",
            "created_at" => "2021-06-26T03:50:04.681+05:30",
            "updated_at" => "2021-06-26T03:50:04.681+05:30"
        ],
        [
            "id" => 59,
            "name" => "Rahul Verma",
            'location' => "Czech Republic, Prague",
            'points' => 1400,
            'redeems' => 20,
            "gender" => "Male",
            "status" => "Active",
            "created_at" => "2021-06-26T03:50:04.696+05:30",
            "updated_at" => "2021-06-26T03:50:04.696+05:30"
        ],
        [
            "id" => 60,
            "name" => "Shwet Sharma",
            'location' => "Croatia, Zagreb",
            'points' => 1400,
            'redeems' => 20,
            "gender" => "Male",
            "status" => "Inactive",
            "created_at" => "2021-06-26T03:50:04.720+05:30",
            "updated_at" => "2021-06-26T03:50:04.720+05:30"
        ],
        [
            "id" => 61,
            "name" => "Bala Varma",
            'location' => "Czech Republic, Prague",
            'points' => 900,
            'redeems' => 30,
            "gender" => "Male",
            "status" => "Inactive",
            "created_at" => "2021-06-26T03:50:04.742+05:30",
            "updated_at" => "2021-06-26T03:50:04.742+05:30"
        ]
    ];

    protected $items;

    public function __construct()
    {
        $this->items = collect($this->data);
    }

    public function getItems()
    {
        return $this->items->map(function ($e){
            $model = resolve(Customer::class);
            $model->setRawAttributes($e);
            return $model;
        });
    }

    public function sort(array $arOrder)
    {
        $order = [];
        foreach ($arOrder as $f => $t){
            $order[] = [$f, $t];
        }
        $this->items = $this->items->sortByDesc($order);
    }

    public function search($arData)
    {
        foreach ($arData as $field => $val){
            $this->items = $this->items->filter(function ($e)use($field, $val){
                return preg_match("/$val/i", $e[$field]);
            });
        }
    }

    public function groupBy($field)
    {
        $this->items = $this->items->groupBy($field);
    }

    public function find(int $id)
    {
        $this->items = $this->items->filter(function ($e)use($id){
            return $e['id'] == $id;
        });

        return $this;
    }

    public function get()
    {
        return $this->items;
    }

    public function count()
    {
        return $this->items->count();
    }
}