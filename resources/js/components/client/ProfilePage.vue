<template>
    <div>
        <div class="section">
           <div class="container">
               <div class="columns">
                   <div class="column is-8 is-offset-2">

                       <div class="box">
                            <b-tabs v-model ="activeTab">
                                <!-- Personal Information -->
                                <b-tab-item label="Personal Information">
                                    <form @submit.prevent="submitInformation">
                                         <!-- Name -->
                                        <div class="columns">
                                            <div class="column">
                                                <div class="avatar-container">
                                                    <img :src="fields.profile_image" @click="openModal" alt="..." />
                                                </div>

                                                <b-field class="file" :class="{'has-name' : !fields.image}">
                                                    <b-upload v-model="fields.image" class="file-label">
                                                            <span class="file-cta">
                                                                <b-icon class="file-icon" icon="upload"></b-icon>
                                                                <span class="file-label">Click to upload</span>
                                                            </span>
                                                        <span class="file-name" v-if="fields.image"> {{fields.image.name}} </span>
                                                    </b-upload>
                                                </b-field>
                                                <div style="color:red; font-style: italic;">Image size limit to 300kb only.</div>
                                            </div>
                                        </div>

                                        <div class="columns">
                                            <div class="column">
                                                <b-field label="First Name">
                                                    <b-input type="text" placeholder="First Name" v-model="fields.fname" required ></b-input>
                                                </b-field>
                                            </div>
                                            <div class="column">
                                                <b-field label="Middle Name">
                                                    <b-input type="text" placeholder="Middle Name" v-model="fields.mname" ></b-input>
                                                </b-field>
                                            </div>
                                            <div class="column">
                                                 <b-field label="Last Name">
                                                    <b-input type="text" placeholder="Last Name" v-model="fields.lname" required ></b-input>
                                                </b-field>
                                            </div>
                                        </div> <!--close columns-->

                                        <div class="columns">
                                            <div class="column">
                                                <b-field label="Suffix">
                                                    <b-input type="text" placeholder="Last Suffix" v-model="fields.suffix"  ></b-input>
                                                </b-field>
                                            </div>
                                            <div class="column">
                                                <b-field label="Sex" expanded>
                                                    <b-select placeholder="Sex"  v-model="fields.sex" expanded required >
                                                        <option value="MALE">MALE</option>
                                                        <option value="FEMALE">FEMALE</option>
                                                    </b-select>
                                                </b-field>
                                            </div>
                                            <div class="column">
                                                <b-field label="Civil Status" expanded>
                                                    <b-select placeholder="Civil Status" expanded v-model="fields.civil_status" required >
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Separated">Separated</option>
                                                        <option value="Widowed">Widowed</option>
                                                    </b-select>
                                                </b-field>
                                            </div>
                                        </div>

                                        <h2><span>OTHER INFORMATION</span></h2>
                                        <div class="columns">
                                            <div class="column">
                                                <b-field label="Membership Classification" expanded>
                                                    <b-select placeholder="Membership Classification" expanded v-model="fields.alumni_classification" required >
                                                        <option value="Associate">Associate</option>
                                                        <option value="Honorary">Honorary</option>
                                                        <option value="Regular">Regular</option>
                                                    </b-select>
                                                 </b-field>
                                            </div>

                                            <div class="column">
                                                <b-field label="E-mail">
                                                    <b-input type="email" placeholder="E-mail" v-model="fields.email" ></b-input>
                                                </b-field>
                                            </div>


                                        </div>

                                         <!-- Course -->
                                        <div class="columns">
                                             <div class="column">
                                                <b-field label="Contact Number" expanded>
                                                    <b-input type="text" placeholder="Contact Number" v-model="fields.contact_number" ></b-input>
                                                </b-field>
                                            </div>

                                            <div class="column">
                                                <b-field label="Facebook Account">
                                                    <b-input type="text" placeholder="Facebook Account" v-model="fields.fb_account" ></b-input>
                                                </b-field>
                                            </div>
                                        </div>

                                        <h2><span>LAST SCHOOL INFORMATION</span></h2>
                                        <div class="columns">
                                            <div class="column">
                                                <b-field label="Programs" expanded>
                                                    <b-select placeholder="Programs" expanded v-model="fields.program" required >
                                                        <option v-for="(program, index) in programs" :key="index" :value="program.program">{{ program.program }}</option>
                                                    </b-select>
                                                </b-field>
                                            </div> <!-- close column -->
                                        </div>

                                        <div class="columns">
                                            <div class="column is-8">
                                                <b-field label="School Name" >
                                                    <b-input type="text" v-model="fields.ins_name" placeholder="School Name" required ></b-input>
                                                </b-field>
                                            </div>

                                            <div class="column is-4">
                                                <b-field label="Year Graduated" >
                                                    <b-input type="text" v-model="fields.year_graduated" placeholder="Year Graduated" required ></b-input>
                                                </b-field>

                                            </div> <!-- close column -->

                                        </div> <!-- close columns -->

                                        <!-- BUTTON PERSONAL INFORMATION-->

                                        <div class="buttons is-right">
                                                <button class="button is-primary">
                                                     <i class="fa fa-user"></i>&nbsp;&nbsp;SAVE</button>
                                        </div>
                                    </form>
                                </b-tab-item>

                                <!-- Educational Information -->
                                <b-tab-item label="Educational Advancement">

                                    <form @submit.prevent="submitEducation">
                                        <div class="columns">
                                                <div class="column is-10 is-offset-1">
                                                    <i>(Masteral, Doctoral Programs and other units earned after your graduation in college)</i>

                                                    <div class="educ-wrapper" v-for="(educ, index) in this.educations" :key="index">
                                                        <input type="hidden" v-model="educ.education_id"/>
                                                        <div class="columns">
                                                            <div class="column">
                                                                <!-- Level -->
                                                                <b-field label ="Level">
                                                                    <b-select placeholder="Level" v-model ="educ.level">

                                                                        <option value="TERTIARY">TERTIARY</option>
                                                                        <option value="POST GRADUATE">POST GRADUATE</option>
                                                                        <option value="VOCATIONAL">VOCATIONAL</option>
                                                                    </b-select>
                                                                </b-field>
                                                            </div> <!--close column-->
                                                        </div> <!--close columns-->
                                                        <div class="columns">
                                                                <!-- Name of School -->
                                                            <div class="column">
                                                                <b-field label="Name of School">
                                                                    <b-input placeholder="Name of School" v-model="educ.school_name"></b-input>
                                                                </b-field>
                                                            </div> <!--close column-->

                                                            <!-- Remark -->
                                                            <div class="column">
                                                                <b-field label="Remark">
                                                                    <b-input placeholder="Remark" v-model="educ.remark"></b-input>
                                                                </b-field>
                                                            </div> <!--close column-->
                                                        </div>
                                                        <div class="columns">
                                                            <!-- Unit -->
                                                            <div class="column">
                                                                <b-field label="Units">
                                                                    <b-numberinput placeholder="Units" v-model="educ.unit"></b-numberinput>
                                                                </b-field>
                                                            </div> <!--close column-->


                                                            <!-- Year Graduated -->
                                                            <div class="column">
                                                                <b-field label="Year Graduated">
                                                                    <b-input placeholder="Year Graduated" v-model="educ.year_graduated"></b-input>
                                                                </b-field>
                                                            </div> <!--close column-->


                                                        </div> <!--close columns-->
                                                        <div class="buttons mt-3">
                                                            <button class="button is-small is-danger is-outlined"  @click="remove(index)">REMOVE</button>
                                                        </div>
                                                    </div> <!--close educ wrapper-->
                                                    <div class="buttons mt-3">
                                                        <b-button class="button is-small is-success is-outlined"  @click="add">ADD</b-button>
                                                    </div>
                                                </div> <!--close column-->
                                            </div> <!--close columns-->
                                            <div class="buttons is-right">
                                                <button class="button">
                                                    <i class="fa fa-user"></i>&nbsp;&nbsp;SAVE</button>
                                            </div>
                                    </form>
                                </b-tab-item>

                                <!-- Eligibility-->
                                <b-tab-item label="Eligibility">
                                    <form @submit.prevent="submitEligibility">
                                         <div class="columns">
                                                <div class="column is-10 is-offset-1">
                                                    <div class="educ-wrapper" v-for="(eligible, index) in this.eligibilities" :key="index">
                                                       <input type="hidden" v-model="eligible.eligibility_id"/>
                                                        <div class="columns">
                                                                <!-- Type of Eligibility -->
                                                            <div class="column is-8">
                                                                <b-field label="Eligibility">
                                                                    <b-input placeholder="Eligibility" v-model="eligible.eligible"></b-input>
                                                                </b-field>
                                                            </div> <!--close column-->
                                                            <!-- Date Acquired -->
                                                            <div class="column is-4">
                                                                <b-field label="Eligible Since (Year)">
                                                                    <b-input placeholder="Eligible Since (Year)" v-model="eligible.date_acquired"></b-input>
                                                                </b-field>
                                                            </div> <!--close column-->
                                                        </div> <!--close columns-->

                                                        <div class="columns">
                                                            <div class="column">
                                                                <b-field label="Rating">
                                                                    <b-input placeholder="Rating" v-model="eligible.rating"></b-input>
                                                                </b-field>
                                                            </div> <!--close column-->

                                                            <!-- License ID -->
                                                            <div class="column">
                                                                <b-field label="License Number">
                                                                    <b-input placeholder="License Number" v-model="eligible.license_id"></b-input>
                                                                </b-field>
                                                            </div> <!--close column-->
                                                        </div>

                                                        <div class="buttons mt-3">
                                                            <button class="button is-small is-danger is-outlined"  @click="removeEligible(index)">REMOVE</button>
                                                        </div>
                                                    </div> <!--close educ wrapper-->
                                                    <div class="buttons mt-3">
                                                        <b-button class="button is-small is-success is-outlined"  @click="addEligible">ADD</b-button>
                                                    </div>
                                                </div> <!--close column-->
                                            </div> <!--close columns-->
                                            <div class="buttons is-right">
                                                <button class="button">
                                                    <i class="fa fa-user"></i>&nbsp;&nbsp;SAVE</button>
                                            </div>

                                    </form>
                                </b-tab-item>

                                 <!-- Addresses-->
                                <b-tab-item label="Addresses">
                                    <form  @submit.prevent="submitAddress">
                                        <div class="title is-5">Home Address</div>
                                        <i>(Refers to Address of Origin, especially during your college days)</i>
                                        <input type="hidden" v-model="nAddresses.address_id">
                                            <div class="columns">
                                                <div class="column">
                                                    <!-- Country -->
                                                    <b-field label="Country">
                                                        <b-input placeholder="Country" v-model="nAddresses.country_boarding"></b-input>
                                                    </b-field>
                                                </div> <!--close column-->
                                                <div class="column">
                                                    <b-field label="Province">
                                                        <b-input placeholder="Province" v-model="nAddresses.province_boarding"></b-input>
                                                    </b-field>
                                                </div> <!--close column-->
                                            </div> <!--close columns-->

                                            <!--City-->
                                            <div class="columns">
                                                <div class="column">
                                                    <b-field label="City/Municipality">
                                                        <b-input placeholder="City/Municipality" v-model="nAddresses.city_boarding"></b-input>
                                                    </b-field>
                                                </div><!--close column-->
                                                <div class="column">
                                                    <b-field label="District">
                                                        <b-input placeholder="District" v-model="nAddresses.district_boarding"></b-input>
                                                    </b-field>
                                                </div><!--close column-->
                                            </div><!--close columns-->

                                              <!--Street-->
                                                <div class="columns">
                                                <div class="column">
                                                    <b-field label="Brgy/Street">
                                                        <b-input placeholder="Brgy/Street" v-model="nAddresses.brgy_boarding"></b-input>
                                                    </b-field>
                                                </div><!--close column-->
                                                <div class="column">
                                                    <b-field label="Zipcode">
                                                        <b-input placeholder="Zipcode" v-model="nAddresses.zipcode_boarding"></b-input>
                                                    </b-field>
                                                </div><!--close column-->
                                            </div><!--close columns-->
                                            <hr>
                                            <!--Work Address-->
                                            <div class="title is-5">Work Address</div>
                                            <div class="columns">
                                                <div class="column">
                                                    <!-- Country -->
                                                    <b-field label="Country">
                                                        <b-input placeholder="Country" v-model="nAddresses.country_work"></b-input>
                                                    </b-field>
                                                </div> <!--close column-->
                                                <div class="column">
                                                    <b-field label="Province">
                                                        <b-input placeholder="Province" v-model="nAddresses.province_work"></b-input>
                                                    </b-field>
                                                </div> <!--close column-->
                                            </div> <!--close columns-->

                                            <!--City-->
                                            <div class="columns">
                                                <div class="column">
                                                    <b-field label="City/Municipality">
                                                        <b-input placeholder="City/Municipality" v-model="nAddresses.city_work"></b-input>
                                                    </b-field>
                                                </div><!--close column-->
                                                <div class="column">
                                                    <b-field label="District">
                                                        <b-input placeholder="District" v-model="nAddresses.district_work"></b-input>
                                                    </b-field>
                                                </div><!--close column-->
                                            </div><!--close columns-->

                                            <!--Street-->
                                                <div class="columns">
                                                <div class="column">
                                                    <b-field label="Brgy/Street">
                                                        <b-input placeholder="Brgy/Street" v-model="nAddresses.brgy_work"></b-input>
                                                    </b-field>
                                                </div><!--close column-->
                                                <div class="column">
                                                    <b-field label="Zipcode">
                                                        <b-input placeholder="Zipcode" v-model="nAddresses.zipcode_work"></b-input>
                                                    </b-field>
                                                </div><!--close column-->
                                            </div><!--close columns-->

                                            <hr>
                                            <!--Present Address-->
                                            <div class="title is-5">Present Address</div>
                                            <div class="columns">
                                                <div class="column">
                                                    <!-- Country -->
                                                    <b-field label="Country">
                                                        <b-input placeholder="Country" v-model="nAddresses.country_perm"></b-input>
                                                    </b-field>
                                                </div> <!--close column-->
                                                <div class="column">
                                                    <b-field label="Province">
                                                        <b-input placeholder="Province" v-model="nAddresses.province_perm"></b-input>
                                                    </b-field>
                                                </div> <!--close column-->
                                            </div> <!--close columns-->

                                            <!--City-->
                                            <div class="columns">
                                                <div class="column">
                                                    <b-field label="City/Municipality">
                                                        <b-input placeholder="City/Municipality" v-model="nAddresses.city_perm"></b-input>
                                                    </b-field>
                                                </div><!--close column-->
                                                <div class="column">
                                                    <b-field label="District">
                                                        <b-input placeholder="District" v-model="nAddresses.district_perm"></b-input>
                                                    </b-field>
                                                </div><!--close column-->
                                            </div><!--close columns-->

                                            <!--Street-->
                                                <div class="columns">
                                                <div class="column">
                                                    <b-field label="Brgy/Street">
                                                        <b-input placeholder="Brgy/Street" v-model="nAddresses.brgy_perm"></b-input>
                                                    </b-field>
                                                </div><!--close column-->
                                                <div class="column">
                                                    <b-field label="Zipcode">
                                                        <b-input placeholder="Zipcode" v-model="nAddresses.zipcode_perm"></b-input>
                                                    </b-field>
                                                </div><!--close column-->
                                            </div><!--close columns-->

                                            <!-- BUTTON ADDRESS-->
                                       <div class="buttons is-right">
                                            <button class="button is-primary">
                                                <i class="fa fa-user"></i>&nbsp;&nbsp;SAVE</button>
                                        </div>
                                    </form>
                                </b-tab-item>

                                 <!-- Eligibility-->

                                 <!--Employment Information-->

                                <b-tab-item label="Employment Information">

                                    <form @submit.prevent="submitEmployment">
                                                 <!-- Are you employed-->
                                        <input type="hidden" v-model="employ.employment_id">
                                        <div class="columns">
                                            <div class="column">
                                                <b-field label="Are you employed?">
                                                    <b-radio v-model="employ.is_employed"  native-value="1">Yes</b-radio>
                                                    <b-radio v-model="employ.is_employed"  native-value="0">No</b-radio>
                                                </b-field>
                                            </div>
                                        </div>

                                        <!-- Employment Info v1 -->
                                        <div class="columns">
                                            <div class="column">
                                                <b-field label="Name of Organization/Company">
                                                    <b-input type="text" placeholder="Name of Organization/Company" v-model="employ.organization" ></b-input>
                                                </b-field>
                                            </div> <!--Close Column-->
                                            <div class="column">
                                                <b-field label="Designation/Position">
                                                    <b-input type="text"  placeholder="Designation" v-model="employ.designation" ></b-input>
                                                </b-field>
                                            </div> <!--Close Column-->
                                            <div class="column">
                                                <b-field label="From/To">
                                                    <b-input type="text" placeholder="Year From" v-model="employ.year_from"></b-input>
                                                    <b-input type="text" placeholder="Year To" v-model="employ.year_to"></b-input>
                                                </b-field>
                                            </div> <!--Close Column-->

                                        </div> <!--Close Columns-->

                                          <!--Job Inline-->

                                        <div class="columns">
                                            <div class="column">
                                                <b-field label="Is your current job in line with your degree earned of program?" expanded>
                                                    <b-select placeholder="In line to your current job?" v-model="employ.current_job">
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </b-select>
                                                </b-field>
                                            </div> <!--Close Column-->
                                        </div>
                                        <div class="columns">
                                            <div class="column">
                                                <b-field label="Employment Type" expanded>
                                                    <b-select placeholder="Employment Type" v-model="employ.employment_type" expanded>
                                                        <option value="Regular">Regular</option>
                                                        <option value="Contractual">Contractual</option>
                                                        <option value="Job Order">Part Time</option>
                                                        <option value="Casual">Casual</option>
                                                    </b-select>
                                                </b-field>
                                            </div> <!--Close Column-->

                                            <div class="column">
                                                <b-field label="Occupational Type" expanded>
                                                    <b-select placeholder="Occupational Type" v-model="employ.occupation_type" expanded>
                                                        <option value="Government">Government</option>
                                                        <option value="Non-Government">Non-Government</option>
                                                        <option value="Religious Sector">Religious Sector</option>

                                                    </b-select>
                                                </b-field>
                                            </div> <!--Close Column-->
                                        </div> <!--Close Columns-->

                                         <!--Job Description-->
                                        <div class="columns">
                                            <div class="column">
                                                <b-field label="Is this your first job?">
                                                    <b-radio  v-model ="employ.is_first_job" native-value="1">Yes</b-radio>
                                                    <b-radio  v-model ="employ.is_first_job" native-value="0">No</b-radio>
                                                </b-field>
                                            </div> <!--Close Column-->

                                            <div class="column">
                                                <b-field label="Local or Abroad">
                                                    <b-radio  v-model="employ.work_category" native-value="Local">Local</b-radio>
                                                    <b-radio  v-model="employ.work_category" native-value="Abroad">Abroad</b-radio>
                                                </b-field>
                                            </div> <!--Close Column-->

                                            <div class="column">
                                                <b-field label="How long did it take to land the job?">
                                                    <b-select placeholder="How long did it take to land the job?" v-model="employ.take_job">
                                                        <option value="Less than a month">Less than a month</option>
                                                        <option value="1 to 6 months">1 to 6 months</option>
                                                        <option value="7 to 11 months">7 to 11 months</option>
                                                        <option value="1 year to less than 2 years">1 year to less than 2 years</option>
                                                        <option value="2 year to less than 3 years">2 year to less than 3 years</option>
                                                        <option value="3 year to less than 4 years">3 year to less than 4 years</option>
                                                        <option value="4 year to less than 5 years">4 year to less than 5 years</option>
                                                    </b-select>
                                                </b-field>
                                            </div> <!--Close Column-->
                                        </div> <!--Close Columns-->

                                        <!--Job Salary-->

                                        <div class="columns">
                                            <div class="column">
                                                <b-field label="Monthly Range of Salary">
                                                    <b-select placeholder="Monthly Range of Salary" v-model="employ.monthly_range">
                                                        <option value="Below 5,000">Below 5,000</option>
                                                        <option value="5,000 - 10,000">5,000 - 10,000</option>
                                                        <option value="10,000 - 15,000">10,000 - 15,000</option>
                                                        <option value="15,000 - 20,000">15,000 - 20,000</option>
                                                        <option value="20,000 - 30,0000">20,000 - 30,0000</option>
                                                        <option value="40,000 - 50,0000">40,000 - 50,0000</option>
                                                        <option value="60,000 - 70,0000">60,000 - 70,0000</option>
                                                        <option value="80,000 - 90,0000">80,000 - 90,0000</option>
                                                        <option value="90,000 - 100,0000">90,000 - 100,0000</option>
                                                        <option value="Above 100,000">Above 100,000</option>
                                                    </b-select>
                                                </b-field>
                                           </div>

                                        </div> <!--Close Columns-->

                                         <!--Survey v1-->


                                        <div class="columns">
                                            <div class="column">
                                                <b-field label="Please rate your level of satisfaction in your current job">
                                            <b-select placeholder="Please rate your level of satisfaction in your current job" v-model="employ.satisfy_job">
                                                <option value="4 - very highly">4 - very highly</option>
                                                <option value="3 - highly">3 - highly</option>
                                                <option value="2 - fairly">2 - fairly</option>
                                                <option value="1 - poorly">1 - poorly</option>
                                            </b-select>
                                            </b-field>
                                            </div> <!--Close Column-->
                                        </div> <!--Close Columns-->

                                        <div class="columns">
                                             <div class="column">
                                                <b-field label="How does the course/program contribute to your personal and professional growth in terms of">
                                            <b-select placeholder="How does the program contribute to your personal and professional growth in terms of" v-model="employ.growth" required>
                                                <option value="4 - very highly">4 - very highly</option>
                                                <option value="3 - highly">3 - highly</option>
                                                <option value="2 - fairly">2 - fairly</option>
                                                <option value="1 - poorly">1 - poorly</option>
                                            </b-select>
                                            </b-field>
                                            </div> <!--Close Column-->

                                        </div><!--Close Columns-->


                                         <!--Survey v2-->
                                        <div class="columns">
                                            <div class="column">
                                                <b-field label="How would you rate the degree program you've earned in GADTC in terms of Note: FOR GADTC GRADUATES ONLY" >
                                                <b-select placeholder="How would you rate the degree program you've earned in GADTC in terms of"  v-model="employ.degree_earned" >
                                                    <option value="4 - very highly">4 - very highly</option>
                                                    <option value="3 - highly">3 - highly</option>
                                                    <option value="2 - fairly">2 - fairly</option>
                                                    <option value="1 - poorly">1 - poorly</option>
                                                </b-select>
                                            </b-field>
                                            </div> <!--Close Column-->
                                        </div> <!--Close Columns-->

                                        <!-- BUTTON EMPLOYMENT-->
                                       <div class="buttons is-right">
                                            <button class="button is-primary">
                                                <i class="fa fa-user"></i>&nbsp;&nbsp;SAVE</button>
                                        </div>

                                    </form>

                                </b-tab-item>


                            </b-tabs>
                       </div><!--box-->
                   </div><!-- close column-->
               </div><!-- close columns-->
           </div> <!-- close container-->
       </div> <!-- close section-->

      <b-modal v-model="isModalView" has-modal-card
            trap-focus width="640" aria-role="dialog" aria-modal>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">View Photo</p>
                    <button type="button" class="delete"
                    @click="isModalView=false"/>

                </header>
                <section class="modal-card-body">
                    <div>
                         <img :src="fields.profile_image" alt="..." />
                    </div>
                </section>
                <footer class="modal-card-foot">
                    <b-button
                        label="Close"
                        @click="isModalView=false"></b-button>
                </footer>
            </div>
        </b-modal>
   </div> <!--root div-->
