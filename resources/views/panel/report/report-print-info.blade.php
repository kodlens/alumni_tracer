@extends('layouts.app-print')

@section('extracss')
    <style>
        .img-holder{
            height: 150px;
            width: 150px;
            object-fit: cover;
        }

        .info-wrapper{
            display: flex;

        }
        .info-wrapper > div{
            margin: 10px;
        }

        .info-section-table{
            margin: auto;
        }

        .control-data{
            display: flex;
            padding: 0;
            margin: 0;
            font-size: .8em;
        }

        .label{
            width: 120px;
            font-size: .9em;
        }

        .label-value{
            font-weight: bold;
            margin-left: 5px;
        }

        .word {
            width: 100%;
            text-align: center;
            border-bottom: 1px solid #a7a7a7;
            line-height: 0.1em;
            margin: 10px 0 20px;

        }

        .word span {
            background:#fff;
            padding:0 10px;
            font-weight: bold;
        }

        .bond-paper{
            width: 816px;
            margin: auto;
            /*background-image: url("/img/logo.png");*/
            /*background-repeat: no-repeat;*/
            /*width: 100%;*/
        }

    </style>
@endsection



@section('content')

    <div class="bond-paper">
        <div class="info-wrapper">
            <div>
                <img src="/{{ $user->profile_image }}" class="img-holder" alt="..." />
            </div>

            <div class="info-side">
                <div class="control-data">
                    <span class="label">NAME:</span>
                    <span class="label-value">{{ $user->lname }}, {{ $user->fname }} {{ $user->mname }}, {{ $user->suffix }}</span>
                </div>

                <div class="control-data">
                    <span class="label">SEX:</span>
                    <span class="label-value">{{ $user->sex }}</span>
                </div>

                <div class="control-data">
                    <span class="label">CIVIL STATUS:</span>
                    <span class="label-value">{{ $user->civil_status }}</span>
                </div>

                <div class="control-data">
                    <span class="label">CONTACT NO.:</span>
                    <span class="label-value">{{ $user->contact_number }}</span>
                </div>

                <div class="control-data">
                    <span class="label">EMAIL:</span>
                    <span class="label-value">{{ $user->email }}</span>
                </div>

                <div class="control-data">
                    <span class="label">FACEBOOK ACCOUNT:</span>
                    <span class="label-value">{{ $user->fb_account }}</span>
                </div>

                <div class="control-data">
                    <span class="label">MEMBERSHIP CLASSIFICATION:</span>
                    <span class="label-value">{{ $user->alumni_classification }}</span>
                </div>


                <div class="control-data">
                    <span class="label">PROGRAM:</span>
                    <span class="label-value">{{ $user->program }}</span>
                </div>

                <div class="control-data">
                    <span class="label">SCHOOL NAME:</span>
                    <span class="label-value">{{ $user->ins_name }}</span>
                </div>

                <div class="control-data">
                    <span class="label">YEAR GRADUATED:</span>
                    <span class="label-value">{{ $user->year_graduated }}</span>
                </div>

            </div>

        </div>

        <div style="width: 100%;">
            <div class="word"><span>EDUCATIONAL ADVANCEMENT</span></div>
        </div>

        <div class="info-wrapper" style="justify-content: center;">
            <div class="info-section-table">
                <table class="table has-text-centered" >
                    <thead>
                        <th>Level</th>
                        <th>School Name</th>
                        <th>Remark</th>
                        <th>Unit</th>
                        <th>Year Graduated</th>
                    </thead>
                    <tbody>
                        @foreach($educations as $educ)
                            <tr>
                                <td>{{$educ->level}}</td>
                                <td>{{$educ->school_name}}</td>
                                <td>{{$educ->remark}}</td>
                                <td>{{$educ->unit}}</td>
                                <td>{{$educ->year_graduated}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div style="width: 100%;">
            <div class="word"><span>ELIGIBILITY</span></div>
        </div>

        <div class="info-wrapper" style="justify-content: center;">
            <div class="info-section-table">
                <table class="table">
                    <thead>
                        <th>Eligible</th>
                        <th>Eligible Since (year)</th>
                        <th>Rating</th>
                        <th>License Number</th>
                    </thead>
                    <tbody>
                    @foreach($eligibilities as $elig)
                        <tr>
                            <td>{{$elig->eligible}}</td>
                            <td>{{$elig->date_acquired}}</td>
                            <td>{{$elig->rating}}</td>
                            <td>{{$elig->license_id}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <div style="width: 100%;">
            <div class="word"><span>EMPOLYMENT SURVEY</span></div>
        </div>

        <div class="info-wrapper" style="justify-content: center;">
            <div style="border-right: 1px solid #b8b8b8; padding: 0 15px;">
                <div class="control-data">
                    <span class="label">Are you Employed?:</span>
                    <span class="label-value">{{ $emp->is_employed == 1 ? 'YES' : 'NO' }}</span>
                </div>

                <div class="control-data">
                    <span class="label">Organization:</span>
                    <span class="label-value">{{ $emp->organization }}</span>
                </div>

                <div class="control-data">
                    <span class="label">Designation:</span>
                    <span class="label-value">{{ $emp->designation }}</span>
                </div>
                

                <div class="control-data">
                    <span class="label">From - To:</span>
                    <span class="label-value">{{ $emp->year_from }} - {{ $emp->year_to }}</span>
                </div>

                <div class="control-data">
                    <span class="label">Inline w/ Current Job?:</span>
                    <span class="label-value">{{ $emp->current_job == 1 ? 'YES' : 'NO' }}</span>
                </div>

                <div class="control-data">
                    <span class="label">Employment Type:</span>
                    <span class="label-value">{{ $emp->employment_type }}</span>
                </div>

                <div class="control-data">
                    <span class="label">Occupation Type:</span>
                    <span class="label-value">{{ $emp->occupation_type }}</span>
                </div>

                <div class="control-data">
                    <span class="label">Is this your first job:</span>
                    <span class="label-value">{{ $emp->is_first_job == 1 ? 'YES' : 'NO' }}</span>
                </div>

                <div class="control-data">
                        <span class="label">Local/Abroad:</span>
                        <span class="label-value">{{ $emp->work_category }}</span>
                </div>
                
            </div>

            <div>
                

                <div class="control-data">
                        <span class="label">How long did it take to land the job?:</span>
                        <span class="label-value">{{ $emp->take_job }}</span>
                </div>

                <div class="control-data">
                    <span class="label">Monthly Range of Salary:</span>
                    <span class="label-value">{{ $emp->monthly_range }}</span>
                </div>


                <div class="control-data">
                    <span class="label">Rate of satisfaction:</span>
                    <span class="label-value">{{ $emp->satisfy_job }}</span>
                </div>

                <div class="control-data">
                    <span class="label">Course/Program Contributon:</span>
                    <span class="label-value">{{ $emp->growth }}</span>
                </div>

                <div class="control-data">
                    <span class="label">Rated degree of GADTC:</span>
                    <span class="label-value">{{ $emp->degree_earned }}</span>
                </div>

            </div>
        </div>


        <div style="width: 100%;">
            <div class="word"><span>ADDRESS</span></div>
        </div>

        <div class="info-wrapper" style="justify-content: center;">
            <div class="">
                <h1 class="title is-5">
                    HOME ADDRESS
                </h1>
                <div class="control-data">
                    <span class="label">Country:</span>
                    <span class="label-value">{{ $address ? $address->country_boarding : '' }}</span>
                </div>
                <div class="control-data">
                    <span class="label">Province:</span>
                    <span class="label-value">{{ $address ? $address->province_boarding : ''}}</span>
                </div>
                <div class="control-data">
                    <span class="label">City/Municipality:</span>
                    <span class="label-value">{{ $address ? $address->city_boarding : '' }}</span>
                </div>
                <div class="control-data">
                    <span class="label">District:</span>
                    <span class="label-value">{{ $address ? $address->district_boarding : ''}}</span>
                </div>
                <div class="control-data">
                    <span class="label">Barangay:</span>
                    <span class="label-value">{{ $address ? $address->brgy_boarding : ''}}</span>
                </div>
                <div class="control-data">
                    <span class="label">Zipcode:</span>
                    <span class="label-value">{{ $address ? $address->zipcode_boarding : '' }}</span>
                </div>
            </div>

            <div style="border-left: 1px solid #c1c1c1;border-right: 1px solid #c1c1c1; padding: 0 15px;">
                <h1 class="title is-5">
                    WORK ADDRESS
                </h1>
                <div class="control-data">
                    <span class="label">Country:</span>
                    <span class="label-value">{{ $address ? $address->country_work : ''}}</span>
                </div>
                <div class="control-data">
                    <span class="label">Province:</span>
                    <span class="label-value">{{ $address ? $address->province_work : ''}}</span>
                </div>
                <div class="control-data">
                    <span class="label">City/Municipality:</span>
                    <span class="label-value">{{ $address ? $address->city_work : ''}}</span>
                </div>
                <div class="control-data">
                    <span class="label">District:</span>
                    <span class="label-value">{{ $address ? $address->district_work : '' }}</span>
                </div>
                <div class="control-data">
                    <span class="label">Barangay:</span>
                    <span class="label-value">{{ $address ? $address->brgy_work : ''}}</span>
                </div>
                <div class="control-data">
                    <span class="label">Zipcode:</span>
                    <span class="label-value">{{ $address ? $address->zipcode_work : ''}}</span>
                </div>
            </div>


            <div>
                <h1 class="title is-5">
                    PRESENT ADDRESS
                </h1>
                <div class="control-data">
                    <span class="label">Country:</span>
                    <span class="label-value">{{ $address ? $address->country_perm : '' }}</span>
                </div>
                <div class="control-data">
                    <span class="label">Province:</span>
                    <span class="label-value">{{ $address ? $address->province_perm : '' }}</span>
                </div>
                <div class="control-data">
                    <span class="label">City/Municipality:</span>
                    <span class="label-value">{{ $address ? $address->city_perm : '' }}</span>
                </div>
                <div class="control-data">
                    <span class="label">District:</span>
                    <span class="label-value">{{ $address ? $address->district_perm : '' }}</span>
                </div>
                <div class="control-data">
                    <span class="label">Barangay:</span>
                    <span class="label-value">{{ $address ? $address->brgy_perm : '' }}</span>
                </div>
                <div class="control-data">
                    <span class="label">Zipcode:</span>
                    <span class="label-value">{{ $address ? $address->zipcode_perm : '' }}</span>
                </div>
            </div>


        </div>


    </div>

@endsection
