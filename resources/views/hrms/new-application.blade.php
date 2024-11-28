@extends('layouts.dashboard-master')

@section('page-header')
    Application For New Allotment
@endsection

@section('dashboard-body')
    <div class="row">
        <form class="row g-3" action="{{ route('hrms.store') }}" id="application" autocomplete="off" method="POST">
            @csrf
            <div>
                <h5>&#9680; Personal Information (According to Service Book)</h5>
            </div>
            <div class="" id="focus-div"></div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="applicant_name" name ="applicant_name"
                        placeholder="Name of the Applicant" onkeyup="return charOnly(this)"
                        value="{{ array_key_exists('applicantName', $hrms_data) ? $hrms_data['applicantName'] : old('applicant_name') }}"
                        {{ array_key_exists('applicantName', $hrms_data) ? 'readonly' : null }}>
                    <label for="applicant_name">Applicant's Name</label>
                    <span id="error_applicant_name" class="text-danger"></span>
                    @error('applicant_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="father_husband_name"
                        name="father_husband_name"placeholder="Father's / Husband's Name" onkeyup="return charOnly(this)"
                        value="{{ array_key_exists('guardianName', $hrms_data) ? $hrms_data['guardianName'] : old('father_husband_name') }}"
                        {{ array_key_exists('guardianName', $hrms_data) ? 'readonly' : null }}>
                    <label for="father_husband_name">Father's / Husband's Name</label>
                    <span id="error_father_husband_name" class="text-danger"></span>
                    @error('father_husband_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="mobile_no" name="mobile_no"
                        placeholder="Mobile Number" onkeyup="return numberOnly(this)"
                        value="{{ array_key_exists('mobileNo', $hrms_data) ? $hrms_data['mobileNo'] : old('mobile_no') }}"
                        {{ array_key_exists('mobileNo', $hrms_data) ? 'readonly' : null }}>
                    <label for="mobile_no">Mobile Number</label>
                    <span id="error_mobile_no" class="text-danger"></span>
                    @error('mobile_no')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating">
                    <input type="email" class="form-control form-control-sm" id="email" name="email"
                        placeholder="Email"
                        value="{{ array_key_exists('email', $hrms_data) ? $hrms_data['email'] : old('email') }}"
                        {{ array_key_exists('email', $hrms_data) ? 'readonly' : null }}>
                    <label for="email">Email ID</label>
                    <span id="error_email" class="text-danger"></span>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-floating">
                    <input type="date" class="form-control form-control-sm" id="dob" name="dob"
                        value="{{ $hrmsDob ?? old('dob') }}" {{ $hrmsDob ? 'readonly' : null }}>
                    <label for="dob">Date of Birth (According to Service Book)</label>
                    <span id="error_dob" class="text-danger"></span>
                    @error('dob')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-5">
                <label>Gender</label>
                <div class="d-flex align-items-center">
                    <div class="form-check me-5">
                        <input type="radio" class="form-check-input" id="gender_male" name="gender" value="Male"
                            {{ $hrmsGender == 'Male' ? 'checked' : null }} {{ $hrmsGender ? 'readonly' : null }}>
                        <label class="form-check-label" for="gender_male">Male</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="gender_female" name="gender" value="Female"
                            {{ $hrmsGender == 'Female' ? 'checked' : null }} {{ $hrmsGender ? 'readonly' : null }}>
                        <label class="form-check-label" for="gender_female">Female</label>
                    </div>
                </div>
                <span id="error_gender" class="text-danger"></span>
                @error('gender')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <h5>&#9680; Permanent Address</h5>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="p_address" name="p_address"
                        placeholder="Permanent Address"
                        value="{{ array_key_exists('permanentStreet', $hrms_data) ? $hrms_data['permanentStreet'] : old('p_address') }}"
                        {{ array_key_exists('permanentStreet', $hrms_data) ? 'readonly' : null }}>
                    <label for="p_address">Address</label>
                    <span id="error_p_address" class="text-danger"></span>
                    @error('p_address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="p_city_town_village"
                        name="p_city_town_village" placeholder="Permanent City Town Village"
                        value="{{ array_key_exists('permanentCityTownVillage', $hrms_data) ? $hrms_data['permanentCityTownVillage'] : old('p_city_town_village') }}"
                        {{ array_key_exists('permanentCityTownVillage', $hrms_data) ? 'readonly' : null }}>
                    <label for="p_city_town_village">City / Town / Village</label>
                    <span id="error_p_city_town_village" class="text-danger"></span>
                    @error('p_city_town_village')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="p_post_office" name="p_post_office"
                        placeholder="Post Office"
                        value="{{ array_key_exists('permanentPostOffice', $hrms_data) ? $hrms_data['permanentPostOffice'] : old('p_post_office') }}"
                        {{ array_key_exists('permanentPostOffice', $hrms_data) ? 'readonly' : null }}>
                    <label for="p_post_office">Post Office</label>
                    <span id="error_p_post_office" class="text-danger"></span>
                    @error('p_post_office')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <select class="form-select" id="p_district" name="p_district" aria-label="district"
                        name="p_district" {{ array_key_exists('permanentDistrictCode', $hrms_data) ? 'disabled' : null }}>
                        <option value="">- Select -</option>
                        @foreach ($districts as $district)
                            <option value="{{ $district->district_code }}"
                                {{ array_key_exists('permanentDistrictCode', $hrms_data) ? ($hrms_data['permanentDistrictCode'] == $district->district_code ? 'selected' : '') : (old('p_district') == $district->district_code ? 'selected' : '') }}>
                                {{ $district->district_name }}</option>
                        @endforeach
                    </select>
                    <label for="p_district">Select District</label>
                    <span id="error_p_district" class="text-danger"></span>
                    @error('p_district')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="hidden" name="p_district_value"
                        value="{{ array_key_exists('permanentDistrictCode', $hrms_data) ? $hrms_data['permanentDistrictCode'] : '' }}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="p_pin_code" name="p_pin_code"
                        placeholder="Permanent Pin Code" onkeyup="return numberOnly(this)"
                        value="{{ array_key_exists('permanentPincode', $hrms_data) ? $hrms_data['permanentPincode'] : old('p_pin_code') }}"
                        {{ array_key_exists('permanentPincode', $hrms_data) ? 'readonly' : null }}>
                    <label for="p_pin_code">Pin Code</label>
                    <span id="error_p_pin_code" class="text-danger"></span>
                    @error('p_pin_code')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div>
                <h5>&#9680; Present Address</h5>
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="same_as_permanent" name="same_as_permanent"
                    onchange="copyPermanentAddress()">
                <label class="form-check-label" for="same_as_permanent"><b>Same as Permanent Address</b></label>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="present_address"
                        name="present_address" placeholder="Present Address"
                        value="{{ array_key_exists('presentStreet', $hrms_data) ? $hrms_data['presentStreet'] : old('present_address') }}"
                        {{ array_key_exists('presentStreet', $hrms_data) ? 'readonly' : null }}>
                    <label for="present_address">Address</label>
                    <span id="error_present_address" class="text-danger"></span>
                    @error('present_address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="present_city_town_village"
                        name="present_city_town_village" placeholder="Present City Town Village"
                        value="{{ array_key_exists('presentCityTownVillage', $hrms_data) ? $hrms_data['presentCityTownVillage'] : old('present_city_town_village') }}"
                        {{ array_key_exists('presentCityTownVillage', $hrms_data) ? 'readonly' : null }}>
                    <label for="present_city_town_village">City / Town / Village</label>
                    <span id="error_present_city_town_village" class="text-danger"></span>
                    @error('present_city_town_village')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="present_post_office"
                        name="present_post_office" placeholder="Post Office"
                        value="{{ array_key_exists('presentPostOffice', $hrms_data) ? $hrms_data['presentPostOffice'] : old('present_post_office') }}"
                        {{ array_key_exists('presentPostOffice', $hrms_data) ? 'readonly' : null }}>
                    <label for="present_post_office">Post Office</label>
                    <span id="error_present_post_office" class="text-danger"></span>
                    @error('present_post_office')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <select class="form-select" id="present_district" name="present_district" aria-label="district"
                        {{ array_key_exists('presentDistrictCode', $hrms_data) ? 'disabled' : null }}>
                        <option value="">- Select -</option>
                        @foreach ($districts as $district)
                            <option value="{{ $district->district_code }}"
                                {{ array_key_exists('presentDistrictCode', $hrms_data) ? ($hrms_data['presentDistrictCode'] == $district->district_code ? 'selected' : '') : (old('present_district') == $district->district_code ? 'selected' : '') }}>
                                {{ $district->district_name }}</option>
                        @endforeach
                    </select>
                    <label for="present_district">Select District</label>
                    <span id="error_present_district" class="text-danger"></span>
                    @error('present_district')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="hidden" name="present_district_value"
                        value="{{ array_key_exists('presentDistrictCode', $hrms_data) ? $hrms_data['presentDistrictCode'] : '' }}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="present_pin_code"
                        name="present_pin_code" placeholder="Present Pin Code" onkeyup="return numberOnly(this)"
                        value="{{ array_key_exists('presentPincode', $hrms_data) ? $hrms_data['presentPincode'] : old('present_pin_code') }}"
                        {{ array_key_exists('presentPincode', $hrms_data) ? 'readonly' : null }}>
                    <label for="present_pin_code">Pin Code</label>
                    <span id="error_present_pin_code" class="text-danger"></span>
                    @error('present_pin_code')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div>
                <h5>&#9680; Applicant's Official Information</h5>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="hrms_id" name="hrms_id"
                        placeholder="HRMS ID" onkeyup="return numberOnly(this)"
                        value="{{ array_key_exists('hrmsId', $hrms_data) ? $hrms_data['hrmsId'] : old('hrms_id') }}"
                        {{ array_key_exists('hrmsId', $hrms_data) ? 'readonly' : null }}>
                    <label for="hrms_id">Employee HRMS ID</label>
                    <span id="error_hrms_id" class="text-danger"></span>
                    @error('hrms_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="designation" name="designation"
                        placeholder="Designation"
                        value="{{ array_key_exists('applicantDesignation', $hrms_data) ? $hrms_data['applicantDesignation'] : old('designation') }}"
                        {{ array_key_exists('applicantDesignation', $hrms_data) ? 'readonly' : null }}>
                    <label for="designation">Employee Designation</label>
                    <span id="error_designation" class="text-danger"></span>
                    @error('designation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="basic_pay_range"
                        name="basic_pay_range" placeholder="Basic Pay Range" onkeyup="return numberOnly(this)"
                        value="{{ array_key_exists('payInThePayBand', $hrms_data) ? $hrms_data['payInThePayBand'] : old('basic_pay_range') }}"
                        {{ array_key_exists('payInThePayBand', $hrms_data) ? 'readonly' : null }}>
                    <label for="basic_pay_range">Basic Pay Range</label>
                    <span id="error_basic_pay_range" class="text-danger"></span>
                    @error('basic_pay_range')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="basic_pay" name="basic_pay"
                        placeholder="Basic Pay" onkeyup="return numberOnly(this)"
                        value="{{ array_key_exists('gradePay', $hrms_data) ? $hrms_data['gradePay'] : old('basic_pay') }}"
                        {{ array_key_exists('gradePay', $hrms_data) ? 'readonly' : null }}>
                    <label for="basic_pay">Basic Pay</label>
                    <span id="error_basic_pay" class="text-danger"></span>
                    @error('basic_pay')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="place_of_posting"
                        name="place_of_posting" placeholder="Place of Posting" value="{{ old('place_of_posting') }}">
                    <label for="place_of_posting">Place of Posting</label>
                    <span id="error_place_of_posting" class="text-danger"></span>
                    @error('place_of_posting')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="headquarter" name="headquarter"
                        placeholder="Headquarter"
                        value="{{ array_key_exists('applicantHeadquarter', $hrms_data) ? $hrms_data['applicantHeadquarter'] : old('headquarter') }}"
                        {{ array_key_exists('applicantHeadquarter', $hrms_data) ? 'readonly' : null }}>
                    <label for="headquarter">Headquarter</label>
                    <span id="error_headquarter" class="text-danger"></span>
                    @error('headquarter')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="date" class="form-control form-control-sm" id="doj" name="doj"
                        value="{{ $hrmsDoj ?? old('doj') }}" {{ $hrmsDoj ? 'readonly' : null }}>
                    <label for="doj">Date of Joining (According to Service Book)</label>
                    <span id="error_doj" class="text-danger"></span>
                    @error('doj')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="date" class="form-control form-control-sm" id="dor" name="dor"
                        value="{{ $hrmsDor ?? old('dor') }}" {{ $hrmsDor ? 'readonly' : null }}>
                    <label for="dor">Date of Retirement (According to Service Book)</label>
                    <span id="error_dor" class="text-danger"></span>
                    @error('dor')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div>
                <h5>&#9680; Name & Address of the Office</h5>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="name_of_office" name="name_of_office"
                        placeholder="Name of Office"
                        value="{{ array_key_exists('officeName', $hrms_data) ? $hrms_data['officeName'] : old('name_of_office') }}"
                        {{ array_key_exists('officeName', $hrms_data) ? 'readonly' : null }}>
                    <label for="name_of_office">Name of the office</label>
                    <span id="error_name_of_office" class="text-danger"></span>
                    @error('name_of_office')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="office_address" name="office_address"
                        placeholder="Office Address"
                        value="{{ array_key_exists('officeStreetCharacter', $hrms_data) ? $hrms_data['officeStreetCharacter'] : old('office_address') }}"
                        {{ array_key_exists('officeStreetCharacter', $hrms_data) ? 'readonly' : null }}>
                    <label for="office_address">Office Address</label>
                    <span id="error_office_address" class="text-danger"></span>
                    @error('office_address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="office_city_town_village"
                        name="office_city_town_village" placeholder="Office City Town Village"
                        value="{{ array_key_exists('officeCityTownVillage', $hrms_data) ? $hrms_data['officeCityTownVillage'] : old('office_city_town_village') }}"
                        {{ array_key_exists('officeCityTownVillage', $hrms_data) ? 'readonly' : null }}>
                    <label for="office_city_town_village">Office City / Town / Village</label>
                    <span id="error_office_city_town_village" class="text-danger"></span>
                    @error('office_city_town_village')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="office_post_office"
                        name="office_post_office" placeholder="Office Post Office"
                        value="{{ array_key_exists('officePostOffice', $hrms_data) ? $hrms_data['officePostOffice'] : old('office_post_office') }}"
                        {{ array_key_exists('officePostOffice', $hrms_data) ? 'readonly' : null }}>
                    <label for="office_post_office">Post Office</label>
                    <span id="error_office_post_office" class="text-danger"></span>
                    @error('office_post_office')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating">
                    <select class="form-select" id="o_district" name="o_district" aria-label="office district"
                        {{ array_key_exists('officeDistrict', $hrms_data) ? 'disabled' : null }}>
                        <option value="">- Select -</option>
                        @foreach ($districts as $district)
                            <option value="{{ $district->district_code }}"
                                {{ array_key_exists('officeDistrict', $hrms_data) ? ($hrms_data['officeDistrict'] == $district->district_code ? 'selected' : '') : (old('o_district') == $district->district_code ? 'selected' : '') }}>
                                {{ $district->district_name }}</option>
                        @endforeach
                    </select>
                    <label for="o_district">Select District</label>
                    <span id="error_o_district" class="text-danger"></span>
                    @error('o_district')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="hidden" name="office_district_value"
                        value="{{ array_key_exists('officeDistrict', $hrms_data) ? $hrms_data['officeDistrict'] : 'NA' }}" />
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="office_pin_code"
                        name="office_pin_code" placeholder="Office Pin Code" onkeyup="return numberOnly(this)"
                        value="{{ array_key_exists('officePinCode', $hrms_data) ? $hrms_data['officePinCode'] : old('office_pin_code') }}"
                        {{ array_key_exists('officePinCode', $hrms_data) ? 'readonly' : null }}>
                    <label for="office_pin_code">Pin Code</label>
                    <span id="error_office_pin_code" class="text-danger"></span>
                    @error('office_pin_code')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="office_phn_no" name="office_phn_no"
                        placeholder="Office Phone Number" onkeyup="return numberOnly(this)"
                        value="{{ array_key_exists('officePhone', $hrms_data) ? $hrms_data['officePhone'] : old('office_phn_no') }}"
                        {{ array_key_exists('officePhone', $hrms_data) ? 'readonly' : null }}>
                    <label for="office_phn_no">Phone No. (with STD code)</label>
                    <span id="error_office_phn_no" class="text-danger"></span>
                    @error('office_phn_no')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div>
                <h5>&#9680; DDO Details</h5>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <select class="form-select" id="ddo_district" name="ddo_district" aria-label="ddo district">
                        <option value="">- Select -</option>
                        @foreach ($districts as $district)
                            <option value="{{ $district->district_code }}">{{ $district->district_name }}
                            </option>
                        @endforeach
                    </select>
                    <label for="ddo_district">Select DDO District</label>
                    <span id="error_ddo_district" class="text-danger"></span>
                    @error('ddo_district')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <select class="form-select" id="ddo_designation" name="ddo_designation"
                        aria-label="ddo designation">
                        <option value="">- Select -</option>
                    </select>
                    <label for="ddo_designation">Select DDO Designation</label>
                    <span id="error_ddo_designation" class="text-danger"></span>
                    @error('ddo_designation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="DDO Address" name="ddo_address" id="ddo_address">{{ old('ddo_address') }}</textarea>
                    <label for="ddo_address">DDO Address</label>
                    <span id="error_ddo_address" class="text-danger"></span>
                    @error('ddo_address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div>
                <h5>&#9680; Allotment Category</h5>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-sm" id="flat_type" name="flat_type"
                        placeholder="Flat Type" value="{{ old('flat_type') }}">
                    <label for="flat_type">Flat Type</label>
                    <span id="error_flat_type" class="text-danger"></span>
                    @error('flat_type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <select class="form-select" id="allotment_reason" name="allotment_reason"
                        aria-label="allotment reason" name="allotment_reason">
                        <option value="">- Select -</option>
                        <!-- @foreach ($districts as $district)
    <option value="{{ $district->district_code }}">{{ $district->district_name }}</option>
    @endforeach -->
                    </select>
                    <label for="allotment_reason">Select Allotment Reason</label>
                    <span id="error_allotment_reason" class="text-danger"></span>
                    @error('allotment_reason')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div>
                <h5>&#9680; Housing Preference</h5>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <select class="form-select" id="first_preference" name="first_preference"
                        aria-label="first preference">
                        <option value="">- Select -</option>
                        <!-- @foreach ($districts as $district)
    <option value="{{ $district->district_code }}">{{ $district->district_name }}</option>
    @endforeach -->
                    </select>
                    <label for="first_preference">Select First Preference</label>
                    <span id="error_first_preference" class="text-danger"></span>
                    @error('first_preference')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <select class="form-select" id="second_preference" name="second_preference"
                        aria-label="second preference">
                        <option value="">- Select -</option>
                        <!-- @foreach ($districts as $district)
    <option value="{{ $district->district_code }}">{{ $district->district_name }}</option>
    @endforeach -->
                    </select>
                    <label for="second_preference">Select Second Preference</label>
                    <span id="error_second_preference" class="text-danger"></span>
                    @error('second_preference')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <select class="form-select" id="third_preference" name="third_preference"
                        aria-label="third preference">
                        <option value="">- Select -</option>
                        <!-- @foreach ($districts as $district)
    <option value="{{ $district->district_code }}">{{ $district->district_name }}</option>
    @endforeach -->
                    </select>
                    <label for="third_preference">Select Third Preference</label>
                    <span id="error_third_preference" class="text-danger"></span>
                    @error('third_preference')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div>
                <h5>&#9680; Upload Documents</h5>
            </div>
            <div class="col-md-6">
                <h6><b>Upload Your Latest Payslip</b></h6>
                <input type="file" id="doc_payslip" name="doc_payslip" class="form-control"
                    aria-label="Latest Payslip" onchange="validatePayslip()">
                <p><small><b>Allowed Extension: pdf<br>Maximum File Size: 1 MB</b></small></p>
                <span id="error_doc_payslip" class="text-danger"></span>
                @error('doc_payslip')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <h6><b>Upload Your Scanned Signature</b></h6>
                <input type="file" id="doc_signature" name="doc_signature" class="form-control"
                    aria-label="Scanned Signature" onchange="validateSignature()">
                <p><small><b>Allowed Extension: jpg, jpeg<br>Dimensions: 140 pixels (Width) x 60 pixels (Height)<br>Maximum
                            File Size: 50 KB</b></small></p>
                <span id="error_doc_signature" class="text-danger"></span>
            </div>
            <div class="col-md-12 text-center">
                <button type="submit"class="btn btn-success" id="submit-btn">Submit</button>
            </div>
        </form>
    </div>
@endsection

<script src="{{ asset('/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
{{-- <script src="{{ asset('js/new-application.js') }}"></script> --}}
<script>
    $(document).ready(function() {
        $('#ddo_district').on('change', function() {
            var ddoDistrict = $('#ddo_district').val();
            $('#ddo_designation').html('');
            $.ajax({
                url: '{{ route('ddo.designations') }}?ddoDistrict=' + ddo_district.value,
                method: 'get',
                success: function(res) {
                    $('#ddo_designation').html('<option value="">- Select -</option>');
                    $.each(res, function(key, value) {
                        $('#ddo_designation').append('<option value="' + value
                            .ddo_id + '")>' + value.ddo_designation +
                            '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching districts:', error);
                }
            });
        });
    });
</script>
