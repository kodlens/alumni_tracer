<template>
    <div>
        <div class="hero">
            <div class="hero-body">
                <div class="container">
                    <div class="columns">
                        <div class="column is-8 is-offset-2">

                            <form @submit.prevent="submit">

                                <div class="panel">
                                <div class="panel-heading">
                                    ACCOUNT INFORMATION
                                </div> <!--close panel-heading-->
                                <div class="panel-body">
                                    <!-- Account -->
                                    <div class="columns">
                                        <div class="column">
                                            <b-field label="Username">
                                                <b-input type="text" placeholder="Username" v-model="fields.username" required></b-input>
                                            </b-field>
                                        </div>
                                        <div class="column">
                                            <b-field label="Password">
                                                <b-input type="password" password-reveal placeholder="Password"  v-model="fields.password" required></b-input>
                                            </b-field>
                                        </div>

                                         <div class="column">
                                            <b-field label="Re-type Password">
                                                <b-input type="password" password-reveal placeholder="Password"  v-model="fields.password_confirmation" required></b-input>
                                            </b-field>
                                        </div>

                                    </div>
                                    <!-- Name -->
                                    <div class="columns">
                                        <div class="column">
                                             <b-field label="First Name">
                                                <b-input type="text" placeholder="First Name"  v-model="fields.fname" required></b-input>
                                            </b-field>
                                        </div>
                                        <div class="column">
                                            <b-field label="Middle Name">
                                                <b-input type="text" placeholder="Middle Name" v-model="fields.mname"  ></b-input>
                                            </b-field>
                                        </div>
                                        <div class="column">
                                             <b-field label="Last Name">
                                                <b-input type="text" placeholder="Last Name" v-model="fields.lname" required></b-input>
                                            </b-field>
                                        </div>

                                        <div class="column">
                                             <b-field label="Suffix">
                                                <b-input type="text" placeholder="Suffix" v-model="fields.suffix"  ></b-input>
                                            </b-field>
                                        </div>

                                    </div>
                                   <!-- Sex -->
                                    <div class="columns">
                                        <div class="column">
                                            <b-field label="Sex">
                                        <b-select placeholder="Sex"  v-model="fields.sex" required>
                                            <option value="MALE">MALE</option>
                                            <option value="FEMALE">FEMALE</option>
                                        </b-select>
                                    </b-field>
                                        </div>

                                        <div class="column">
                                        <b-field label="Civil Status">
                                                <b-select placeholder="Civil Status"  v-model="fields.civil_status" required >
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Separated">Separated</option>
                                                    <option value="Widowed">Widowed</option>
                                                </b-select>
                                             </b-field>
                                        </div>

                                        <div class="column">
                                            <b-field label="E-mail">
                                            <b-input type="email" placeholder="E-mail"  v-model="fields.email" required></b-input>
                                        </b-field>
                                        </div>

                                           
                                        
                                    </div>

                                    <div class="columns">

                                         <div class="column">
                                        <b-field label="Membership Classification">
                                                <b-select placeholder="Membership Classification"  v-model="fields.alumni_classification" required >
                                                    <option value="Associate">Associate</option>
                                                    <option value="Honorary">Honorary</option>
                                                    <option value="Regular">Regular</option>
                                                </b-select>
                                             </b-field>
                                        </div>
                                        

                                        <div class="column">
                                            <b-field label="Contact Number">
                                            <b-input type="text" placeholder="Contact Number"  v-model="fields.contact_number" required></b-input>
                                        </b-field>
                                        </div>
                                        
                                    </div>
                                    
                                    <!-- Contact -->
                                    <div class="columns">
                                            

                                        

                                        
                                    </div>
                                    <!-- BUTTON -->
                                   <div class="buttons is-right">
                                        <button class="button is-primary">REGISTER</button>
                                    </div> 
                                   <div class="container error-wrapper">
                                       <ul>
                                           <li v-for="(error, index) in this.errors" :key="index">
                                               {{ error[0] }}
                                           </li>
                                       </ul>
                                   </div>
                                   
                                </div> <!--close panel body-->
                            </div> <!--close panel-->
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
    data(){
        return{
            fields: {},
            errors: {},
        }
        
    },
    methods: {
        submit(){
            axios.post('/registration-page', this.fields).then(res=>{
               window.location = '/login';
            }).catch(err=>{
                
                if(err.response.status === 422){
                    this.errors = err.response.data.errors;
                    console.log(this.errors);
                }
            })
        },
    }
}
</script>

<style scoped>
    .error-wrapper ul > li {
        color: red;
    }
</style>
