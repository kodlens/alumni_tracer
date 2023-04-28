<template>
    <div>
        <div class="hero">
            <div class="hero-body">
                <div class="container">
                    <div class="columns">
                        <div class="column is-8 is-offset-2">

                            <form @submit.prevent="update">
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
                                                <b-input type="text"  placeholder="Designation/Position" v-model="employ.designation" ></b-input>
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
                                    <b-field label="Is your current job in line with your degree earned of program?">
                                        <b-select placeholder="In line to your current job?" v-model="employ.current_job" >
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </b-select>
                                    </b-field>
                                        </div> <!--Close Column-->
                                        <div class="column">
                                    <b-field label="Employment Type">
                                        <b-select placeholder="Employment Type" v-model="employ.employment_type">
                                            <option value="Regular">Regular</option>
                                            <option value="Contractual">Contractual</option>
                                            <option value="Job Order">Part Time</option>
                                            <option value="Casual">Casual</option>
                                            <option value="Part Time">Part Time</option>
                                        </b-select>
                                    </b-field>
                                        </div> <!--Close Column-->
                                        <div class="column">
                                    <b-field label="Occupational Type">
                                        <b-select placeholder="Occupational Type" v-model="employ.occupation_type">
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
                                            <option value="20,000 - 30,0000">20,000 - 30,0000</option>
                                            <option value="40,000 - 50,0000">40,000 - 50,0000</option>
                                            <option value="60,000 - 70,0000">60,000 - 70,0000</option>
                                            <option value="80,000 - 90,0000">80,000 - 90,0000</option>
                                            <option value="90,000 - 100,0000">90,000 - 100,0000</option>
                                            <option value="Above 100,000">Above 100,000</option>
                                        </b-select>
                                    </b-field>
                                        </div> <!--Close Column-->
                                        
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
                                            <b-field label="How would you rate the degree program you've earned in GADTC in terms of">
                                        <b-select placeholder="How would you rate the degree program you've earned in GADTC in terms of"  v-model="employ.degree_earned" required>
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
                        </div> <!--close column-->
                    </div> <!--close columns-->
                </div> <!--close container-->
            </div> <!--close hero-body-->
        </div> <!--close hero-->
    </div>
</template>

<script>
export default {
    props: ['employment'],
    data(){
        return{
            employ: {},
            errors: {},
            employJSON: null,
        }
        
    },
    methods: {
      initializeData(){
          this.employJSON = JSON.parse(this.employment);
          this.employ = this.employJSON;
          console.log(this.employJSON);

      },

      update(){
            axios.put('/panel/employment-page/'+this.employJSON.employment_id, this.employ).then(res=>{
                if(res.data.status === 'updated')
                this.$buefy.dialog.alert({
                    title: 'UPDATED!',
                    message: 'Your profile successfully updated.',
                    type: 'is-success',
                    onConfirm: ()=> window.location='/panel/user-page'
                });
            })

      }
    },//end method
    mounted(){
        this.initializeData();

    }
}
</script>

<style scoped>
  
</style>
