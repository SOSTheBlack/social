@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Form Wizard')

{{-- vendor style --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/flag-icon/css/flag-icon.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/materialize-stepper/materialize-stepper.min.css')}}">
@endsection
{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/form-wizard.css')}}">
@endsection

{{-- page content --}}
@section('content')
<div class="section section-form-wizard">
  <div class="row">
                            <div class="col s12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-header">
                                            <h4 class="card-title">Linear Stepper</h4>
                                        </div>

                                        <ul class="stepper linear" id="linearStepper">
                                            <li class="step active">
                                                <div class="step-title waves-effect">Step 1</div>
                                                <div class="step-content">
                                                    <div class="row">
                                                        <div class="input-field col m6 s12">
                                                            <label for="firstName12">First Name: <span class="red-text">*</span></label>
                                                            <input type="text" id="firstName12" name="firstName1" class="validate" required>
                                                        </div>
                                                        <div class="input-field col m6 s12">
                                                            <label for="lastName1">Last Name: <span class="red-text">*</span></label>
                                                            <input type="text" id="lastName1" class="validate" name="lastName1" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col m6 s12">
                                                            <label for="Email2">Email: <span class="red-text">*</span></label>
                                                            <input type="email" class="validate" name="Email" id="Email2" required>
                                                        </div>
                                                        <div class="input-field col m6 s12">
                                                            <label for="contactNum2">Contact Number: <span class="red-text">*</span></label>
                                                            <input type="number" class="validate" name="contactNum" id="contactNum2" required>
                                                        </div>
                                                    </div>
                                                    <div class="step-actions">
                                                        <div class="row">
                                                            <div class="col m4 s12 mb-3">
                                                                <button class="red btn btn-reset" type="reset">
                                                                    <i class="material-icons left">clear</i>Reset
                                                                </button>
                                                            </div>
                                                            <div class="col m4 s12 mb-3">
                                                                <button class="btn btn-light previous-step" disabled>
                                                                    <i class="material-icons left">arrow_back</i>
                                                                    Prev
                                                                </button>
                                                            </div>
                                                            <div class="col m4 s12 mb-3">
                                                                <button class="waves-effect waves dark btn btn-primary next-step" type="submit">
                                                                    Next
                                                                    <i class="material-icons right">arrow_forward</i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="step">
                                                <div class="step-title waves-effect">Step 2</div>
                                                <div class="step-content">
                                                    <div class="row">
                                                        <div class="input-field col m6 s12">
                                                            <label for="proposal1">Proposal Title: <span class="red-text">*</span></label>
                                                            <input type="text" class="validate" id="proposal1" name="proposal1" required>
                                                        </div>
                                                        <div class="input-field col m6 s12">
                                                            <label for="job1">Job Title: <span class="red-text">*</span></label>
                                                            <input type="text" class="validate" id="job1" name="job1" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col m6 s12">
                                                            <label for="company12">Previous Company:</label>
                                                            <input type="text" class="validate" id="company12" name="company1">
                                                        </div>
                                                        <div class="input-field col m6 s12">
                                                            <label for="url1">Video Url:</label>
                                                            <input type="url" class="validate" id="url1">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col m6 s12">
                                                            <label for="exp1">Experience: <span class="red-text">*</span></label>
                                                            <input type="text" class="validate" id="exp1" name="exp1">
                                                        </div>
                                                        <div class="input-field col m6 s12">
                                                            <label for="desc1">Short Description: <span class="red-text">*</span></label>
                                                            <textarea name="desc" id="desc1" rows="4" class="materialize-textarea"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="step-actions">
                                                        <div class="row">
                                                            <div class="col m4 s12 mb-3">
                                                                <button class="red btn btn-reset" type="reset">
                                                                    <i class="material-icons left">clear</i>Reset
                                                                </button>
                                                            </div>
                                                            <div class="col m4 s12 mb-3">
                                                                <button class="btn btn-light previous-step">
                                                                    <i class="material-icons left">arrow_back</i>
                                                                    Prev
                                                                </button>
                                                            </div>
                                                            <div class="col m4 s12 mb-3">
                                                                <button class="waves-effect waves dark btn btn-primary next-step" type="submit">
                                                                    Next
                                                                    <i class="material-icons right">arrow_forward</i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="step">
                                                <div class="step-title waves-effect">Step 3</div>
                                                <div class="step-content">
                                                    <div class="row">
                                                        <div class="input-field col m6 s12">
                                                            <label for="eventName1">Event Name: <span class="red-text">*</span></label>
                                                            <input type="text" class="validate" id="eventName1" name="eventName1" required>
                                                        </div>
                                                        <div class="input-field col m6 s12">
                                                            <select>
                                                                <option value="Select" disabled selected>Select Event Type</option>
                                                                <option value="Wedding">Wedding</option>
                                                                <option value="Party">Party</option>
                                                                <option value="FundRaiser">Fund Raiser</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col m6 s12">
                                                            <select>
                                                                <option value="Select" disabled selected>Select Event Status</option>
                                                                <option value="Planning">Planning</option>
                                                                <option value="In Progress">In Progress</option>
                                                                <option value="Completed">Completed</option>
                                                            </select>
                                                        </div>
                                                        <div class="input-field col m6 s12">
                                                            <select>
                                                                <option value="Select" disabled selected>Event Location</option>
                                                                <option value="New York">New York</option>
                                                                <option value="Queens">Queens</option>
                                                                <option value="Washington">Washington</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col m6 s12">
                                                            <label for="Budget1">Event Budget: <span class="red-text">*</span></label>
                                                            <input type="Number" class="validate" id="Budget1" name="Budget1">
                                                        </div>
                                                        <div class="input-field col m6 s12">
                                                            <p> <label>Requirments</label></p>
                                                            <p> <label>
                                                                    <input type="checkbox">
                                                                    <span>Staffing</span>
                                                                </label></p>
                                                            <p><label>
                                                                    <input type="checkbox">
                                                                    <span>Catering</span>
                                                                </label></p>
                                                        </div>
                                                    </div>
                                                    <div class="step-actions">
                                                        <div class="row">
                                                            <div class="col m6 s12 mb-1">
                                                                <button class="red btn mr-1 btn-reset" type="reset">
                                                                    <i class="material-icons">clear</i>
                                                                    Reset
                                                                </button>
                                                            </div>
                                                            <div class="col m6 s12 mb-1">
                                                                <button class="waves-effect waves-dark btn btn-primary" type="submit">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
</div>
@endsection

{{-- vendor script --}}
@section('vendor-script')
<script src="{{asset('vendors/materialize-stepper/materialize-stepper.min.js')}}"></script>
@endsection

{{-- page script --}}
@section('page-script')
<script src="{{asset('js/scripts/form-wizard.js')}}"></script>
@endsection
