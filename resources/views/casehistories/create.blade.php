@extends('users.admin.layouts.master')
@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_green.css">

@endsection
@section('content')

    <!-- begin:: Content -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <!-- begin:: Content Head -->
        <div class="kt-subheader  kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">

                    <h3 class="kt-subheader__title">{{isset($casehistory) ? 'Edit Case History Info' : 'Add Case History'}}</h3>

                    <span class="kt-subheader__separator kt-subheader__separator--v"></span>

                    

                    <div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
                        <input type="text" class="form-control" placeholder="Search order..." id="generalSearch">
                        <span class="kt-input-icon__icon kt-input-icon__icon--right">
                        <span><i class="flaticon2-search-1"></i></span>
                </span>
                    </div>
                </div>
                <div class="kt-subheader__toolbar">
                    <div class="kt-subheader__wrapper">
                        

                        

                        <div class="dropdown dropdown-inline" data-toggle-="kt-tooltip" title="Quick actions"
                             data-placement="left">
                            <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                     class="kt-svg-icon kt-svg-icon--success kt-svg-icon--md">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon id="Shape" points="0 0 24 0 24 24 0 24"/>
                                        <path
                                            d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z"
                                            id="Combined-Shape" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        <path
                                            d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z"
                                            id="Combined-Shape" fill="#000000"/>
                                    </g>
                                </svg>                        <!--<i class="flaticon2-plus"></i>-->
                            </a>
                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-md dropdown-menu-right">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:: Content Head -->

        <!-- begin:: Content Container-->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="row">
                <div class="offset-2 col-md-8">
                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    {{isset($casehistory) ? 'Edit Case History Info' : 'Add Case History'}}
                                </h3>
                            </div>
                        </div>

                        <!--begin::Form-->
                        <form style="background-color:SkyBlue" class="kt-form kt-form--label-right"
                              action="{{isset($casehistory) ? route('casehistories.update',$casehistory->id) : route('casehistories.store')}}"
                              method="POST"
                              enctype="multipart/form-data">
                            <div class="kt-portlet__body">
                                <div class="form-group form-group-last">
                                    <div class="alert alert-secondary" role="alert">
                                        <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                                        <div class="alert-text">
                                            You Can Add New Case History From This Form.
                                        </div>
                                    </div>
                                </div>
                                @csrf
                                @if(isset($casehistory))
                                    @method('PUT')
                                @endif
                                <div class="form-group">
                                    <label><b>Patient</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fa fa-heading"></i></span></div>
                                        @if(isset($patients))
                                            <select class="form-control" name="patient" id="patient">
                                                <option>select patient</option>
                                                @foreach($patients as $patient)
                                                    <option
                                                        value="{{$patient->id}}" @if(isset($casehistory)) {{$patient->id == $casehistory->patient_id ? 'selected' : ''}} @endif>{{$patient->first_name.''.$patient->last_name}}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group" id="dateDiv">
                                    <label><b>Date</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fa fa-calendar"></i></span></div>
                                        <input class="form-control" type="text" name="date" id="date" @if(isset($casehistory)) value="{{$casehistory->date}}"@endif>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><b>Title</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fa fa-heading"></i></span></div>
                                        <input type="text" class="form-control" name="title" id="title"@if(isset($casehistory)) value="{{$casehistory->title}}"@endif>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><b>Food Allergies</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fa fa-heading"></i></span></div>
                                        <textarea class="form-control" name="food_allergies" id="food_allergies">@if(isset($casehistory)) {{$casehistory->food_allergies}} @endif</textarea>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><b>Bleed Tendency</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fa fa-heading"></i></span></div>
                                        <textarea class="form-control" name="bleed_tendency" id="bleed_tendency">@if(isset($casehistory)) {{$casehistory->bleed_tendency}} @endif</textarea>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><b>Heart Disease</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fa fa-heading"></i></span></div>
                                        <textarea class="form-control" name="heart_disease" id="heart_disease">@if(isset($casehistory)) {{$casehistory->heart_disease}} @endif</textarea>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><b>Blood Pressure</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fa fa-heading"></i></span></div>
                                        <textarea class="form-control" name="blood_pressure" id="blood_pressure">@if(isset($casehistory)) {{$casehistory->blood_pressure}} @endif</textarea>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><b>Diabetic</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fa fa-heading"></i></span></div>
                                        <textarea class="form-control" name="diabetic" id="diabetic">@if(isset($casehistory)) {{$casehistory->diabetic}} @endif</textarea>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><b>Surgery</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fa fa-heading"></i></span></div>
                                        <textarea class="form-control" name="surgery" id="surgery">@if(isset($casehistory)) {{$casehistory->surgery}} @endif</textarea>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><b>Accident</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fa fa-heading"></i></span></div>
                                        <textarea class="form-control" name="accident" id="accident">@if(isset($casehistory)) {{$casehistory->accident}} @endif</textarea>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><b>Family Medical History</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fa fa-heading"></i></span></div>
                                        <textarea class="form-control" name="family_medical_history" id="family_medical_history">@if(isset($casehistory)) {{$casehistory->family_medical_history}} @endif</textarea>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><b>Current Medication</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fa fa-heading"></i></span></div>
                                        <textarea class="form-control" name="current_medication" id="current_medication">@if(isset($casehistory)) {{$casehistory->current_medication}} @endif</textarea>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><b>Female Pregnancy</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fa fa-heading"></i></span></div>
                                        <textarea class="form-control" name="female_pregnancy" id="female_pregnancy">@if(isset($casehistory)) {{$casehistory->female_pregnancy}} @endif</textarea>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><b>Breast Feeding</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fa fa-heading"></i></span></div>
                                        <textarea class="form-control" name="breast_feeding" id="breast_feeding">@if(isset($casehistory)) {{$casehistory->breast_feeding}} @endif</textarea>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><b>Health Insurance</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fa fa-heading"></i></span></div>
                                        <textarea class="form-control" name="health_insurance" id="health_insurance">@if(isset($casehistory)) {{$casehistory->health_insurance}} @endif</textarea>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><b>Low Income</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fa fa-heading"></i></span></div>
                                        <textarea class="form-control" name="low_income" id="low_income">@if(isset($casehistory)) {{$casehistory->low_income}} @endif</textarea>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><b>Reference</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fa fa-heading"></i></span></div>
                                        <textarea class="form-control" name="reference" id="reference">@if(isset($casehistory)) {{$casehistory->reference}} @endif</textarea>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><b>Others</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fa fa-heading"></i></span></div>
                                        <textarea class="form-control" name="others" id="others">@if(isset($casehistory)) {{$casehistory->others}} @endif</textarea>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><b>Status</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-venus-mars"></i></span></div>
                                        <select class="form-control" name="status" id="status">
                                            <option>Select Status</option>
                                            <option
                                                value="active" @if(isset($casehistory)) {{$casehistory->status == 'active' ? 'selected' : ''}} @endif>
                                                active
                                            </option>
                                            <option
                                                value="inactive" @if(isset($casehistory)) {{$casehistory->status == 'inactive' ? 'selected' : ''}} @endif>
                                                inactive
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <input type="submit" value="{{isset($casehistory) ? 'Update' : 'Submit'}}"
                                           class="btn-lg btn-primary">
                                    <input type="reset" class="btn-lg btn-danger" value="Cancel">
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Portlet-->
                </div>
            </div>
        </div>
        <!-- end:: Content Container-->
    </div>
    <!-- begin:: Content -->

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('#date', {
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });
    </script>
@endsection
