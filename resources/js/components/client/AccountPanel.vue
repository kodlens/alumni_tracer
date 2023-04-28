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
                                    CHANGE PASSWORD
                                </div> <!--close panel-heading-->
                                <div class="panel-body">
                                    <!-- Account -->
                                    
                                        <div class="columns">
                                                <div class="column">
                                                    <b-field label=" Enter Old Password"
                                                    :type="this.errors.old_password ? 'is-danger' : ''"
                                                    :message="this.errors.old_password ? this.errors.old_password[0] : ''">
                                                        <b-input type="password" password-reveal placeholder=" Password" v-model="old_password" ></b-input>
                                                    </b-field>
                                                </div>
                                        </div>
                                        <div class="columns">
                                            <div class="column">
                                                <b-field label="Enter New Password"
                                                :type="this.errors.password ? 'is-danger' : ''"
                                                :message="this.errors.password ? this.errors.password[0] : ''">
                                                    <b-input type="password" password-reveal placeholder="Password"  v-model="password" ></b-input>
                                                </b-field>
                                            </div>
                                        </div>
                                         
                                         <div class="columns">
                                            <div class="column">
                                                <b-field label="Confirm Password"
                                                :type="this.errors.password ? 'is-danger' : ''"
                                                :message="this.errors.password ? this.errors.password[0] : ''">
                                                    <b-input type="password" password-reveal placeholder="Password"  v-model="password_confirmation" ></b-input>
                                                </b-field>
                                            </div>
                                        </div>

                                   
                                    
                                    <!-- BUTTON -->
                                   <div class="buttons is-right">
                                        <button class="button is-primary">CHANGE PASSWORD</button>
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
           old_password: '',
           password: '',
           password_confirmation: '',
           errors: {},
        }
        
    },
    methods: {
        submit: function(){
            axios.post('/account-panel',{
                old_password: this.old_password,
                password: this.password,
                password_confirmation: this.password_confirmation,
            }).then(res=>{
                window.location ='/home';
            }).catch(err=>{
                if(err.response.status === 422){
                     this.errors = err.response.data.errors;
                }
               
            });
        },
    },
}
</script>

<style scoped>
   
</style>
