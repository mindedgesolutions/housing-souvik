<?php

namespace App\Http\Controllers;

use App\Http\Requests\AllotmentApplication\NewApplicationRequest;
// use RealRashid\SweetAlert\Facades\Alert;
use App\Models\HousingDistrict;
use Illuminate\Support\Facades\DB;

class AllotmentApplicationController extends Controller
{
    protected function getHrmsData()
    {
        return [
            "hrmsId" => "1994007754",
            "applicantName" => "BIRESWAR HALDER",
            "guardianName" => "LT. BHOLANATH HALDER",
            "dateOfBirth" => "15/11/1964",
            "dateOfJoining" => "17/11/1994",
            "dateOfRetirement" => "30/11/2024",
            "mobileNo" => "9831321170",
            "gender" => "Male",
            "applicantDesignation" => "Typist Grade I",
            "officeName" => "HOUSING BUILDING LOAN OFFICE ATTACHED TO HOUSING DEPARTMENT",
            "ddoId" => "CABHOA001",
            "presentStreet" => "57/13,NANDAN PALLY,SANTOSH ROY ROAD.",
            "presentPostOffice" => "BARISHA",
            "presentPincode" => "700008",
            "presentDistrictCode" => "3",
            "applicantHeadquarter" => "L2-DIRECTORATE/ COMMISSIONERATE",
            "gradePay" => "3600",
            "payBandId" => "3",
            "applicantPostingPlace" => "1, K.S.ROY ROAD, N.S.BUILDING KOLKATA KOLKATA KOLKATA Calcutta West Bengal",
            "payInThePayBand" => "14570",
            "officeStreetCharacter" => "1, K.S.ROY ROAD, N.S.BUILDING KOLKATA KOLKATA KOLKATA Calcutta West Bengal",
            "officeCityTownVillage" => "KOLKATA",
            "officePostOffice" => "KOLKATA",
            "officePinCode" => "700001",
            "officeDistrict" => "2"
        ];
    }

    public function create()
    {
        $hrms_data = $this->getHrmsData();
        $districts = HousingDistrict::orderBy('district_name', 'asc')->get();

        return view('allotment-application.new-application', compact('hrms_data', 'districts'));
    }

    public function store(NewApplicationRequest $request)
    {
        // $request->validate([
        //     'applicant_name' => 'required',
        //     'email' => 'required',
        // ]);

        // if (isset($validator) && $validator->fails()) {
        //     return back()->with('errors', $validator->messages()->all()[0])->withInput();
        // }

        // $is_inserted = 1;
        // if ($is_inserted) {
        //     Alert::success('Done!', 'Application Submitted Successfully');
        // } else {
        //     Alert::error('Error!', 'Failed to Submit Application');
        // }

        try {
            DB::beginTransaction();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }

        return redirect()->route('application.create');
    }
}
