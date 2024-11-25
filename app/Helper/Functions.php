<?php

function getHrmsData()
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
    "permanentStreet" => "Paglachandi",
    "permanentCityTownVillage" => "Paglachandi",
    "permanentPostOffice" => "Radhakantapur",
    "permanentDistrictCode" => "10",
    "presentStreet" => "MISSON PARA",
    "presentCityTownVillage" => "Misson Road.",
    "presentPostOffice" => "Krishnagar",
    "presentPincode" => "741101",
    "presentDistrictCode" => "10",
    "applicantHeadquarter" => "L2-DIRECTORATE/ COMMISSIONERATE",
    "gradePay" => "3600",
    "payBandId" => "3",
    "applicantPostingPlace" => "1, K.S.ROY ROAD, N.S.BUILDING KOLKATA KOLKATA KOLKATA Calcutta West Bengal",
    "payInThePayBand" => "14570",
    "officeStreetCharacter" => "1, K.S.ROY ROAD, N.S.BUILDING KOLKATA KOLKATA KOLKATA Calcutta West Bengal",
    "officeCityTownVillage" => "KOLKATA",
    "officePostOffice" => "KOLKATA",
    "officePinCode" => "700001",
    "officeDistrict" => "17"
  ];
}

function formatHrmsDate($dateString)
{
  $dateArray = explode('/', $dateString);
  $formatted = $dateArray[2] . '-' . $dateArray[1] . '-' . $dateArray[0];
  $result = DateTime::createFromFormat('Y-m-d', $formatted);
  $result = $result->format('Y-m-d');

  return $result;
}