</template>

<script>
export default {
    props: ['dataPrograms'],

    data() {
        return{
            fields:{},
            errors: {},
            educations: [],
            eligibilities: [],
            nAddresses: {
                address_id: null,
            },
            employ: {
                employment_id: null,
                is_employed: 0,
                is_first_job: 0,
                work_category: 'Local',
            },


            activeTab: 0,
            programs: [],

            isModalView: false,

        }

    },
    methods:{
        add(){
            this.educations.push({
                education_id:null,
                level:'',
                school_name:'',
                remark:'',
                unit: 0,
                year_graduated: '',
            });
        },
        remove(index){
            this.educations.splice(index, 1);
        },

        openModal(){
            this.isModalView = true;

        },

        addEligible(){
            this.eligibilities.push({
                eligibility_id:null,
                eligible:'',
                date_acquired:'',
                rating:'',
                license_id: '',
            });
        },
        removeEligible(index){
            this.eligibilities.splice(index, 1);
        },

        getData(){

                const profile = axios.get('/ajax-profile-page');
                const education = axios.get('/ajax-get-education');
                const eligibility = axios.get('/ajax-get-eligibility');
                const address = axios.get('/ajax-get-information-address');
                const employment = axios.get('/ajax-profile-employment');

                axios.all([profile, education, eligibility, address, employment]).then(axios.spread((...res)=>{
                    this.fields = res[0].data;

                    this.educations = res[1].data;
                    this.eligibilities = res[2].data;

                    if(res[3].data[0]){
                        //console.log(this.nAddresses);.
                        this.nAddresses = res[3].data[0];
                    }
                    if(res[4].data[0]){
                        this.employ = res[4].data[0];
                    }
                    //console.log(this.employ);
                }));
        },

        submitInformation(){

            if(this.fields.image.size > 300000){
                alert('Image size must be atleast 300kb in size.');
                return;
            }
            var form = new FormData();

            form.append('fname', this.fields.fname);
            form.append('lname', this.fields.lname);
            form.append('mname', this.fields.mname);
            form.append('sex', this.fields.sex);
            form.append('email', this.fields.email);
            form.append('civil_status', this.fields.civil_status);
            form.append('suffix', this.fields.suffix ? this.fields.suffix :'');
            form.append('ins_name', this.fields.ins_name);
            form.append('alumni_classification', this.fields.alumni_classification);
            form.append('contact_number', this.fields.contact_number);
            form.append('program', this.fields.program);
            form.append('fb_account', this.fields.fb_account ? this.fields.fb_account :'');
            form.append('year_graduated', this.fields.year_graduated);
            form.append('profile_image', this.fields.image);

            axios.post('/profile-information', form, {
               headers:{
                    'Content-Type':'multipart/form-data',
               }
            }).then(res=>{
                if(res.data.status === 'updated')
                this.$buefy.dialog.alert({
                    title: 'UPDATED!',
                    message: 'Your profile successfully updated.',
                    type: 'is-success',
                    onConfirm: ()=> window.location = '/profile-page'

                });
            })
        },

        submitEducation(){
            axios.post('/profile-education', this.educations).then(res=>{
                if(res.data.status === 'saved')
                this.$buefy.dialog.alert({
                    title: 'SAVED!',
                    message: 'Your education background is successfully saved.',
                    type: 'is-success',
                    onConfirm: ()=> window.location = '/profile-page'
                    //onConfirm: ()=> this.getData()
                });
            })
        },

        submitEligibility(){
            axios.post('/profile-eligibility', this.eligibilities).then(res=>{
                if(res.data.status === 'saved')
                this.$buefy.dialog.alert({
                    title: 'SAVED!',
                    message: 'Your eligiblity is successfully saved.',
                    type: 'is-success',
                    onConfirm: ()=> window.location = '/profile-page'


                });
            })

        },

        submitAddress(){
            axios.post('/profile-information-address', this.nAddresses).then(res=>{
                if(res.data.status === 'saved')
                this.$buefy.dialog.alert({
                    title: 'SAVED!',
                    message: 'Your address is successfully saved.',
                    type: 'is-success',

                });
            })
        },

        submitEmployment(){
            //console.log()

             axios.post('/profile-employment', this.employ).then(res=>{
                if(res.data.status === 'saved')
                this.$buefy.dialog.alert({
                    title: 'SAVED!',
                    message: 'Your address is successfully saved.',
                    type: 'is-success',

                });
            })

        },


        initializeData(){
            this.programs = JSON.parse(this.dataPrograms);
        },


    }, //close method

    mounted(){
        this.initializeData();
        this.getData();


    },


}
</script>

<style scoped>
    .educ-wrapper{
        padding:20px;
        background-color: rgb(243, 243, 243);
        border-radius: 5px;
        margin-top: 5px;

    }
    .img-wrapper{
        height:100px;
    }

    h2 {
        width: 100%;
        text-align: center;
        border-bottom: 1px solid #000;
        line-height: 0.1em;
        margin: 10px 0 20px;
    }

    h2 span {
        background:#fff;
        padding:0 10px;
    }

   .avatar-container{
       height: 200px;
       width: 165px;
       border: 1px solid #d0d0d0;

   }

   .avatar-container img{
       width: inherit;
       height: inherit;
       object-fit: cover;

   }



</style>
