<?php include "inc/header.php"; ?>

	<?php

		$id = Session::get("UserId");

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateprofile'])){

            $updateprofile = $user->profileUpdate($_POST, $_FILES, $id);
        }

    ?>

    <?php
  $countries =
   
  array(
  "AF" => "Afghanistan",
  "AL" => "Albania",
  "DZ" => "Algeria",
  "AS" => "American Samoa",
  "AD" => "Andorra",
  "AO" => "Angola",
  "AI" => "Anguilla",
  "AQ" => "Antarctica",
  "AG" => "Antigua and Barbuda",
  "AR" => "Argentina",
  "AM" => "Armenia",
  "AW" => "Aruba",
  "AU" => "Australia",
  "AT" => "Austria",
  "AZ" => "Azerbaijan",
  "BS" => "Bahamas",
  "BH" => "Bahrain",
  "BD" => "Bangladesh",
  "BB" => "Barbados",
  "BY" => "Belarus",
  "BE" => "Belgium",
  "BZ" => "Belize",
  "BJ" => "Benin",
  "BM" => "Bermuda",
  "BT" => "Bhutan",
  "BO" => "Bolivia",
  "BA" => "Bosnia and Herzegovina",
  "BW" => "Botswana",
  "BV" => "Bouvet Island",
  "BR" => "Brazil",
  "IO" => "British Indian Ocean Territory",
  "BN" => "Brunei Darussalam",
  "BG" => "Bulgaria",
  "BF" => "Burkina Faso",
  "BI" => "Burundi",
  "KH" => "Cambodia",
  "CM" => "Cameroon",
  "CA" => "Canada",
  "CV" => "Cape Verde",
  "KY" => "Cayman Islands",
  "CF" => "Central African Republic",
  "TD" => "Chad",
  "CL" => "Chile",
  "CN" => "China",
  "CX" => "Christmas Island",
  "CC" => "Cocos (Keeling) Islands",
  "CO" => "Colombia",
  "KM" => "Comoros",
  "CG" => "Congo",
  "CD" => "Congo, the Democratic Republic of the",
  "CK" => "Cook Islands",
  "CR" => "Costa Rica",
  "CI" => "Cote D'Ivoire",
  "HR" => "Croatia",
  "CU" => "Cuba",
  "CY" => "Cyprus",
  "CZ" => "Czech Republic",
  "DK" => "Denmark",
  "DJ" => "Djibouti",
  "DM" => "Dominica",
  "DO" => "Dominican Republic",
  "EC" => "Ecuador",
  "EG" => "Egypt",
  "SV" => "El Salvador",
  "GQ" => "Equatorial Guinea",
  "ER" => "Eritrea",
  "EE" => "Estonia",
  "ET" => "Ethiopia",
  "FK" => "Falkland Islands (Malvinas)",
  "FO" => "Faroe Islands",
  "FJ" => "Fiji",
  "FI" => "Finland",
  "FR" => "France",
  "GF" => "French Guiana",
  "PF" => "French Polynesia",
  "TF" => "French Southern Territories",
  "GA" => "Gabon",
  "GM" => "Gambia",
  "GE" => "Georgia",
  "DE" => "Germany",
  "GH" => "Ghana",
  "GI" => "Gibraltar",
  "GR" => "Greece",
  "GL" => "Greenland",
  "GD" => "Grenada",
  "GP" => "Guadeloupe",
  "GU" => "Guam",
  "GT" => "Guatemala",
  "GN" => "Guinea",
  "GW" => "Guinea-Bissau",
  "GY" => "Guyana",
  "HT" => "Haiti",
  "HM" => "Heard Island and Mcdonald Islands",
  "VA" => "Holy See (Vatican City State)",
  "HN" => "Honduras",
  "HK" => "Hong Kong",
  "HU" => "Hungary",
  "IS" => "Iceland",
  "IN" => "India",
  "ID" => "Indonesia",
  "IR" => "Iran, Islamic Republic of",
  "IQ" => "Iraq",
  "IE" => "Ireland",
  "IL" => "Israel",
  "IT" => "Italy",
  "JM" => "Jamaica",
  "JP" => "Japan",
  "JO" => "Jordan",
  "KZ" => "Kazakhstan",
  "KE" => "Kenya",
  "KI" => "Kiribati",
  "KP" => "Korea, Democratic People's Republic of",
  "KR" => "Korea, Republic of",
  "KW" => "Kuwait",
  "KG" => "Kyrgyzstan",
  "LA" => "Lao People's Democratic Republic",
  "LV" => "Latvia",
  "LB" => "Lebanon",
  "LS" => "Lesotho",
  "LR" => "Liberia",
  "LY" => "Libyan Arab Jamahiriya",
  "LI" => "Liechtenstein",
  "LT" => "Lithuania",
  "LU" => "Luxembourg",
  "MO" => "Macao",
  "MK" => "Macedonia, the Former Yugoslav Republic of",
  "MG" => "Madagascar",
  "MW" => "Malawi",
  "MY" => "Malaysia",
  "MV" => "Maldives",
  "ML" => "Mali",
  "MT" => "Malta",
  "MH" => "Marshall Islands",
  "MQ" => "Martinique",
  "MR" => "Mauritania",
  "MU" => "Mauritius",
  "YT" => "Mayotte",
  "MX" => "Mexico",
  "FM" => "Micronesia, Federated States of",
  "MD" => "Moldova, Republic of",
  "MC" => "Monaco",
  "MN" => "Mongolia",
  "MS" => "Montserrat",
  "MA" => "Morocco",
  "MZ" => "Mozambique",
  "MM" => "Myanmar",
  "NA" => "Namibia",
  "NR" => "Nauru",
  "NP" => "Nepal",
  "NL" => "Netherlands",
  "AN" => "Netherlands Antilles",
  "NC" => "New Caledonia",
  "NZ" => "New Zealand",
  "NI" => "Nicaragua",
  "NE" => "Niger",
  "NG" => "Nigeria",
  "NU" => "Niue",
  "NF" => "Norfolk Island",
  "MP" => "Northern Mariana Islands",
  "NO" => "Norway",
  "OM" => "Oman",
  "PK" => "Pakistan",
  "PW" => "Palau",
  "PS" => "Palestinian Territory, Occupied",
  "PA" => "Panama",
  "PG" => "Papua New Guinea",
  "PY" => "Paraguay",
  "PE" => "Peru",
  "PH" => "Philippines",
  "PN" => "Pitcairn",
  "PL" => "Poland",
  "PT" => "Portugal",
  "PR" => "Puerto Rico",
  "QA" => "Qatar",
  "RE" => "Reunion",
  "RO" => "Romania",
  "RU" => "Russian Federation",
  "RW" => "Rwanda",
  "SH" => "Saint Helena",
  "KN" => "Saint Kitts and Nevis",
  "LC" => "Saint Lucia",
  "PM" => "Saint Pierre and Miquelon",
  "VC" => "Saint Vincent and the Grenadines",
  "WS" => "Samoa",
  "SM" => "San Marino",
  "ST" => "Sao Tome and Principe",
  "SA" => "Saudi Arabia",
  "SN" => "Senegal",
  "CS" => "Serbia and Montenegro",
  "SC" => "Seychelles",
  "SL" => "Sierra Leone",
  "SG" => "Singapore",
  "SK" => "Slovakia",
  "SI" => "Slovenia",
  "SB" => "Solomon Islands",
  "SO" => "Somalia",
  "ZA" => "South Africa",
  "GS" => "South Georgia and the South Sandwich Islands",
  "ES" => "Spain",
  "LK" => "Sri Lanka",
  "SD" => "Sudan",
  "SR" => "Suriname",
  "SJ" => "Svalbard and Jan Mayen",
  "SZ" => "Swaziland",
  "SE" => "Sweden",
  "CH" => "Switzerland",
  "SY" => "Syrian Arab Republic",
  "TW" => "Taiwan, Province of China",
  "TJ" => "Tajikistan",
  "TZ" => "Tanzania, United Republic of",
  "TH" => "Thailand",
  "TL" => "Timor-Leste",
  "TG" => "Togo",
  "TK" => "Tokelau",
  "TO" => "Tonga",
  "TT" => "Trinidad and Tobago",
  "TN" => "Tunisia",
  "TR" => "Turkey",
  "TM" => "Turkmenistan",
  "TC" => "Turks and Caicos Islands",
  "TV" => "Tuvalu",
  "UG" => "Uganda",
  "UA" => "Ukraine",
  "AE" => "United Arab Emirates",
  "GB" => "United Kingdom",
  "US" => "United States",
  "UM" => "United States Minor Outlying Islands",
  "UY" => "Uruguay",
  "UZ" => "Uzbekistan",
  "VU" => "Vanuatu",
  "VE" => "Venezuela",
  "VN" => "Viet Nam",
  "VG" => "Virgin Islands, British",
  "VI" => "Virgin Islands, U.s.",
  "WF" => "Wallis and Futuna",
  "EH" => "Western Sahara",
  "YE" => "Yemen",
  "ZM" => "Zambia",
  "ZW" => "Zimbabwe"
  );
  ?>

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
            	<div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        	<h4 class="card-title">Update Profile</h4><hr>
                            <p class="card-description">
                            </p>

                            <?php  

                            	if(isset($updateprofile)){
                            		echo $updateprofile;
                            	}

                            ?>

                            <form action="" method="post" enctype="multipart/form-data" class="mb-5">
                            	<?php

		                            $getUsers = $admin->getUserById($id);

		                            if($getUsers){

		                              while($result = $getUsers->fetch_assoc()){
		                                $username = $result['username'];
		                                $user_email = $result['user_email'];
		                                $user_wallet_id = $result['user_wallet_id'];
		                                $user_country = $result['user_country'];
		                                $user_image = $result['user_image'];

		                              }
		                            }

		                            if(empty($user_image)){

		                            	$user_image = "/dashboard/images/faces/face88.jpg";

		                            }else if(!file_exists($user_image)){

		                            	$user_image = "/dashboard/images/faces/face88.jpg";
		                            }

		                        ?>
                            	<div class="mb-4">
	                                <label for="" class="form-label"><strong>Profile Image</strong></label><br>

	                                <img src="<?php echo $user_image; ?>" width="50" height="50" alt="" class="mb-2 img-fluid">
                                	<input type="file" name="user_image" class="form-control">
	                            </div>
	                            <div class="mb-4">
	                            	<label for="" class="form-label"><strong>Username</strong></label><br>
                                	<input type="text" name="username" class="form-control" value="<?= $username; ?>">
	                            </div>
	                            <div class="mb-4">
	                            	<label for="" class="form-label"><strong>Email Address</strong></label><br>
                                	<input readonly type="text" name="user_email" class="form-control" value="<?= $user_email; ?>">
	                            </div>
	                            <div class="mb-4">
	                            	<label for="" class="form-label"><strong>Wallet Address</strong></label><br>
                                	<input type="text" readonly name="user_wallet_id" class="form-control" value="<?= $user_wallet_id; ?>">
	                            </div>
	                            <div class="mb-4">
	                            	<label for="" class="form-label"><strong>Country</strong></label><br>

	                            	<select name="user_country" class="form-control">
					                    <option value=""><?= $user_country; ?></option>
					                    <?php 

					                      foreach($countries as $country):?>
					                    <option value="<?=$country?>"><?=$country?></option>

					                  <?php endforeach; ?>
					                </select>
	                            	
	                            </div>

	                            <button type="submit" name="updateprofile" class="btn btn-success">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    



<?php include "inc/footer.php"; ?>